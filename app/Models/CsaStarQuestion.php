<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsaStarQuestion extends Model
{
    protected $fillable = [
        'domain_id',
        'control_id',
        'question_id',
        'question_text',
        'guidance',
    ];

    public function domain()
    {
        return $this->belongsTo(CsaStarDomain::class, 'domain_id');
    }}
