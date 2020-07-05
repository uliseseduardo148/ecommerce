<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product= new Product();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'desc')->paginate(10);
        return \View::make('admin.products.table')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     * By default, the product is registered with status '1', that is, 'active'
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();
        //We get the image's name
        $path = $this->product->uploadImage($request);
        $product = new Product;
        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->image_path = $path;
        $product->status = 1;
        $product->save(); 
        
        return redirect('/admin/products')->with('success_msg', 'Product registered succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        return \View::make('shop.details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return \View::make('admin.products.edit')->with(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $validatedData = $request->validated();
        $product = Product::find($id);
        //We check if the user has selected a new image, if not,
        //we leave the image that was already assigned
        $path = $this->product->uploadImage($request) ?: $product['image_path'] ;
        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->image_path = $path;
        //We check if the user has disabled the visibility of the product in the client's index
        $request->input('status')? $product->status=0 : $product->status=1;
        $product->save(); 
        return redirect('/admin/products')->with('success_msg', 'Product updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect('/admin/products')->with('success_msg', 'Product deleted succesfully');
    }
}
