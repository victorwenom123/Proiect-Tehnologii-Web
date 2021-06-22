@include("admin_header")
<div class="container" style="margin:auto;">
    <div class="row">
        <div class="col-10">
            <h5>All users</h5>

            @if($error)
                {{$error}}
            @else
                {!! $listHTML !!}
            @endif
        </div>
    </div>
</div>
@include("admin_footer")