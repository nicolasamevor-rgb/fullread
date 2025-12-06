<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    /** @use HasFactory<\Database\Factories\LivreFactory> */
    use HasFactory;
    protected $fillable = [
        'titre',
        'auteur',
        'categorie_id',
        'disponibilite',

    ];
    protected $table = 'livres';

    public $timestamps = false;
    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }

    public function pret()
    {
        return $this->hasMany(Reservation::class);
    }
    public function exemplaireLivre()
    {
        return $this->hasMany(ExemplaireLivre::class);
    }

}
