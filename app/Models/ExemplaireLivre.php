<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExemplaireLivre extends Model
{
    /** @use HasFactory<\Database\Factories\ExemplaireLivreFactory> */
    use HasFactory;
    protected $fillable = [
        'livre_id',
        'disponibilite',

    ];
    protected $attributes = [
        'disponibilite' => true
    ];

    public function livres()
    {
        return $this->hasOne(Livre::class);
    }
}
