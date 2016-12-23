<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HashAlgorithm;
use App\Models\Vocabulary;
use App\Models\User;
use App\Models\UserHash;
use App\Helpers\GeoHelper;
use App\Http\Requests\ChechHashes;
use App\Helpers\HashHelper;

class HashController extends Controller
{
    /*
     * Display info about user (If there is no user, then we create)
     * All hashes with words
     * */
    public function index(Request $request)
    {
        $geoData = GeoHelper::getInfo();

        if ($user = User::ip($geoData['ip'])->first()) {
            $hashes = UserHash::userId($user->id)->get();
            return view('hashes.index', ['user' => $user, 'hashes' => $hashes]);
        }

        $this->createUser($request, $geoData);
        return redirect()->route('hash.create');
    }


    /*
     * Create Hashes
     * */
    public function create()
    {

        $vocabularies = Vocabulary::get();
        $algorithms = HashAlgorithm::get();

        return view('hashes.create', ['algorithms' => $algorithms, 'vocabularies' => $vocabularies]);
    }
    /*
     * Create new user
     * */
    public function createUser($request, $geoData)
    {

        $user = new User();
        $user->ip = $geoData['ip'];
        $user->browser = $request->header('User-Agent');
        $user->country = $geoData['country'];
        $user->save();

    }

    /*
     * Get info and create new hashed words
     * */
    public function store(ChechHashes $request)
    {
        $geoData = GeoHelper::getInfo();

        $user = User::ip($geoData['ip'])->first();

        $words = [];
        foreach ($request->words as $word) {
            $words[] = Vocabulary::id($word)->firstOrFail();
        }

        $algorithms = [];
        foreach ($request->algorithms as $algorithm) {
            $algorithms[] = HashAlgorithm::id($algorithm)->firstOrFail();
        }

        foreach ($algorithms as $algorithm) {
        //Check what algorithm type select user, and use needed method
        $methodName = $algorithm->name . 'Hash';

            foreach($words as $word) {
                //Passes on to every word  needed method
                $hashedWord =  HashHelper::$methodName($word);
                $hash = new UserHash();
                $hash->fill([
                    'user_id' => $user->id,
                    'hash_algorithm_id' => $algorithm->id,
                    'vocabulary_id' => $word->id,
                    'hash' => $hashedWord,
                ]);
                $hash->save();

            }

        }
        return redirect()->route('hash.create')->with('success', 'Success');
    }


}
