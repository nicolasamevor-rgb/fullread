<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pret extends Model
{
    /** @use HasFactory<\Database\Factories\PretFactory> */
    use HasFactory;
    protected $fillable = [
        'reservation_id',
        'date_retour_prevue',
        'date_retour_effective',
        'exemplaire_id',

    ];
    protected $attributes = [
        'date_retour_prevue' => NULL,

    ];
    protected $casts = [
        'date_retour_prevue' => 'datetime',
    ];
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    public function exemplaire()
    {
        return $this->belongsTo(ExemplaireLivre::class);
    }


    public function sanction()
    {
        return $this->hasMany(Sanction::class);
    }
}
