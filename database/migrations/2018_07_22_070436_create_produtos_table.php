<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique()->unsigned();
            $table->string('nome');
            $table->float('preco')->unsigned();
            // Foreign Key: código da categoria
            $table->integer('cod_categoria')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('produtos',function (Blueprint $table){
        // Foreign Key: código da categoria
          $table->foreign('cod_categoria')->references('id')->on('categorias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
