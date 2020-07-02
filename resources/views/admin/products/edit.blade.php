@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-8">
            <div class="panel-body">
                {!! Form::open(['action' => ['ProductController@update', $product->id],'method' => 'PATCH', 'enctype'=> 'multipart/form-data']) !!}

                <div class="form-group">
                    {{Form::label('name', 'Nombre')}}
                    {{Form::text('name', $product->name, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('slug', 'Slug')}}
                    {{Form::text('slug', $product->slug, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Descripción')}}
                    {{Form::textarea('description', $product->description, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('price', 'Precio')}}
                    {{Form::number('price', $product->price, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::file('image_path')}}
                </div>
                <div class="form-group">
                    {!! Form::checkbox('status', '0') !!}
                    {!! Form::label('status', 'Marque para dejar inactivo') !!}
                </div>
                {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
@endsection