<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function(Blueprint $table){
            $table->increments('id');
            $table->string('productname');
            $table->integer('categoryId');
            $table->string('productCode');
            $table->string('productColor');
            
            $table->text('description');
            $table->float('price');
            $table->string('image');
            $table->rememberToken();
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
        //
    }
}
