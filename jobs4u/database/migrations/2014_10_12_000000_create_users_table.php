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
            $table->text('picture', 300);
            $table->text('description')->nullable();
            $table->string('street', 45);
            $table->integer('number')->length(4);
            $table->string('postal_code', 8);
            $table->string('complment', 16)->nullable();
            $table->string('city', 40);
            $table->enum('state', ['Acre – AC', 'Alagoas – AL', 'Amapá – AP', 'Amazonas – AM', 'Bahia – BA', 'Ceará – CE', 'Distrito Federal – DF', 'Espírito Santo – ES', 'Goiás – GO', 'Maranhão – MA', 'Mato Grosso – MT', 'Mato Grosso do Sul – MS', 'Minas Gerais – MG', 'Pará – PA', 'Paraíba – PB', 'Paraná – PR', 'Pernambuco – PE', 'Piauí – PI', 'Roraima – RR', 'Rondônia – RO', 'Rio de Janeiro – RJ', 'Rio Grande do Norte – RN', 'Rio Grande do Sul – RS', 'Santa Catarina – SC', 'São Paulo – SP', 'Sergipe – SE', 'Tocantins – TO']);
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
