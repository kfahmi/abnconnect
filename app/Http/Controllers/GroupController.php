<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupPermission;
use App\Models\Permission;
use Input;
use Validator;
use Redirect;
use DB;
use Lang;
use Auth;

class GroupController extends Controller
{
   
    public function index()
    {

    	$paginationEnabled = config('app.pagination.enable');
        if ($paginationEnabled) {
    		$groups = Group::with('groupPermission')->paginate(config('app.pagination.group'));
        } else {
            $groups = Group::with('groupPermission')->all();
        }
        return view('group.index',compact('groups'));
    }

    public function destroy($id)
    {
        $currentUser = Auth::user();
        $data = Group::findOrFail($id);

        if ($data->id != $currentUser->group_id) {
            $data->delete();
            $name = $data->name;
            return redirect('group')->with('success', Lang::get('messages.delete-success',['model'=>$name]));
        }

        return back()->with('error', Lang::get('messages.delete-group-self-error'));
    }

    public function edit($id)
    {
        $data = Group::with('groupPermission')->findOrFail($id);
        $perm_system = Permission::system();
        $perm_not_system = Permission::notSystem();

        $permission_selected = array();
        foreach($data->groupPermission as $gp)
        {
            $permission_selected[] = $gp->id;
        }

        return view('group.edit', compact('data','perm_system','perm_not_system','permission_selected'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->input();
        $data = Group::findOrFail($id);


        $v = Validator::make($input, Group::rules('update',$data->id));
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
        else
        {
               try
                {
                    DB::beginTransaction();

                    $data->update($input);

                    if($data->hasManyGroupPermission()->exists())
                    {
                        $data->hasManyGroupPermission()->delete();
                    }

                    if(isset($input['permission_selected']))
                    {
                        foreach($input['permission_selected'] as $ps)
                        {
                            $up = new GroupPermission;
                            $up->allow = 1;
                            $up->group_id = $data->id;
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

                return redirect('group/'.$id.'/edit')->with('success', Lang::get('messages.update-success',['model'=>$data->name]));
        }




    }

    public function create()
    {
        $perm_system = Permission::system();
        $perm_not_system = Permission::notSystem();

        return view('group.create', compact('perm_system','perm_not_system'));
    }


    public function store(Request $request)
    {
        $input = $request->input();

        // dd($input['permission_selected']);

        $v = Validator::make($input, Group::rules());
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
        else
        {
               try
                {
                    DB::beginTransaction();

                    $data = Group::create($input);

                    // dd($data->arrGroupPermission());

                    //jika ada permission yang dicentang
                    if(isset($input['permission_selected']))
                    {
                        //looping permission yang dipilih
                        foreach($input['permission_selected'] as $ps)
                        {
                                $gp = new GroupPermission;
                                $gp->allow = 1;
                                $gp->group_id = $data->id;
                                $gp->permission_id = $ps;
                                $gp->save();
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

                return redirect('group')->with('success', Lang::get('messages.save-success',['model'=>$data->name]));
        }
    }

}
