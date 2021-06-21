@include("admin_header")
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h5>All songs</h5>

            @if($error)
                {{$error}}
            @else
                <div style="overflow-x:auto">{!! $listHTML !!}</div>
            @endif
        </div>
    </div>
</div>
@include("admin_footer")