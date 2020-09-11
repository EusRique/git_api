<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRepository extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repository', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_repository');

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('language')->nullable();
            $table->string('owner')->nullable();
            $table->string('token_git');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('repository');
    }
}
