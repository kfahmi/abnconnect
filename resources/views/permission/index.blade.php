@extends('layouts.app')



@section('page-title')
    {!! Lang::get('titles.pages.permission') !!}
@endsection



@section('style-page')

@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('permission')}}
@endsection


@section('content')

<div class="row">
    <div class="col-sm-12">
                        <div class="white-box">
                            <a class="box-title btn btn-primary btn-xs btn-rounded" href="{{url('permission/create')}}"><i class="fa fa-plus"></i> New Permission</a>
                            <div class="table-responsive">
                                <table id="example23" class="table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="30%">Permission</th>
                                            <th width="30%">Description</th>
                                            <th width="30%">Created</th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        @foreach($permissions as $p)
                                        <tr>
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->description}}</td>
                                            <td>
                                            	{{GFormatter::convertTimestamp($p->created_at,true,'D, d M Y, H:i')}}
                                            </td>

                                            <td>
                                                 <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('permission/' . $p->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! Lang::get('button.icon.edit') !!}
                                                </a>

                                                {!! Form::open(array('url' => 'permission/' . $p->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(Lang::get('button.icon.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Permission', 'data-message' => 'Are you sure you want to delete this Permission ?')) !!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                 @if(config('app.pagination.enable'))
                                    <div>
                                    {{ $permissions->links() }}
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