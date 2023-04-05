<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
{
    public function rules()
    {
        // validate that at least one title is filled
        return [
            'title_en' => 'required_without_all:title_fr',
            'body_en' => 'required_if:title_en,!=,',
            'title_fr' => 'required_without_all:title_en',
            'body_fr' => 'required_if:title_fr,!=,',
        ];
    }

    public function messages()
    {
        return [
            'title_en.required_without_all' => __('validation.required', ['attribute' => __('lang.title')]),
            'body_en.required_if' => __('validation.required', ['attribute' => __('lang.content')]),
        ];
    }
}
