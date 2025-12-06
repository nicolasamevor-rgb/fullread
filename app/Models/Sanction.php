<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    /** @use HasFactory<\Database\Factories\SanctionFactory> */
    use HasFactory;

    protected $fillable = [
        'motif',
        'amende',
        'pret_id',
    ];
    public function pret()
    {
        return $this->belongsTo(Pret::class);
    }
}
