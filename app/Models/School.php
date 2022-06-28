<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    public function kelas(){
        return $this->hasMany(Kelas::class,'schools_id');
    }

    public function user(){
        return $this->hasMany(User::class,'schools_id');
    }
}
