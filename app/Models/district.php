<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
//    many to one relationship with province
    public function province()
    {
        return $this->belongsTo('App\Models\province');
    }
//    one to many relationship with ward
    public function ward()
    {
        return $this->hasMany('App\Models\ward');
    }
}
