<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Barangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->string('nama');
            $table->string('kategori');
            $table->string('jenis');
            $table->longText('deskripsi');
            $table->integer('stok');
            $table->string('foto');



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::dropIfExists('Barangs');

    }
}
