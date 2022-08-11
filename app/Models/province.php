<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
    //one to many relationship with district
    public function district()
    {
        return $this->hasMany('App\Models\district');
    }
}
