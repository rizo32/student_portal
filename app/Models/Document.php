<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
      'title_en',
      'title_fr',
      'user_id',
      'path',
      'format_id',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function format()
  {
    return $this->belongsTo(Format::class);
  }
}
