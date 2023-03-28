<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'name'
  ];

  // Relationship to Student
  public function student()
  {
    return $this->hasMany(Student::class, 'user_id');
  }
}