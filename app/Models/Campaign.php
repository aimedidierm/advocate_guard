<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name',
        'objective',
        'goals',
        'target_audience',
        'budget_resources',
        'timeline',
        'role_responsibilities',
        'stage',
        'image',
        'start_date',
        'end_date',
    ];

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }
}
