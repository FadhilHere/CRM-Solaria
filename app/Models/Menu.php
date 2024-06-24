<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Menentukan nama tabel
    protected $primaryKey = 'MenuID'; // Menyesuaikan primaryKey dengan skema yang diberikan
    protected $fillable = ['Gambar', 'Nama', 'Harga']; // Memastikan atribut-atribut ini dapat diisi massal

    // Tambahkan relasi atau fungsi tambahan jika diperlukan
}
