<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;
    protected $fillable = [
        'livre_id',
        'user_id',
        'status',
        'duree',
    ];
    protected $attributes = [
        'status' => 'en_attente',

    ];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function pret()
    {
        return $this->belongsTo(Pret::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
