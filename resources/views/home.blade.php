@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center" style="margin-top: 50px;">
                <div class="card-header">
                    Admin panel
                </div>
                <div class="card-body">
                    <h5 class="card-title">Select an option</h5>
                    <button type="button" onclick="window.location='{{ url("admin/products") }}'" class="btn btn-primary btn-lg btn-block">Go to products</button>
                    <button type="button" onclick="window.location='{{ url("admin/users") }}'" class="btn btn-secondary btn-lg btn-block">Go to users</button>
                </div>
                <div class="card-footer text-muted">
                    {{ date('Y-m-d H:i:s') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection