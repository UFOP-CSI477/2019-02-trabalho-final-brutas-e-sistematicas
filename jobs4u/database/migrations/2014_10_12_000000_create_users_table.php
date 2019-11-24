<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('cpf', 11)->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('picture', 300)->nullable();
            $table->text('description')->nullable();
            $table->string('street', 45);
            $table->integer('number')->length(4);
            $table->string('postal_code', 8);
            $table->string('complment', 16)->nullable();
            $table->string('city', 40);
            $table->enum('state', ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO']);
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->index('cpf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
