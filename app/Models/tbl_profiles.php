<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_profiles extends Model
{
    use HasFactory;

    //Relantionship
    public function Users()
    {
        return $this->hasMany(User::class, 'foreign_key', 'id');
    }
}
