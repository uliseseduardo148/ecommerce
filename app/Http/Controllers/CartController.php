<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return \View::make('shop.shop')->withTitle('E-COMMERCE STORE | TIENDA')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        return \View::make('shop.cart')->withTitle('E-COMMERCE STORE | CARRO')->with(['cartCollection' => $cartCollection]);
    }
    
    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));


        return redirect()->route('cart.index')->with('success_msg', 'Item gregado al carro de compras!');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item removido!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Pedido actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Producto(s) eliminado(s)!');
    }

}
