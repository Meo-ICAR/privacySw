<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComplianceFramework extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'version', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function domains(): HasMany
    {
        return $this->hasMany(ComplianceDomain::class, 'framework_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'framework_id');
    }
}
