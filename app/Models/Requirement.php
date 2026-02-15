<?php

namespace App\Models;

use App\Enums\RequirementSeverity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'description',
        'severity',
        'mandatory',
        'penalty_daily_rate',
        'domain_id',
    ];

    protected $casts = [
        'severity' => RequirementSeverity::class,
        'mandatory' => 'boolean',
        'penalty_daily_rate' => 'decimal:2',
    ];

    public function domain(): BelongsTo
    {
        return $this->belongsTo(ComplianceDomain::class, 'domain_id');
    }

    public function assessments(): HasMany
    {
        return $this->hasMany(Assessment::class);
    }
}
