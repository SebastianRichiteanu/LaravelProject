<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->float('price');
            $table->string('description');
            $table->boolean('available');
            $table->string('image');
            $table->integer('rating')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
