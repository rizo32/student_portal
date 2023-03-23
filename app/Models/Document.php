<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'user_id',
      'path',
      'extension',
      'langue'
  ];

  public function documentBelongsToUser()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
