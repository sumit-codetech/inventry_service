<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carmodel extends Model
{
    //
    protected $table = 'models';

    protected $fillable = ['id','name','color','year_of_manufacturer','registration_number','note','manufacturer_id','count'];

    protected $hidden = ['created_at','updated_at'];


    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

}
