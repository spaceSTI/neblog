<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
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
            $table->string('title',255)->nullable(false);
            $table->text('brief')->nullable(false);
            $table->text('article')->nullable(true);
            $table->string('status',255)->nullable(false);
            $table->dateTime('created_at')->nullable(false);
            $table->index(['status','created_at']);
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
    }
}
