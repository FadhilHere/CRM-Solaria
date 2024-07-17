<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'date_of_birth',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }
    public function getMonthlyAverageSpendingAttribute()
    {
        $oneMonthAgo = Carbon::now()->subMonth();
        $totalSpent = $this->orders()
            ->where('created_at', '>=', $oneMonthAgo)
            ->sum('total_price');

        return $totalSpent;
    }

    public function updateLoyaltyLevel()
    {
        $averageSpending = $this->monthly_average_spending;

        if ($averageSpending >= 1000000) {
            $this->loyalty_level = 'Platinum';
        } elseif ($averageSpending >= 500000) {
            $this->loyalty_level = 'Gold';
        } elseif ($averageSpending >= 200000) {
            $this->loyalty_level = 'Silver';
        } else {
            $this->loyalty_level = 'Bronze';
        }

        $this->save();
    }
}
