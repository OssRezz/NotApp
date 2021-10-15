<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_subjects extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->hasMany(tbl_teachers::class, 'foreign_key', 'id');
    }
    public function Score()
    {
        return $this->hasMany(tbl_scores::class, 'foreign_key', 'id');
    }
}
