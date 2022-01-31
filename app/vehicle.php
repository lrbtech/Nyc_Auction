<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = [
        'car_id', 'brand_id', 'vehicle_model' ,'vehicle_status','colour','vehicle_type'
    ];
}
