<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\ArticleLanguage;

class ArticleLanguageFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ArticleLanguage::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    // Get all article and language IDs as arrays
    $articleIds = \App\Models\Article::pluck('id')->toArray();
    $languageIds = \App\Models\Language::pluck('id')->toArray();

    // Initialize the article and language ID indices
    // $articleIndex = 0;
    // $languageIndex = 0;

    // Calculate the article and language IDs using the unique key
    // and the count of available IDs
    $articleCount = 100;
    $languageCount = 2;
    // $articleCount = count($articleIds);
    // $languageCount = count($languageIds);
    $articleId = [];
    $languageId = [];

    for ($i = 1; $i < 200; $i++) {
      $articleIndex = $i % $articleCount;
      $languageIndex = $i % $languageCount;
      $articleId[] = $articleIds[$articleIndex];
      $languageId[] = $languageIds[$languageIndex];
    }

    // Return the article language attributes with the generated IDs and
    // randomized title and body text
    return [
      'article_id' => $articleId,
      'language_id' => $languageId,
      'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
      'body' => $this->faker->paragraph($nbSentences = $this->faker->numberBetween($min = 5, $max = 10), $variableNbSentences = true),
    ];
  }

  // public function definition()
  // {
  //   $articleIds = \App\Models\Article::pluck('id')->toArray();
  //   $languageIds = \App\Models\Language::pluck('id')->toArray();
  //   $uniqueKey = $this->faker->unique()->randomNumber();
  //   $articleId = $articleIds[$uniqueKey % count($articleIds)];
  //   $languageId = $languageIds[$uniqueKey % count($languageIds)];

  //   return [
  //     'article_id' => $articleId,
  //     'language_id' => $languageId,
  //     'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
  //     'body' => $this->faker->paragraph($nbSentences = $this->faker->numberBetween($min = 5, $max = 10), $variableNbSentences = true),
  //   ];
  // }

  /**
   * Define the "unique_combination" state for the model.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  public function uniqueCombination()
  {
    return $this->state(function (array $attributes) {
      $articleId = \App\Models\Article::inRandomOrder()->first()->id;
      $languageId = \App\Models\Language::inRandomOrder()->first()->id;
      return [
        'article_id' => $articleId,
        'language_id' => $languageId,
      ];
    });
  }
}

// return [
//   'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
//   'body' => $this->faker->paragraph($nbSentences = $this->faker->numberBetween($min = 5, $max = 10), $variableNbSentences = true),
//   'language_id' => $this->faker->randomElement([1, 2]),
//   'article_id' => $this->faker->numberBetween($min = 1, $max = 100)
// ];