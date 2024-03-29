<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->double('precio',11,2);
            $table->string('tipo')->nullable()->default('VENTA');
            $table->string('tipo2')->nullable()->default('RESTAURANTE');
            $table->integer('numpedido')->default(1);
            $table->string('familia')->nullable();
            $table->string('celular')->nullable();
            $table->string('dir')->nullable();
            $table->string('obs')->nullable();
            $table->string('hora')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
//            $table->unsignedBigInteger('product_id');
//            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('delivery_id')->default(1);
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
