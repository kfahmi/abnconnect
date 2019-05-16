@if (count($breadcrumbs))
<div class="row bg-title">
    <div class="col-xs-12">
        <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
        
@endif


