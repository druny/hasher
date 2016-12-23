<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHash extends Model
{
    protected $fillable = [
        'user_id', 'hash_algorithm_id', 'vocabulary_id', 'hash'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function hashAlgorithm()
    {
        return $this->belongsTo('App\Models\HashAlgorithm');
    }

    public function vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary');
    }

    public function scopeUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }
}
