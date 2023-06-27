<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyCreateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:10']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nazwa badania'
        ];
    }
}
