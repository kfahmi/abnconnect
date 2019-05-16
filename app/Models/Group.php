<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';
    public $timestamps = false;
    

     protected $fillable = [
        'name', 'description'
    ];

    public static function rules($scenario = null, $ref_id = null)
    {
        if($scenario == null)
        {
            return [
            'name'=> ['required','unique:group'],
            'permission_selected' => ['present','array'],
            ];
        }
        else if($scenario == 'update')
        {
        	return [
            'name'=> ['required','unique:group,name,'.$ref_id],
            'permission_selected' => ['present','array'],
            ];
        }
    }


    //dapetin permission langsung ke table permissionnya milik group ini
    public function groupPermission()
    {
    	return $this->belongsToMany('App\Models\Permission','group_permission','group_id','permission_id');
    }

    //dapetin list of data dari group_permission table milik group ini
    public function hasManyGroupPermission()
    {
    	return $this->hasMany('App\Models\GroupPermission');
    }
    
}
