<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nombre'=>'CHICHARRON',
            'tipo'=>'COMIDA',
            'cantidad'=>'10',
            'precio'=>'40.00',
            'photo'=>'image/1.jpeg'
        ]);

        DB::table('products')->insert([
            'nombre'=>"K'JARAS",
            'tipo'=>'COMIDA',
            'cantidad'=>'10',
            'precio'=>'40.00',
            'photo'=>'image/2.jpeg'
        ]);

        DB::table('products')->insert([
            'nombre'=>'PIQUE',
            'tipo'=>'COMIDA',
            'cantidad'=>'10',
            'precio'=>'35.00',
            'photo'=>'image/3.jpeg'
        ]);

        DB::table('products')->insert([
            'nombre'=>'PLANCHITA FAMILIAR',
            'tipo'=>'COMIDA',
            'cantidad'=>'10',
            'precio'=>'70.00',
            'photo'=>'image/4.jpeg'
        ]);

        DB::table('products')->insert([
            'nombre'=>'PLANCHITA INDIVIDUAL',
            'tipo'=>'COMIDA',
            'cantidad'=>'10',
            'precio'=>'40.00',
            'photo'=>'image/5.jpeg'
        ]);

        DB::table('products')->insert([
            'nombre'=>'CHOP SAZON',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'20.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'COCA COLA 2 LTS',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'12.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'FANTA 2 LTS',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'12.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'SPRITE 2 LTS',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'12.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'BOTELLA DE VINO',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'35.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'JUGO DEL VALLE',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'15.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'CAJA REAL NEGRO',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'140.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'CERVEZA HUARI',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'20.00',
            'photo'=>'image/6.jpeg'
        ]);
        DB::table('products')->insert([
            'nombre'=>'JARRA COCKTALL',
            'tipo'=>'BEBIDA',
            'cantidad'=>'10',
            'precio'=>'10.00',
            'photo'=>'image/6.jpeg'
        ]);

    }
}
