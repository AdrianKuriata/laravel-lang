<?php

namespace Devtemple\LaravelLang\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLanguage extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|min:1|max:3|string'
        ];
    }
}