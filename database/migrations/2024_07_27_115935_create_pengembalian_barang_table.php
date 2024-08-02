<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianBarangTable extends Migration
{
    public function up()
    {
        Schema::create('pengembalian_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_pinjaman_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tanggal_pengembalian');
            $table->tinyInteger('status_pengembalian');
            $table->timestamps();

            $table->foreign('permohonan_pinjaman_id')->references('id')->on('permohonan_pinjaman')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action'); // Mengubah ON DELETE menjadi NO ACTION
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengembalian_barang');
    }
}
