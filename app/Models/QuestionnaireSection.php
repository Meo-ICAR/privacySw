<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionnaireSection extends Model
{
    protected $fillable = [
        'code',
        'title',
        'description',
        'is_repeatable',
        'sort_order',
    ];

    protected $casts = [
        'is_repeatable' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(QuestionnaireItem::class, 'section_id');
    }
}
