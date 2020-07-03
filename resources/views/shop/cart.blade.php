@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-7">
            <br>
            @if(\Cart::getTotalQuantity()>0)
            <h4>{{ \Cart::getTotalQuantity()}} Product(s) in the car</h4><br>
            @else
            <h4>There aren't products in the car</h4><br>
            <a href="/" class="btn btn-dark">Continue shopping</a>
            @endif

            @foreach($cartCollection as $item)
            <div class="row">
                <div class="col-lg-3">
                    <img src="/images/{{ $item->attributes->image }}" class="img-thumbnail" width="200" height="200">
                </div>
                <div class="col-lg-5">
                    <p>
                        <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                        <b>Price: </b>${{ $item->price }}<br>
                        <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                        {{-- <b>Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <form action="{{ route('cart.update') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                            </div>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                            <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @if(count($cartCollection)>0)
            <form action="{{ route('cart.clear') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-secondary btn-md">Clear</button>
            </form>
            @endif
        </div>
        @if(count($cartCollection)>0)
        <div class="col-lg-5">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                </ul>
            </div>
            <br><a href="/" class="btn btn-dark">Continue shopping</a>
            <a href="/checkout" class="btn btn-success">Make payment</a>
        </div>
        @endif
    </div>
    <br><br>
</div>
@endsection