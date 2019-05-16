@extends('layouts.app')


@section('page-title')
    {!! Lang::get('titles.pages.group') !!}
@endsection

@section('style-page')

@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('group')}}
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
                        <div class="white-box">
                            <a class="box-title btn btn-primary btn-xs btn-rounded" href="{{url('group/create')}}"><i class="fa fa-plus"></i> New Group</a>
                            <div class="table-responsive">
                                <table id="example23" class="table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="20%">Group</th>
                                            <th width="30%">Permissions</th>
                                            <th width="20%">Created</th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        @foreach($groups as $group)
                                        <tr>
                                            <td>{{$group->id}}</td>
                                            <td>{{$group->name}}</td>
                                            <td>

                                                <span style="font-size: 70%"> 
                                            	@foreach($group->groupPermission as $gp)
                                            	<li>
                                            	<code> 
                                            		{{$gp->name}}
                                            	</code>
                                            	</li>	
                                            	@endforeach
                                                </span>
                                            </td>
                                            <td>
                                            	{{GFormatter::convertTimestamp($group->created_at,true,'D, d M Y, H:i')}}
                                            </td>

                                            <td>
                                                 <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('group/' . $group->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! Lang::get('button.icon.edit') !!}
                                                </a>

                                                {!! Form::open(array('url' => 'group/' . $group->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(Lang::get('button.icon.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete group', 'data-message' => 'Are you sure you want to delete this group ?')) !!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                 @if(config('app.pagination.enable'))
                                    <div>
                                    {{ $groups->links() }}
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