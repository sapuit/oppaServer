<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = 
    array('name','quantity','cost', 'total');
}
