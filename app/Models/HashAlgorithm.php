<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashAlgorithm extends Model
{
    public function userHashes()
    {
        return $this->hasMany('App\Models\UserHash');
    }

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }
}
