<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name',
        'date',
        'objective',
        'goals',
        'target_audience',
        'budget_resources',
        'timeline',
        'role_responsibilities',
        'stage',
    ];
}
