<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'description', 'questions'];

    /**
     * Get the survey answers for the survey.
     */
    public function surveyAnswers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}
