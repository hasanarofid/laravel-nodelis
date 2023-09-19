<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_test', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('paket_id'); // Foreign key column
            $table->foreign('paket_id')->references('id')->on('paket');
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
        Schema::dropIfExists('master_test');
    }
}
