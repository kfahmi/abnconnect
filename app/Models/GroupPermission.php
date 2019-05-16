<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    protected $table = 'group_permission';
    public $timestamps = false;


    public function permission()
    {
        return $this->belongsTo('App\Models\Permission','permission_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group','group_id');
    }
    
}
