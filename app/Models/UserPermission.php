<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permission';
    public $timestamps = false;
    

    public function permission()
    {
        return $this->belongsTo('App\Models\Permission','permission_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
}
