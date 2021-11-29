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
            $table->string('product_name');
            $table->date('expiry_date');
            $table->text('image');
            $table->string('type');
            $table->integer('num_likes');
            $table->integer('price');
            $table->integer('amount_products');
            $table->foreignId(column:'user_id')->constrained(table:'users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
