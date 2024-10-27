<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['answers', 'user_id', 'survey_id'];

    /**
     * Get the user that owns the survey answer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the survey that the answer belongs to.
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
