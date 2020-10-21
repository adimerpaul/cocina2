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
    public function ventas()
    {
        return $this->hasMany('App\Models\Sale')
            ->selectRaw('product_id,SUM(precio) as total')
            ->whereDate('created_at','=',now())
            ->groupBy('product_id');
    }
}
