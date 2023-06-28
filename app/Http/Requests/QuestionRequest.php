<?php

namespace App\Http\Requests;

use App\Enums\QuestionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class QuestionRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:5'],
            'order' => ['required', 'integer', 'min:1'],
            'type' => ['required', new Enum(QuestionType::class)],
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => 'Treść pytania',
            'order' => 'Pozycja pytania',
            'type' => 'Typ pytania',
        ];
    }
}
