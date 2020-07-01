@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Tienda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Carro de compras</li>
        </ol>
    </nav>

    <body class="bg-light">

        <div class="container">
            <div class="py-5 text-center">
                <h2>Concretar pago</h2>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Tu compra</span>
                    </h4>

                    @foreach(\Cart::getContent() as $item)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="/images/{{ $item->attributes->image }}" style="width: 50px; height: 50px;">
                            </div>
                            <div class="col-lg-6">
                                <b>{{$item->name}}</b>
                                <br><small>Qty: {{$item->quantity}}</small>
                            </div>
                            <div class="col-lg-3">
                                <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
                            </div>
                            <hr>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total:</span>
                        <strong>${{ \Cart::getTotal() }}</strong>
                    </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nombre(s)</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    El nombre es requerido
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Apellidos</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    El apellido es requerido
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" id="address" placeholder="4a av..." required>
                            <div class="invalid-feedback">
                                Por favor ingrese una dirección
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Segunda dirección <span class="text-muted">(Opcional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Departamento, etc..">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Ciudad</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Seleccionar...</option>

                                </select>
                                <div class="invalid-feedback">
                                    Seleccione una opción
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">Estado</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Seleccionar...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione una opción
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">CP</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ingrese su CP
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">La dirección de envío es la misma que mi dirección de facturación</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Guardar mis datos</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Método de pago</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Tarjeta de dédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Nombre en la tarjeta</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <div class="invalid-feedback">
                                    El nombre es requerido
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Número en la tarjeta</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Requerido
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiración</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Requerido
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ingrese los 3 dígitos
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continuar</button>
                    </form>
                </div>
            </div>


        </div>


    </body>


</div>
@endsection