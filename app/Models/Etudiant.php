<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
  use HasFactory;

  protected $primaryKey = 'user_id';

  protected $fillable = [
    'user_id',
    'nom',
    'adresse',
    'phone',
    'date_naissance',
    'ville_id'
  ];

  // Pour éviter la redondance, j'ai enlevé le timestamp à Étudiant, et les modifications à cette table seront notés dans la table User
  // public $timestamps = false;

  public function etudiantBelongsToUser()
  {
    return $this->belongsTo(User::class, 'user_id');
    // caused problems
    // return $this->belongsTo(User::class, 'user_id')->touch();
  }

  // protected $touches = ['user'];


  public function etudiantBelongsToVille()
  {
    return $this->belongsTo(Ville::class, 'ville_id');
  }
}