<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');//->nullable($value = false);
            //$table->float('price');
            $table->text('description')->nullable();;
            $table->text('url');//->nullable($value = false);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('wishlists_id');
            $table->foreign('wishlists_id')->references('id')->on('wishlists')->onUpdate('cascade')->onDelete('no action');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('no action');
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
        Schema::dropIfExists('products');
    }
}
