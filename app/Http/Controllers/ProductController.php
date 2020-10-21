<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Product::create($request->all());
        $path = $request->file('image')->store('image');
        $d=new Product();
        $d->nombre=$request->nombre;
        $d->cantidad=$request->cantidad;
        $d->precio=$request->precio;
        $d->tipo=$request->tipo;
        $d->photo=$path;
//        $d->photo='';
        $d->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d=Product::find($id);
        if ($d->estado=='VISIBLE')
            $d->estado='OCULTO';
        else
            $d->estado='VISIBLE';
        $d->save();
    }

    public function productSale()
    {
        return Product::where('estado','=','VISIBLE')->with('sale')->with('ventas')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->hasFile('image')?$path=$request->file('image')->store('image'):$path="";
        $d=Product::find($id);
        $d->nombre=$request->nombre;
        $d->cantidad=$request->cantidad;
        $d->precio=$request->precio;
        $d->photo=$path;
        $d->tipo=$request->tipo;
        $d->save();
//        $_POST['image'];
    }
    public function modificar(Request $request, $id)
    {
        $d=Product::find($id);
        $d->nombre=$request->nombre;
        $d->cantidad=$request->cantidad;
        $d->precio=$request->precio;
        if ($request->hasFile('image')) {
            $request->image!=''?$path=$request->file('image')->store('image'):$path="";
        }else{
            $path="";
        }
        if ($path==""){

        }else{
            $d->photo=$path;
        }
        $d->tipo=$request->tipo;
        $d->save();
//        var_dump($_POST['image']);
//        return  $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Product::find($id);
        $d->delete();
    }
}
