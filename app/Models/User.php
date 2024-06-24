<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user'; // Menentukan nama tabel
    protected $fillable = ['name', 'email', 'phone_number', 'address', 'date_of_birth', 'role']; // Memastikan atribut-atribut ini dapat diisi massal

    /**
     * Get the orders associated with the user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'CustomerID');
    }

    /**
     * Get the reservations made by the user.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'CustomerID');
    }
}
