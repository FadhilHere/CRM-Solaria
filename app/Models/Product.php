<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product'; // Menentukan nama tabel
    protected $fillable = ['name', 'price', 'description']; // Memastikan atribut-atribut ini dapat diisi massal

    /**
     * Get the order details associated with the product.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'ProductID');
    }
}
