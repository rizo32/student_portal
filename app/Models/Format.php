<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
      'name',
  ];

  public function document()
  {
    return $this->hasMany(Document::class);
  }
}
