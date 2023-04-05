<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDocumentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'document' => 'required',
            'title_en' => [
                'nullable',
                'required_without:title_fr',
                Rule::unique('documents', 'title_en')->ignore($this->document),
            ],
            'title_fr' => [
                'nullable',
                'required_without:title_en',
                Rule::unique('documents', 'title_fr')->ignore($this->document),
            ],
        ];
    }

    public function messages()
    {
        return [
            'document.required' => __('lang.document_required'),
            'title_en.required_without' => __('validation.required', ['attribute' => __('lang.title_en')]),
            'title_fr.required_without' => __('validation.required', ['attribute' => __('lang.title_fr')]),
            'title_en.unique' => __('validation.unique', ['attribute' => __('lang.title_en')]),
            'title_fr.unique' => __('validation.unique', ['attribute' => __('lang.title_fr')]),
        ];
    }
}
