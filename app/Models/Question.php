<?php

namespace App\Models;

use App\Enums\QuestionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int order
 * @property int survey_id
 * @property string content
 * @property QuestionType type
 * @property ?Carbon created_at
 * @property ?Carbon updated_at
 */
class Question extends Model
{
    use HasFactory;

    protected $attributes = [
        'type' => QuestionType::SINGLE,
    ];

    protected $fillable = [
        'order',
        'survey_id',
        'content',
        'type',
    ];

    protected $casts = [
        'type' => QuestionType::class,
        'created_at' => 'datetime:Y-m-d H:i',
    ];


    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'question_id')->orderBy('value');
    }

}
