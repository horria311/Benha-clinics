<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregister extends Model
{
    use HasFactory;
    protected $fillable = ['pname', 'pusername', 'pemail', 'pphone', 'password', 'password_confirmation'];

    public function book(){
        return $this->hasOne('app\book');
    }
}
