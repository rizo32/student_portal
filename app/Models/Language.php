<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  use HasFactory;


  protected $fillable = [
    'name',
  ];

  /**
   * Get the article languages for the language.
   */
  public function articleLanguages()
  {
    return $this->hasMany(ArticleLanguage::class);
  }

  /**
   * Get the article languages for the language.
   */
  public function articles()
  {
    return $this->hasMany(articles::class);
  }

}