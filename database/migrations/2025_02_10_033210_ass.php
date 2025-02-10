<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //REMEMBER TO INCLIDE IF ITS STILL BEING BORROWED
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->integer("kode");
            $table->string("judul");
            $table->string("pengarang");
            $table->string("penerbit");
            $table->year("tahun");
            $table->boolean("dipinjam");
        });
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("buku");
            $table->unsignedBigInteger("siswa");
            $table->date("pinjam");
            $table->date("kembali")->nullable();
        });
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->string("nama");
            $table->string("kelas");
            $table->string("jurusan");
            $table->string("username");
            $table->string('password');
            $table->boolean("admin");
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
