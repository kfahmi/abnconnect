

@extends('layouts.app') 

@section('page-title')
    {!! Lang::get('titles.pages.dashboard') !!}
@endsection



@section('breadcrumbs')
{{Breadcrumbs::render('user.edit',$user)}}
@endsection


@section('content')
<!-- .row -->
{!! Form::open(array('route' => ['user.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}

<div class="row">
    <div class="col-md-7">
    <div class="white-box">
        <h3 class="box-title m-b-0">User</h3>
        <p class="text-muted m-b-30 font-13"> {{Lang::get('titles.pages.user_form_info')}} </p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                    
                    <div class="form-group {{ $errors->has('email') ? ' has-error ' : '' }}">
                        <label for="exampleInputEmail1">Email address</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-email"></i></div>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('username') ? ' has-error ' : '' }}">
                        <label for="exampleInputuname">User Name</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ $user->username }}"> 
                        </div>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group {{ $errors->has('realname') ? ' has-error ' : '' }}">
                        <label for="exampleInputuname">Real Name</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" name="realname" id="realname" placeholder="Realname" value="{{ $user->realname }}"> 
                        </div>
                         @if ($errors->has('realname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('realname') }}</strong>
                            </span>
                        @endif
                    </div>

                     <div class="form-group">
                        <div class="checkbox checkbox-success">
                            <input id="is_active" name="is_active" value='1' type="checkbox"
                            {{$user->is_active == 1 ? 'checked' : ''}}
                            >
                            <label for="checkbox1"> Active </label>
                        </div>
                    </div>

                    <hr>
                  
                    <h3 class="box-title m-b-0">
                    {{Lang::get('titles.pages.user_form_password')}} 
                    </h3>
        
                    <p class="text-muted m-b-30 font-13"> {{Lang::get('titles.pages.user_form_chpassword_subtitle')}} 
                    </p>


                    <div class="form-group {{ $errors->has('password') ? ' has-error ' : '' }}">
                        <label for="exampleInputpwd1">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password"> 
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
                        <label for="exampleInputpwd2">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"> 
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-5">
    <div class="white-box">
        <h3 class="box-title m-b-0">{{Lang::get('titles.pages.user_form_permission_group')}}</h3>
        <p class="text-muted m-b-30 font-13"> Group  </p>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group {{ $errors->has('group_id') ? ' has-error ' : '' }}">
                    <div class="input-group">
                        <select name="group_id" id="group_id" class="form-control">
                            <option value=''>-Select Group-</option>
                            @foreach($groups as $g)
                                <option value="{{$g->id}}"
                                    {{$g->id == $user->group_id ? 'selected' : ' '}}
                                    >
                                    {{$g->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('group_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('group_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div> 

    <div class="white-box" id="custom_permission" style="display: none;">
        <div class="form-group">
            <p class="text-muted m-b-30 font-13"> Permission  </p>
            <hr>
            <span  style="font-size: 70%">
            <p class="text-muted font-13"><code>System</code></p>
            @foreach($perm_system as $p)
            <span class="col-lg-4 checkbox-inline checkbox-primary checkbox-circle">
                <input class="checkbox-{{$p->id}}" name="permission_selected[]" type="checkbox" value="{{$p->id}}">
                <label for="checkbox-9"> {{$p->name}} </label>
            </span>
            @endforeach
            </span>

            <br>
            <br>

            <span id="perm_can_select"  style="font-size: 70%;">
            <p class="text-muted font-13"><code>Privileges</code></p>

            @foreach($perm_not_system as $p)
            <span class="col-lg-4 checkbox-inline checkbox-primary checkbox-circle">
                <input class="checkbox-{{$p->id}}" name="permission_selected[]" type="checkbox" value="{{$p->id}}">
                <label for="checkbox-9"> {{$p->name}} </label>
            </span>
            @endforeach
            </span>


            <span id="perm_cannot_select" style="display:none;font-size: 70%">
                <p class="text-muted font-13"><code>All Privileges Granted</code></p>
            </span>



        </div>
    </div>

    </div>
    </div>

<div class="row">
<div class="col-md-12">
<div class="white-box">
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block waves-effect waves-light m-r-10">
            {!! Lang::get('button.icon-label.save') !!}
        </button>
    </div>
</div>
</div>
</div>

{!! Form::close() !!}


@endsection


@section('script-page')

 <script type="text/javascript">

    function group_checking(group_value){
         if(group_value !== '')
            {
                $.post("{{url('/api/get_permission')}}",
                {
                    group_id : group_value,
                    var : 'group_permission',
                    _token : "<?php echo csrf_token(); ?>"
                },
                function(data, status){
                    var obj = data.result;
                    $('#custom_permission').show();
                    $("[class*='checkbox-']").prop('checked', false);
                    $("[class*='checkbox-']").prop('disabled', false);

                    for(var i=0; i < obj.length; i++)
                    {
                        $('.checkbox-'+obj[i].id).prop('checked', true);
                        $('.checkbox-'+obj[i].id).prop('disabled', true);
                    }

                    if ($('.checkbox-1').is(':checked')) 
                    {
                       $('div#custom_permission input[type=checkbox]').prop('disabled', true);
                       $('#perm_cannot_select').show();
                       $('#perm_can_select').hide();
                    }
                    else
                    {
                       $('#perm_cannot_select').hide();
                       $('#perm_can_select').show();
                    }

                });
            }
            else
            {
                $('#custom_permission').hide();
            }
    }


    function user_checking(user_id)
    {
        $.post("{{url('/api/get_permission')}}",
        {
            user_id : user_id,
            var : 'user_permission',
            _token : "<?php echo csrf_token(); ?>"
        },
        function(data, status){
            var obj = data.result;
            $('#custom_permission').show();
            //looping group permission
            for(var i=0; i < obj.length; i++)
            {
                $('.checkbox-'+obj[i].permission_id).prop('checked', true);
            }

            if ($('.checkbox-1').is(':checked')) 
            {
               $('div#custom_permission input[type=checkbox]').prop('disabled', true);
               $('.checkbox-1').prop('disabled',false);
               $('#perm_cannot_select').show();
               $('#perm_can_select').hide();
            }

        });
    }

     $('document').ready(function(){

        var group = $('#group_id');
        group_checking(group.val());            
        user_checking("{{$user->id}}");    


        group.change(function(){
            group_checking(group.val());            
        });

        $('.checkbox-1').change(function()
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
                   // $('div#custom_permission input[type=checkbox]').prop('disabled', false);
                   group_checking(group.val());
                }
          });

     });
 </script>

@endsection
