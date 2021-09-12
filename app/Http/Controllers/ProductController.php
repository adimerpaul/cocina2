<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservas(){
//        $users = Sale::orderBy('numpedido', 'desc')
//            ->groupBy('numpedido')
////            ->having('count', '>', 100)
//            ->get();
//        $orders = DB::table('sales')
//            ->select('numpedido','count(*)')
//            ->groupBy('numpedido')
//            ->get();
//        $pro=Product::all();
//        $orders = DB::table('sales')
//            ->select(DB::raw('count(*) cantidad,numpedido,familia'))
//            ->where('tipo', 'RESERVA')
//            ->groupBy('numpedido','familia')
////            ->with('product',$pro)
//            ->with(['products' => function($query) {
////                $query->select('products.*')
////                ->table('products');
//                $query->where('nombre', 'like', '%PI%');
////                    ->leftJoin('enhancements', function($join) {
////                        $join->on('enhancements.business_id', '=', 'businesses.id')
////                            ->join('products', 'products.id', 'enhancements.product_id');
////                    })
////                    ->orderByRaw('FIELD(products.slug, ?, ?) DESC', ['enhanced-listing', 'premium-listing'])
////                    ->orderByRaw('CASE WHEN products.slug IS NOT NULL THEN RAND() ELSE businesses.name END');
//            }])
//            ->get();
//        return $orders;
//        $users = User::with(['sales' => function($query)
//        {
////            $query->where('tipo', 'like', '%VE%');
//
//        }])->get();
//        $users=User::all();
//        $users = User::with('sales')->get();

//        $users = User::with(['sales' => function($query)
//        {
//            $query->orderBy('created_at', 'desc');
//
//        }])->get();
//                $orders = DB::table('sales')
//            ->select(DB::raw('count(*) cantidad,numpedido,familia'))
//            ->where('tipo', 'RESERVA')
//            ->groupBy('numpedido','familia')
////            ->with('product',$pro)
////            ->with(['products' => function($query) {
//////                $query->select('products.*')
//////                ->table('products');
////                $query->where('nombre', 'like', '%PI%');
////                    ->leftJoin('enhancements', function($join) {
////                        $join->on('enhancements.business_id', '=', 'businesses.id')
////                            ->join('products', 'products.id', 'enhancements.product_id');
////                    })
////                    ->orderByRaw('FIELD(products.slug, ?, ?) DESC', ['enhanced-listing', 'premium-listing'])
////                    ->orderByRaw('CASE WHEN products.slug IS NOT NULL THEN RAND() ELSE businesses.name END');
////            }])
//            ->get();
//        $orders=Sale::with('product')->where('tipo','RESERVA')->get();
//        return $orders;
//        return User::all()->toArray();
        return Sale::with('details')->with('delivery')->get();
    }


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
//        return Product::with('details')->with('detail')->where('estado','=','VISIBLE')->get();
        return DB::select("SELECT p.id,p.photo,p.nombre,p.cantidad,p.precio,(
            select sum(d.cantidad) from details d where d.product_id=p.id
        )vendido
        FROM products p
        WHERE estado='VISIBLE'");
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
    public function updateFoto(Request $request, $id)
    {
        $request->hasFile('image')?$path=$request->file('image')->store('image'):$path="";
        $d=Product::find($id);
//        $d->nombre=$request->nombre;
//        $d->cantidad=$request->cantidad;
//        $d->precio=$request->precio;
        $d->photo=$path;
//        $d->tipo=$request->tipo;
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
    public function destroy(Product $product)
    {
//        return "a";
//        $d=Product::find($id);
//        $d->delete();
        $product->delete();
    }
}
