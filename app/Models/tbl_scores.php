<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_scores extends Model
{
    use HasFactory;

    public function Student()
    {
        return $this->belongsTo(tbl_students::class, 'foreign_key', 'id_student');
    }

    public function Subject()
    {
        return $this->belongsTo(tbl_subjects::class, 'foreign_key', 'id_subject');
    }
}
