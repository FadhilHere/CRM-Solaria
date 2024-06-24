<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo'; // Menentukan nama tabel
    protected $primaryKey = 'PromoID'; // Menyesuaikan primaryKey dengan skema yang diberikan
    protected $fillable = ['namaPromo', 'TanggalExpired', 'jumlah']; // Memastikan atribut-atribut ini dapat diisi massal

    // Tambahkan relasi atau fungsi tambahan jika diperlukan
}
