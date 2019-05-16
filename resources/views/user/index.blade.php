@extends('layouts.app')

@section('page-title')
    {!! Lang::get('titles.pages.user') !!}
@endsection


@section('style-page')

@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('user')}}
@endsection


@section('content')

<div class="row">
    <div class="col-sm-12">
                        <div class="white-box">
                            <a class="box-title btn btn-primary btn-xs btn-rounded" href="{{url('user/create')}}"><i class="fa fa-plus"></i> New User</a>
                            <div class="table-responsive">
                                <table id="example23" class="table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>E-mail</th>
                                            <th>Username</th>
                                            <th>Real Name</th>
                                            <th>Group</th>
                                            <th>Active</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->realname}}</td>
                                            <td>{{$user->group->name}}</td>
                                            <td>
                                                {!! $user->isActive('icon') !!}

                                                @if($user->isActive())
                                                <span style="font-size: 70%"> 
                                                    @foreach($user->allPermission() as $p)
                                                        <li><code>{{$p}}</code></li>
                                                    @endforeach
                                                </span>
                                                @endif

                                            </td>
                                            <td>{{GFormatter::convertTimestamp($user->create_time,true,'D, d M Y, H:i')}}</td>

                                            <td>
                                                 <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('user/' . $user->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! Lang::get('button.icon.edit') !!}
                                                </a>

                                                {!! Form::open(array('url' => 'user/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(Lang::get('button.icon.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                 @if(config('app.pagination.enable'))
                                    <div>
                                    {{ $users->links() }}
                                </div>
                                 @endif
                            </div>
                        </div>
                    </div>
</div>

 @include('modals.modal-delete')
@endsection

@section('script-page')


@include('scripts.delete-modal-script')
@include('scripts.save-modal-script')

@endsection