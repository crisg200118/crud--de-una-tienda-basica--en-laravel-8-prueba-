<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
          $table->id();


          /*$table->foreignId('producto_id')->constrained('products');
          $table->foreignId('vendedor_id')->constrained('vendedores');
          $table->foreignId('tienda_id')->constrained('tiendas');
          $table->timestamps();*/

          $table->unsignedBigInteger('producto_id');      
          $table->unsignedBigInteger('vendedor_id');
          $table->unsignedBigInteger('tienda_id');


          $table->foreign('producto_id')->references('id')->on('products');
          $table->foreign('vendedor_id')->references('id')->on('vendedores');
          $table->foreign('tienda_id')->references('id')->on('tiendas');


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
        Schema::dropIfExists('ventas');
    }
}
