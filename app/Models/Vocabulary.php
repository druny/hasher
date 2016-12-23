<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    public function userHashes()
    {
        return $this->hasMany('App\Models\UserHashes');
    }

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }
}
