<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreataTableMutasiTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('mutasi_tindakan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->float('mutasi')->nullable();
            $table->unsignedBigInteger('patien_id'); // Foreign key column
            $table->foreign('patien_id')->references('id')->on('patient');
            $table->unsignedBigInteger('tindakan_id'); // Foreign key column
            $table->foreign('tindakan_id')->references('id')->on('master_tindakan');
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
        //
    }
}
