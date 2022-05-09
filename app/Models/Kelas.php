<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'schools_id',
    ];
    public function school(){
        return $this->belongsTo(School::class,'schools_id');
    }
}
