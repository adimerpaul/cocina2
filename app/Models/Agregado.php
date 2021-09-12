<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'product_id2',
        'cantidad'
    ];
    public function producto(){
        return $this->belongsTo(Product::all());
    }
}
