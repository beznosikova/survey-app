<?php

namespace App\Http\Requests;

use App\Enums\SurveyStatus;
use App\Rules\SurveyIsReady;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SurveyUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:10'],
            'status' => ['required', new Enum(SurveyStatus::class)]
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nazwa badania',
            'status' => 'Status badania'
        ];
    }
}
