<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','bname', 'clinic_id', 'date', 'time'];

    public function Pregister(){
        return $this->belongsTo('app\Pregister', 'user_id');
    }

    public function Cregister(){
        return $this->belongsTo('app\Cregister', 'clinic_id');
    }
}
