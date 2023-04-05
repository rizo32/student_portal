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

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function city()
  {
    return $this->belongsTo(City::class, 'city_id');
  }
}