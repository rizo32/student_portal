<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  use HasFactory;

  protected $primaryKey = 'user_id';

  protected $fillable = [
    'user_id',
    'name',
    'address',
    'phone',
    'birthday',
    'city_id'
  ];

  // Pour éviter la redondance, j'ai enlevé le timestamp à Étudiant, et les modifications à cette table seront notés dans la table User
  // public $timestamps = false;

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
    // caused problems
    // return $this->belongsTo(User::class, 'user_id')->touch();
  }

  // protected $touches = ['user'];


  public function city()
  {
    return $this->belongsTo(City::class, 'city_id');
  }
}