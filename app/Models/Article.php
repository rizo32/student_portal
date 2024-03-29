<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
      'user_id',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function language()
  {
    return $this->belongsTo(Language::class);
  }

  public function articleLanguage()
  {
    return $this->hasMany(ArticleLanguage::class);
  }
}
