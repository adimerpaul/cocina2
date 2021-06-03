<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sale::all();
    }
    public  function historial(){
        return DB::table('sales')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(precio) as total'))
            ->groupBy('date')
            ->orderBy('date','desc')
            ->get();
    }
    public function cancelar(Request $request)
    {
//        return Sale::all();
        $sales=Sale::where('numpedido',$request->numpedido)->get();
        foreach ($sales as $sale){
            $p=Product::find($sale->product_id);
            $p->cantidad=$p->cantidad+1;
            $p->save();
        }
        DB::table('sales')->where('numpedido', $request->numpedido)->delete();
    }
    public function entregar(Request $request)
    {
//        return Sale::all();
        DB::table('sales')
            ->where('numpedido', $request->numpedido)
            ->update(['tipo' => 'VENTA']);
    }
    public function sales(Request $request)
    {
//        return $request->ventas;
        $numopedido = Sale::max('numpedido')+1;

        foreach ($request->ventas as $venta){
            for ($i=0;$i<$venta['cantidad'];$i++){
                $d=new Sale();
                $d->precio=$venta['precio'];
                $d->product_id=$venta['id'];
                $d->numpedido=$numopedido;
                $d->user_id=Auth::user()->id;
                if ($request->tipo=='RESERVA'){
                    $d->tipo='RESERVA';
                    $d->familia=$request->familia;
                    $d->celular=$request->celular;
                    $d->dir=$request->dir;
                    $d->obs=$request->obs;
                    $d->hora=$request->hora;
                }
                $d->save();
                $p=Product::find($venta['id']);
                $p->cantidad=$p->cantidad-1;

//                echo $request->tipo;
                $p->save();
            }

        }
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
//        if (isset($request->))
        $d=new Sale();
        $d->precio=$request->precio;
        $d->product_id=$request->product_id;
        $d->user_id=Auth::user()->id;
        $d->save();

        $p=Product::find($request->product_id);
        $p->cantidad=$p->cantidad-1;
        $p->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Sale::with('product')
            ->where('product_id','=',$id)
            ->whereDate('created_at','=',now())
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::truncate();
    }
    public function consulta($d1,$d2)
    {
//        if (Auth::user()->tipo=='ADMIN')
//            return Asistencia::with('persona')
//                ->with('destino')
//                ->with('user')
//                ->whereDate('created_at','>=',$d1)
//                ->whereDate('created_at','<=',$d2)
////                ->where('estado','=','')
//                ->get();
//        else
            return Sale::
                with('user')
                ->with('product')
//                ->with('user')
                ->where('tipo','VENTA')
                ->whereDate('created_at','>=',$d1)
                ->whereDate('created_at','<=',$d2)
                ->get();
    }
}
