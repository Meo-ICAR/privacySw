<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplianceContext extends Model
{
    use HasFactory;

    protected $fillable = [
        'framework_id',
        'title',
        'description',
        'interested_parties',
    ];

    protected $casts = [
        'interested_parties' => 'array',
    ];

    public function framework(): BelongsTo
    {
        return $this->belongsTo(ComplianceFramework::class);
    }
}
