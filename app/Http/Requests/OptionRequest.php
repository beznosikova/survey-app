<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:5'],
            'value' => ['required', 'integer', 'min:1'],
            'is_valid' => ['sometimes', 'boolean'],
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => ' Treść opcji',
            'value' => 'Wartość opcji',
            'is_valid' => 'Poprawność',
        ];
    }
}
