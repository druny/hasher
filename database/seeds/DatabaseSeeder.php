<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hash_algorithms')->insert([
            ['name' => 'md5'],
            ['name' => 'sha1'],
            ['name' => 'sha256'],
            ['name' => 'crypt'],
            ['name' => 'crc32'],

        ]);
        DB::table('vocabularies')->insert([
            ['word' => 'Laravel'],
            ['word' => 'Symfony'],
            ['word' => 'PHP'],
            ['word' => 'NodeJs'],
            ['word' => 'Angular'],
            ['word' => 'EcmaScript'],
            ['word' => str_random(10)],
        ]);
    }
}
