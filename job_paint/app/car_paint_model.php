<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_paint_model extends Model
{
    protected $table = "car_paint";
    protected $fillable  = array('car_plate_no','current_color','target_color','status');
}
