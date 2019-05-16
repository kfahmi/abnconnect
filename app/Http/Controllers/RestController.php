<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class RestController extends Controller
{
   

    public function apiGetPermission()
	{
		$var = $_POST['var'];

		//yang tidak direject aja
		if($var == 'group_permission')
		{
			$group_id = $_POST['group_id'];
			$group = Group::with('groupPermission')->find($group_id);
			$data = $group->groupPermission;
		}
		else if($var == 'user_permission')
		{
			$user_id = $_POST['user_id'];
			$user = User::findOrFail($user_id);
			$data = $user->hasManyUserPermission;
		}
		
		return response()->json(array('result'=>$data));
	}
}
