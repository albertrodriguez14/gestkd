<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Dni_id');
            $table->string('numero_Dni');
            $table->string('Nombre', 100);
            $table->string('Apellido', 100);
            $table->year('Nacimiento');
            $table->string('Direccion',100);
            $table->string('Telefono',50)->nullable()->default('0000000');
            $table->unsignedBigInteger('Eps_id');
            $table->unsignedBigInteger('Contacto_id');
            $table->string("Foto")->nullable()->default('sin foto');

            $table->foreign('Dni_id')->references('id')->on('dnis')->onDelete('cascade');
            $table->foreign('Eps_id')->references('id')->on('healts')->onDelete('cascade');
            $table->foreign('Contacto_id')->references('id')->on('Contacts')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
