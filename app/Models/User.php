<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','realname', 'email', 'password','is_active','group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'access_token',
    ];

    public function getInitial()
    {
       $explode = explode(' ',$this->realname);
       return substr($explode[0], 0,1);
    }

    public static function rules($scenario = null, $ref_id = null)
    {
        if($scenario == null)
        {
            return [
            'username'=> ['required','unique:user'],
            'email'=> ['required','unique:user'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'group_id' => ['required'],
            'realname' => ['required'],
            ];
        }
        else if($scenario == 'update')
        {
            return [
            'username'=>["required", "unique:user,username,".$ref_id],
            'realname' => ['required'],
            'email'=>['required' , 'unique:user,email,'.$ref_id],
            'group_id' => ['required'],
            ];
        }
        else if($scenario == 'with_ch_pass')
        {
            return [
            'username'=>["required", "unique:user,username,".$ref_id],
            'email'=>['required' , 'unique:user,email,'.$ref_id],
            'realname' => ['required'],
            'group_id' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
            ];
        }
    }


    public function isActive($var = 'bool')
    {
        switch($var){
            case 'bool':
                if($this->is_active == 1)
                {
                    return true;
                }

                return false;
            break;


            case 'word':

                if($this->is_active == 1)
                {
                    return 'Active';
                }

                return 'Inactive';

            break;

            case 'icon':
                if($this->is_active == 1)
                {
                    return '<i class="fa fa-check"></i>';
                }

                return '<i class="fa fa-remove"></i>';

            break;


            default:
                if($this->is_active == 1)
                    {
                        return true;
                    }

                    return false;

            break;
        }
    }

    //return array ['users.edit','users.create']
    public function allPermission()
    {
        //id permission.
        $perm = array();

        //user_permission
        foreach($this->userPermission as $up)
        {
            $perm[$up->id] = $up->name;
        }


        //group user ini punya permission apa aja.
        foreach($this->group->groupPermission as $gp)
        {
            $perm[$gp->id] = $gp->name;
        }

        return $perm;
    }

    public function hasPermission($permission_name)
    {
        $allPermission = $this->allPermission();
        // return $allPermission;

        //permission pass if user has permission = $permission name OR he has permission as system.root
        if(in_array($permission_name,$allPermission) || in_array('system.root',$allPermission))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isRootLevel()
    {
       $allPermission = $this->allPermission();
        // return $allPermission;

        //permission pass if contain $permission name and system.root auto passed 
        if(in_array('system.root',$allPermission))
        {
            return true;
        }
        else
        {
            return false;
        } 
    }

    public function role()
    {
        return $this->group->name;
    }

    // return id permission milik group
    public function arrGroupPermission()
    {
        $arr = array();
        foreach($this->group->groupPermission as $gp)
        {
            $arr[] = $gp->id;
        }

        return $arr;
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group','group_id');
    }

    public function userPermission()
    {
        return $this->belongsToMany('App\Models\Permission','user_permission','user_id','permission_id');
    }

    public function hasManyUserPermission()
    {
        return $this->hasMany('App\Models\UserPermission');
    }

    public function getRememberToken()
    {
        return $this->access_token;
    }

    public function setRememberToken($value)
    {
        $this->access_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'access_token';
    }
}
