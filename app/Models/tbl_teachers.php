<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_teachers extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo(tbl_subjects::class, 'foreign_key', 'subject');
    }
}
