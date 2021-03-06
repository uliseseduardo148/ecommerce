@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-8">
            <div class="panel-body">
                {!! Form::open(['action' => ['ProductController@store'],'method' => 'POST', 'enctype'=> 'multipart/form-data']) !!}

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '', ['class' => 'form-control','onkeyup'=> 'generateSlug(this.value)'])}}
                </div>
                <div class="form-group">
                    {{Form::label('slug', 'Slug')}}
                    {{Form::text('slug', '', ['class' => 'form-control', 'readonly'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{Form::number('price', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::file('image_path')}}
                </div>
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
@endsection