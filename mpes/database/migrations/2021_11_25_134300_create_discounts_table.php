<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{

    public function up()
    {       Schema::dropIfExists('discounts');

        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('discount_date');
            $table->integer('discount');
            $table->integer('discount_value');
            $table->foreignId(column:'product_id')->constrained(table:'products')->cascadeOnDelete();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('prices');

    }
}
