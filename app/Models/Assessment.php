<?php

namespace App\Models;

use App\Enums\AssessmentEffectiveness;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Assessment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'project_id',
        'requirement_id',
        'effectiveness',
        'notes',
        'remediation_plan',
        'deadline_date',
        'verified_at',
    ];

    protected $casts = [
        'effectiveness' => AssessmentEffectiveness::class,
        'deadline_date' => 'date',
        'verified_at' => 'datetime',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function requirement(): BelongsTo
    {
        return $this->belongsTo(Requirement::class);
    }

    protected function currentPenaltyExposure(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->effectiveness === AssessmentEffectiveness::Fully_Effective ||
                    $this->effectiveness === AssessmentEffectiveness::Not_Applicable) {
                    return 0;
                }

                if ($this->deadline_date === null || $this->deadline_date > now()) {
                    return 0;
                }

                $daysOverdue = now()->diffInDays($this->deadline_date);

                // Assuming we can access the penalty_daily_rate from the requirement
                // This might be cleaner if we eager load 'requirement' when accessing this
                return $daysOverdue * ($this->requirement->penalty_daily_rate ?? 0);
            }
        );
    }
}
