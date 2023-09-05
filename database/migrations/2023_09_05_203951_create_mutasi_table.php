<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->float('mutasi')->nullable();
            $table->unsignedBigInteger('patien_id'); // Foreign key column
            $table->foreign('patien_id')->references('id')->on('patient');
            $table->unsignedBigInteger('inventory_id'); // Foreign key column
            $table->foreign('inventory_id')->references('id')->on('inventory');
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
        Schema::dropIfExists('mutasi');
    }
}
