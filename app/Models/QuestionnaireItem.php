<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionnaireItem extends Model
{
    protected $fillable = [
        'section_id',
        'subsection_label',
        'question_text',
        'help_text',
        'input_type',
        'is_mandatory',
        'sort_order',
    ];

    protected $casts = [
        'is_mandatory' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(QuestionnaireSection::class, 'section_id');
    }
}
