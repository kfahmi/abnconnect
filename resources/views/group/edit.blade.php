

@extends('layouts.app') 

@section('page-title')
    {!! Lang::get('titles.pages.dashboard') !!}
@endsection



@section('breadcrumbs')
{{Breadcrumbs::render('group.edit',$data)}}
@endsection


@section('content')
<!-- .row -->
{!! Form::open(array('route' => ['group.update',$data->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}

<div class="row">
    <div class="col-md-7">
    <div class="white-box">
        <h3 class="box-title m-b-0">Group</h3>
        <p class="text-muted m-b-30 font-13"> {{Lang::get('titles.pages.group_form_info')}} </p>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                    
                    <div class="form-group {{ $errors->has('name') ? ' has-error ' : '' }}">
                        <label for="exampleInputEmail1">name</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-users"></i></div>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Group Name" value="{{ $data->name }}">
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputuname">Description</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-text"></i></div>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ $data->description }}"> 
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-5">
    <div class="white-box" id="custom_permission">
        <div class="form-group {{$errors->has('permission_selected') ? 'has-error' : ''}}">
            <h3 class="box-title m-b-0">Permission</h3>
             <p class="text-muted m-b-30 font-13"> {{Lang::get('titles.pages.group_form_permission')}} </p>
            <hr>
            <span style="font-size: 70%">
            <p class="text-muted font-13"><code>System</code></p>
            @foreach($perm_system as $p)
            <span class="col-lg-4 checkbox-inline checkbox-primary checkbox-circle">
                <input class="checkbox-{{$p->id}}" name="permission_selected[]" type="checkbox" value="{{$p->id}}" {{in_array($p->id, $permission_selected) ? 'checked' : ''}}>
                <label for="checkbox-9"> {{$p->name}} </label>
            </span>
            @endforeach
            </span>

            <br>
            <br>


            <span id="perm_can_select" style="font-size: 70%">
            <p class="text-muted font-13"><code>Privileges</code></p>

            @foreach($perm_not_system as $p)
            <span class="col-lg-4 checkbox-inline checkbox-primary checkbox-circle">
                <input class="checkbox-{{$p->id}}" name="permission_selected[]" type="checkbox" value="{{$p->id}}" {{in_array($p->id, $permission_selected) ? 'checked' : ''}}>
                <label for="checkbox-9"> {{$p->name}} </label>
            </span>
            @endforeach
            </span>


            <span id="perm_cannot_select" style="display:none;font-size: 70%">
                <p class="text-muted font-13"><code>All Privileges Granted</code></p>
            </span>


            @if ($errors->has('permission_selected'))
                <span class="help-block">
                    <strong>{!! Lang::get('errors.permission_selected_required') !!}</strong>
                </span>
            @endif


        </div>
    </div>

    </div>
    </div>

<div class="row">
<div class="col-md-12">
<div class="white-box">
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block waves-effect waves-light m-r-10">{!! Lang::get('button.icon-label.save') !!}
        </button>
    </div>
</div>
</div>
</div>

{!! Form::close() !!}


@endsection


@section('script-page')
 <script type="text/javascript">

    function checkbox_check()
    {
        if ($('.checkbox-1').is(':checked')) 
        {
           $('div#custom_permission input[type=checkbox]').prop('disabled', true);
           $('.checkbox-1').prop('disabled',false);
           $('#perm_cannot_select').show();
           $('#perm_can_select').hide();
        }
        else
        {
           $('div#custom_permission input[type=checkbox]').prop('disabled', false);
           $('#perm_cannot_select').hide();
           $('#perm_can_select').show();
        }
    }

     $('document').ready(function(){

        checkbox_check();

        $('.checkbox-1').change(function()
          {
             checkbox_check();
          });

     });
 </script>

@endsection
