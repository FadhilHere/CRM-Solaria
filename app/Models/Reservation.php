<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation'; // Menentukan nama tabel
    protected $fillable = ['user_id', 'reservation_date', 'number_of_people', 'status']; // Memastikan atribut-atribut ini dapat diisi massal

    /**
     * Get the user who made the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
