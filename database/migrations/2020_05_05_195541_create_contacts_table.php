<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_contacto', 100);
            $table->string('Apellido_contacto', 100);
            $table->unsignedBigInteger('Dni_id');
            $table->string('Dni_contacto', 100);
            $table->string('Direccion_contacto', 100)->nullable()->default('cartagena');
            $table->string('Telefono_contacto', 100)->nullable()->default('300000000');
            $table->foreign('Dni_id')->references('id')->on('dnis')->onDelete('cascade');
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
        Schema::dropIfExists('contacts');
    }
}
