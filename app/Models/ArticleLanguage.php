<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLanguage extends Model
{
  use HasFactory;

  protected $table = 'article_languages';

  protected $fillable = ['article_id', 'language_id', 'title', 'body'];

  public function article()
  {
    return $this->belongsTo(Article::class);
  }

  public function language()
  {
    return $this->belongsTo(Language::class);
  }
}