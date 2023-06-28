<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int value
 * @property string content
 * @property bool is_valid
 * @property ?Carbon created_at
 * @property ?Carbon updated_at
 */
class Option extends Model
{
    use HasFactory;


    protected $attributes = [
        'is_valid' => false,
    ];
    protected $fillable = [
        'value',
        'content',
        'is_valid',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];


    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

}
