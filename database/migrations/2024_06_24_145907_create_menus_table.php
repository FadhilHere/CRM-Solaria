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
        Schema::create('menu', function (Blueprint $table) {
            $table->id('MenuID');  // Menggunakan id dengan nama kustom
            $table->string('Gambar');
            $table->string('Nama');
            $table->decimal('Harga', 8, 2);  // Format harga dengan 8 digit dan 2 desimal
            $table->timestamps();  // Menambahkan created_at dan updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
