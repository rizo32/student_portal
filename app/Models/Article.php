<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'body',
      'user_id',
      'language'
  ];

  public function articleBelongsToUser()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
