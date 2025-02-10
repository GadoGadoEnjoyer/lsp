<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('buku')->references('id')->on('buku')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("siswa")->references("id")->on("siswa")->onUpdate('cascade')->onDelete('cascade');
        });
        //I know this should be in seeding but idc lollllll
        DB::table('siswa')->insert([
            'id' => 1,
            'nis' => 999,
            'nama' => 'admin',
            'kelas' => 'VX',
            'jurusan' => "E",
            'username' => "admin",
            "password" => bcrypt("admin"),
            "admin" => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
