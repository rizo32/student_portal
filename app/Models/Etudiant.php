<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'nom',
        'adresse',
        'phone',
        'email',
        'date_naissance',
        'ville_id'
    ];

    // Relationship to Ville
    public function ville() {
      return $this->belongsTo(Ville::class, 'ville_id');
    }
}
