@extends('layouts.app')


@section('page-title')
    {!! Lang::get('titles.pages.param') !!}
@endsection



@section('style-page')

@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('param')}}
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
                        <div class="white-box">
                         <!--    <a class="box-title btn btn-primary btn-xs btn-rounded" href="{{url('param/create')}}"><i class="fa fa-plus"></i> New Param</a> -->
                            <div class="table-responsive">
                                <table id="example23" class="table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="45%">Name</th>
                                            <th width="45%">Value</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        @foreach($params as $p)
                                        <tr>
                                            <td>{{$p->id}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->value}}</td>
                                           
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                 @if(config('app.pagination.enable'))
                                    <div>
                                    {{ $params->links() }}
                                </div>
                                 @endif
                            </div>
                        </div>
                    </div>
</div>

 @include('modals.modal-delete')

@endsection

@section('script-page')

@endsection
