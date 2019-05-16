<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Validator;
use DB;
use Lang;
use Redirect;


class PermissionController extends Controller
{
   
    public function index()
    {

    	$paginationEnabled = config('app.pagination.enable');
        if ($paginationEnabled) {
    		$permissions = Permission::paginate(config('app.pagination.permission'));
        } else {
            $permissions = Permission::all();
        }
        return view('permission.index',compact('permissions'));
    }

    public function destroy($id)
    {
        $data = Permission::findOrFail($id);

        if($data->name != 'system.root')
        {
            $data->delete();
            $name = $data->name;
            return redirect('permission')->with('success',Lang::get('messages.delete-success',['model'=>$name]));
        }

        return back()->with('error',Lang::get('messages.delete-error-system-root'));

    }

    public function edit($id)
    {
        $data = Permission::findOrFail($id);

        return view('permission.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();

        $data = Permission::findOrFail($id);

        $v = Validator::make($input,Permission::rules('update'));
        if($v->fails())
        {
            $messages = $v->messages();
            return Redirect::back()->withErrors($v)->withInput();
        }

        try{
            DB::beginTransaction();

            $data->update($input);

            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            abort(500);
        }

        return redirect('/permission')->with('success',Lang::get('messages.update-success',['model'=>$data->name]));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $input = $request->input();


        $v = Validator::make($input,Permission::rules());
        if($v->fails())
        {
            $messages = $v->messages();
            return Redirect::back()->withErrors($v)->withInput();
        }


        try{
            DB::beginTransaction();
            $data = Permission::create($input);
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            abort(500);
        }

        return redirect('permission')->with('success',Lang::get('messages.save-success',['model'=>$data->name]));

    }
}
