<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Headers extends Model
{
	
    protected $fillable = array('title','sub_title','image');
}
