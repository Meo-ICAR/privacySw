<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsaStarDomain extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'sort_order',
    ];

    public function questions()
    {
        return $this->hasMany(CsaStarQuestion::class, 'domain_id');
    }}
