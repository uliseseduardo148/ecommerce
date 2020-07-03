<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Subir archivo
        if ($request->hasFile('image_path')) {
            //Nombre de archivo con extension
            $fileNameWithExt = $request->file('image_path')->getClientOriginalName();
            //Nombre de archivo sin extension
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Solo extension
            $extension = $request->file('image_path')->getClientOriginalExtension();
            //Nombre de archivo a guardar
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Subir archivo al servidor
            $path = $request->file('image_path')->storeAs(
                'public/images',
                $fileNameToStore
            );
        } else {
            $fileNameToStore = 'logo.png';
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image_path = $fileNameToStore;
        $product->status = 1;
        $product->save(); //Guarda los datos en BD
        return redirect('/admin/products')->with('success_msg', 'Producto registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
    public function update(Request $request, $id)
    {
        //Subir archivo
        if ($request->hasFile('image_path')) {
            //Nombre de archivo con extension
            $fileNameWithExt = $request->file('image_path')->getClientOriginalName();
            //Nombre de archivo sin extension
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Solo extension
            $extension = $request->file('image_path')->getClientOriginalExtension();
            //Nombre de archivo a guardar
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Subir archivo al servidor
            $path = $request->file('image_path')->storeAs(
                'public/images',
                $fileNameToStore
            );
        } else {
            $fileNameToStore = 'logo.png';
        }

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image_path = $fileNameToStore;
        $product->status = $request->input('status') ?: 1;
        $product->save(); //Guarda los datos en BD
        return redirect('/admin/products')->with('success_msg', 'Datos actualizados');
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
        return redirect('/admin/products')->with('success_msg', 'Registro eliminado correctamente');
    }
}
