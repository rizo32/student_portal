<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'nom'
  ];

  // Relationship to Etudiant
  public function etudiant() {
    return $this->hasMany(Etudiant::class, 'user_id');
  }
}
