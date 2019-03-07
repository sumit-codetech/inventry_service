<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //
    protected $table = 'manufacturers';

    protected $fillable = ['id','name'];

    protected $hidden = ['created_at','updated_at'];


    public function carmodels()
    {
        return $this->hasMany('App\Carmodel');
    }

}
