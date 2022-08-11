<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    //many to one relationship with user
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
    //relationship with province
    public function province()
    {
        return $this->belongsTo('App\Models\province');
    }
    //relationship with district
    public function district()
    {
        return $this->belongsTo('App\Models\district');
    }
    //relationship with ward
    public function ward()
    {
        return $this->belongsTo('App\Models\ward');
    }

}
