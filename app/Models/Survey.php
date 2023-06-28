<?php

namespace App\Models;

use App\Enums\SurveyStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string name
 * @property SurveyStatus status
 * @property ?Carbon created_at
 * @property ?Carbon updated_at
 */
class Survey extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => SurveyStatus::EDIT,
    ];

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'name' => 'string',
        'status' => SurveyStatus::class,
        'created_at' => 'datetime:Y-m-d H:i',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'survey_id')->orderBy('order');
    }

    protected function inEdition(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['status'] === SurveyStatus::EDIT->value
        );
    }

    protected function inTesting(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['status'] === SurveyStatus::TEST->value
        );
    }
}
