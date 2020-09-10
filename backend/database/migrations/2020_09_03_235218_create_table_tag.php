<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('repository_id');
            $table->string('id_tag_repository');
            $table->string('tag_name');
            $table->string('target_commitish')->nullable();
            $table->string('login');
            $table->text('body');
            $table->timestamps();

            $table->foreign('repository_id')->references('id')->on('repository');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag');
    }
}
