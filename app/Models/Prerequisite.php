<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prerequisite extends Model
{
    use HasFactory;

    protected $fillable = [
        'framework_id',
        'section_number',
        'title',
        'description',
    ];

    public function framework(): BelongsTo
    {
        return $this->belongsTo(ComplianceFramework::class);
    }
}
