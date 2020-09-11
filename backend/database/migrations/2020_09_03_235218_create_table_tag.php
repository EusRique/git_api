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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('repository_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_tag_repository');

            $table->string('tag_name');
            $table->string('target_commitish')->nullable();
            $table->string('login');
            $table->text('body');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
