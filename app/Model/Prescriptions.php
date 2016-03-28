<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Prescriptions extends Model
{
    protected $fillable = 
    array('name','email','phone','addr',
    	'image','status','total');

    public function drugs(){
    	return $this->embedsMany('App\Model\Drug');
    }
}
