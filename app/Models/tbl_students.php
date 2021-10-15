<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_students extends Model
{
    public function Score()
    {
        return $this->hasMany(tbl_scores::class, 'foreign_key', 'id');
    }
}
