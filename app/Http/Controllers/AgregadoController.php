<?php

namespace App\Http\Controllers;

use App\Models\Agregado;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgregadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
//        return $request;
//        Agregado::create($request->all());
        $agregado=new Agregado();
        $agregado->product_id=$request->product_id;
        $agregado->product_id2=$request->product_id2;
        $agregado->cantidad=$request->cantidad;
        $agregado->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function show(Agregado $agregado)
    {
        return $agregado;
//        return $product::with('agregados')->get();
    }
    public function misagregados($id){
        return DB::select("SELECT p.nombre,a.cantidad,a.id
FROM agregados a
INNER JOIN products p ON p.id=a.product_id2
WHERE product_id='$id' ");
//        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function edit(Agregado $agregado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agregado $agregado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agregado $agregado)
    {
        $agregado->delete();
    }
}
