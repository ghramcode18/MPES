<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShowToProductTable extends Migration
{
   
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('view')->after('num_likes');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            
        });
    }
}
