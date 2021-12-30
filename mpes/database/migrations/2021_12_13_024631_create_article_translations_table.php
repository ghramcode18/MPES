<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('article_translations', function (Blueprint $table) {
            // mandatory fields
        $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
        $table->string('locale')->index();
 
        // Foreign key to the main model
        $table->unsignedInteger('article_id');
        $table->unique(['article_id', 'locale']);
        $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
         
        // Actual fields you want to translate
        $table->string('title');
        $table->longText('full_text');
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_translations');
    }
}
