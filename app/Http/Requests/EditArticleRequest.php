<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditArticleRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
      return [
          'title' => 'required|max:255',
          'body' => 'required',
          'article_id' => [
              'required',
              Rule::unique('article_languages')->where(function ($query) {
                  $language_id = $this->route('language_id');
                  return $query->where('language_id', $language_id);
              })->ignore($this->route('article_id'), 'article_id'),
          ],
          'language_id' => 'required|exists:languages,id',
      ];
  }
}