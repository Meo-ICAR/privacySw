<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComplianceDomain extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'framework_id'];

    public function framework(): BelongsTo
    {
        return $this->belongsTo(ComplianceFramework::class, 'framework_id');
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class, 'domain_id');
    }
}
