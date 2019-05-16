<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Permission;
use App\Models\UserPermission;
use App\Models\Param;
use Input;
use Validator;
use Redirect;
use DB;
use Lang;
use Auth;


class UserController extends Controller
{
   
    public function index()
    {
    	$paginationEnabled = config('app.pagination.enable');
        if ($paginationEnabled) {
            $users = User::with('group')->paginate(config('app.pagination.user'));
        } else {
            $users = User::with('group')->all();
        }
        
        $groups = Group::all();

        return view('user.index', compact('users', 'groups'));
    }

    public function create()
    {
        $perm_system = Permission::system();
        $perm_not_system = Permission::notSystem();

        $groups = Group::all();

        return view('user.create', compact('perm_system','perm_not_system','groups'));
    }

    public function store(Request $request)
    {
        $input = $request->input();

        // dd($input['permission_selected']);

        $v = Validator::make($input, User::rules());
        if($v->fails())
        {
                // redirect our user back with error messages       
                $messages = $v->messages();

                // also redirect them back with old inputs so they dont have to fill out the form again
                // but we wont redirect them with the password they entered
                $request->session()->flash('alert-danger', 'Failed to save data');
                return Redirect::back()
                    ->withErrors($v)
                    ->withInput();
        }
        
           try
            {
                DB::beginTransaction();

                $hash = hash('sha1', $input['password'] . Param::getParam('salt'));

                $input['password'] = $hash;
                
                $data = User::create($input);

                // dd($data->arrGroupPermission());

                //jika ada permission yang dicentang
                if(isset($input['permission_selected']))
                {
                    //looping permission yang dipilih
                    foreach($input['permission_selected'] as $ps)
                    {
                        //jika permission tidak dimiliki group, maka input.
                        if(!in_array($ps,$data->arrGroupPermission()))
                        {
                            $up = new UserPermission;
                            $up->allow = 1;
                            $up->user_id = $data->id;
                            $up->permission_id = $ps;
                            $up->save();
                        }
                    }
                }



                DB::commit();  

            }
            catch(Exception $e)
            {
                DB::rollback();
                abort(500);
                // throw new Exception("Error Processing Request", 1);
            }

            return redirect('user')->with('success', Lang::get('messages.save-success',['model'=>$data->username]));
    }

    public function edit($id)
    {
        $user = User::with('userPermission','group.groupPermission')->find($id);
        $perm_system = Permission::system();
        $perm_not_system = Permission::notSystem();
        $groups = Group::all();

        return view('user.edit', compact('user','perm_system','perm_not_system','groups'));

    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $user = User::findOrFail($id);

        if(isset($input['password']) || $input['password'] != null)
        {
            $scenario = 'with_ch_pass';
        }
        else
        {
            $scenario = 'update';
        }

        if(!isset($input['is_active']))
        {
            $input['is_active'] = 0;
        }


        $v = Validator::make($input, User::rules($scenario,$user->id));
        if($v->fails())
        {
                // redirect our user back with error messages       
                $messages = $v->messages();

                // also redirect them back with old inputs so they dont have to fill out the form again
                // but we wont redirect them with the password they entered
                $request->session()->flash('alert-danger', 'Failed to update data');
                return Redirect::back()
                    ->withErrors($v)
                    ->withInput();
        }


       try
        {
            DB::beginTransaction();


            if($scenario == 'with_ch_pass')
            {
               $hash = hash('sha1', $input['password'] . Param::getParam('salt'));
               $input['password'] = $hash; 
            }
            else
            {
               $input['password'] = $user->password;
            }
            
            $user->update($input);

            if($user->hasManyUserPermission()->exists())
            {
                $user->hasManyUserPermission()->delete();
            }

            if(isset($input['permission_selected']))
            {
                foreach($input['permission_selected'] as $ps)
                {
                    $up = new UserPermission;
                    $up->allow = 1;
                    $up->user_id = $user->id;
                    $up->permission_id = $ps;
                    $up->save();
                }
              
            }

            DB::commit();  

        }
        catch(Exception $e)
        {
            DB::rollback();
            abort(500);
            // throw new Exception("Error Processing Request", 1);
        }

        return redirect('user/'.$id.'/edit')->with('success', Lang::get('messages.update-success',['model'=>$user->username]));

    }



    public function destroy($id)
    {
        $currentUser = Auth::user();
        $user = User::findOrFail($id);

        if ($user->id != $currentUser->id) {
            $user->delete();
            $username = $user->username;

            return redirect('user')->with('success', Lang::get('messages.delete-success',['model'=>$username]));
        }

        return back()->with('error', Lang::get('messages.delete-self-error'));
    }
}
