<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'description'
    ];

    public static function rules($scenario = null, $ref_id = null)
    {
        if($scenario == null)
        {
            return [
            'name'=> ['required','unique:permission'],
            ];
        }
        else if($scenario == 'update')
        {
        	return [
            'name'=> ['required','unique:permission,name,'.$ref_id],
            ];
        }
    }

    static public function system()
    {
    	return self::whereIn('id',['1','2'])->get();
    }

    static public function notSystem()
    {
    	return self::whereNotIn('id',['1','2'])->get();
    }
    
}
