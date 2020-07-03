@if(session()->has('success_msg'))
<div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm-8">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    <div class="col-sm">
    </div>
</div>
@endif

@if(session()->has('alert_msg'))
<div class="row">
    <div class="col-sm-8">
    </div>
    <div class="col-sm">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session()->get('alert_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    <div class="col-sm">
    </div>
</div>
@endif

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    <div class="col-sm">
    </div>
</div>
@endforeach
@endif