<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    protected $table = 'param';
    public $timestamps = false;

    static public function getParam($name)
    {
    	$data = self::where('name',$name)->first();
    	return $data->value;
    }
    
}
