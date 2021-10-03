<?php

namespace App\Http\Controllers;

use App\Models\Agregado;
use App\Models\Detail;
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
    public function mitotal(){
        return  DB::select("select SUM(subtotal) as total FROM details");
    }
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
        $details=Detail::where('sale_id',$sales[0]->id)->get();
        foreach ($details as $detail){
            $p=Product::find($detail->product_id);
            $p->cantidad=$p->cantidad+$detail->cantidad;
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
        $sale=new Sale();
        $sale->precio=$request->precio;
        $sale->tipo=$request->tipo;
        $sale->tipo2=$request->tipo2;
        $sale->numpedido=$numopedido;
        $sale->familia=$request->familia;
        $sale->celular=$request->celular;
        $sale->dir=$request->dir;
        $sale->obs=$request->obs;
        $sale->hora=$request->hora;
        $sale->user_id=Auth::user()->id;
        $sale->delivery_id=$request->delivery_id;
        $sale->save();
        foreach ($request->ventas as $venta){
            $d=new Detail();
            $d->cantidad=$venta['cantidad'];
            $d->subtotal=$venta['subtotal'];
            $d->precio=$venta['precio'];
            $d->nombre=$venta['nombre'];
            $d->product_id=$venta['id'];
            $d->sale_id=$sale->id;
            $d->save();

            $p=Product::find($venta['id']);
            $p->cantidad=$p->cantidad-$venta['cantidad'];
            $p->save();
            $a=Agregado::where('product_id',$venta['id']);
//            echo $a->count().'---';
            if ($a->count()>0){
                foreach ($a->get() as $pro){
//                                echo $pro['product_id2'].'---';
                    $p=Product::find($pro['product_id2']);
                    $p->cantidad=$p->cantidad-$venta['cantidad'];
                    $p->save();
                    $d=new Detail();

                    $d->cantidad=$venta['cantidad'];
                    $d->subtotal=0;
                    $d->precio=0;
                    $d->nombre=$p['nombre'];
                    $d->product_id=$pro['product_id2'];
                    $d->sale_id=$sale->id;
                    $d->save();



                }
            }
        }

//        foreach ($request->ventas as $venta){
//            for ($i=0;$i<$venta['cantidad'];$i++){
//                $d=new Sale();
//                $d->precio=$venta['precio'];
//                $d->delivery_id=$venta['delivery_id'];
//                $d->product_id=$venta['id'];
//                $d->numpedido=$numopedido;
//                $d->user_id=Auth::user()->id;
//                if ($request->tipo=='RESERVA'){
//                    $d->tipo='RESERVA';
//                    $d->familia=$request->familia;
//                    $d->celular=$request->celular;
//                    $d->dir=$request->dir;
//                    $d->obs=$request->obs;
//                    $d->hora=$request->hora;
//                }
//                $d->save();
//                $p=Product::find($venta['id']);
//                $p->cantidad=$p->cantidad-1;
//
////                echo $request->tipo;
//                $p->save();
//            }
//
//        }
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
//        Sale::truncate();
        DB::select("        DELETE FROM sales");
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
                with('delivery')
                ->with('details')
//                ->with('user')
                ->where('tipo','VENTA')
                ->whereDate('created_at','>=',$d1)
                ->whereDate('created_at','<=',$d2)
                ->get();
    }
    public function cantidades($d1,$d2){
        return DB::select("SELECT nombre,SUM(cantidad) as cantidad FROM `details` WHERE date(created_at)>=date('".$d1."') AND date(created_at)<=date('".$d2."') GROUP BY nombre");
    }
}
