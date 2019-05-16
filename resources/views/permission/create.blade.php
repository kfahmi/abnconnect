

@extends('layouts.app') 

@section('page-title')
    {!! Lang::get('titles.pages.dashboard') !!}
@endsection



@section('breadcrumbs')
{{Breadcrumbs::render('permission.create')}}
@endsection


@section('content')
<!-- .row -->
{!! Form::open(array('route' => 'permission.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

<div class="row">
    <div class="col-md-7">
    <div class="white-box">
        <h3 class="box-title m-b-0">Permission</h3>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                    
                    <div class="form-group {{ $errors->has('name') ? ' has-error ' : '' }}">
                        <label for="exampleInputEmail1">Permission Name</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-users"></i></div>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Permission Name" value="{{ old('name') }}">
                        </div>
                        <span class="help-block">
                            <code>e.g : user.create, group.create, etc</code>
                        </span>
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
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ old('description') }}"> 
                        </div>
                        
                    </div>
            </div>
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

@endsection
