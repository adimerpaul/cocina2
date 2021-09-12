<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function sale()
    {
        return $this->hasMany('App\Models\Sale')->whereDate('created_at','=',now());
    }
    public function details()
    {
        return $this->hasMany(Detail::class)
            ->selectRaw('product_id,SUM(cantidad) as total')
            ->whereDate('created_at','=',now())
            ->groupBy('product_id');
    }
    public function detail(){
        return $this->hasMany(Detail::class);
    }
    public function agregados(){
        return $this->hasMany(Agregado::class)->with('producto');
    }
}
