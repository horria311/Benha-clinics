<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cregister extends Model
{
    use HasFactory;
    protected $fillable = ['cname', 'cemail', 'cphone', 'cnum', 'Password', 'Password_confirmation'];

    public function book(){
        return $this->hasOne('app\book');
    }
}
