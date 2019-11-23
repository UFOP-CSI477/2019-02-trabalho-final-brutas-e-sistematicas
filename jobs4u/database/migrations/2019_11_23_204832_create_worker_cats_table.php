<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_cats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cpf_user')->unsigned()->length(11);
            $table->bigInteger('id_cat')->unsigned();
            $table->timestamps();
        });

        Schema::table('worker_cats', function (Blueprint $table){
            $table->foreign('cpf_user')->references('cpf')->on('users')->onDelete('cascade');
            $table->foreign('id_cat')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_cats');
    }
}
