@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tienda</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>Detalles del producto</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card" style="margin-bottom: 20px; height: auto;">
                        <img src="/images/{{ $product->image_path }}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;" alt="{{ $product->image_path }}">
                        <div class="card-body">
                            <a href="">
                                <h6 class="card-title">{{ $product->name }}</h6>
                            </a>
                            <p>${{ $product->price }}</p>
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                <input type="hidden" value="{{ $product->description }}" id="description" name="description">
                                <input type="hidden" value="{{ $product->image_path }}" id="img" name="img">
                                <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <div class="card-footer" style="background-color: white;">
                                    <div class="row">
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection