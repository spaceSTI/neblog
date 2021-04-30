<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ZeroDump extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('title', 255);
            $table->text('brief');
            $table->text('article')->nullable(true);
            $table->string('keywords');
            $table->string('status', 255);
            $table->dateTime('created_at');
            $table->index(['created_at', 'status']);
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('tag', 255);
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id');
            $table->integer('tag_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('article_tag');
    }
}
