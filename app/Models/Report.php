<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provide_name',
        'subject',
        'description',
        'victim',
        'location',
        'still_going',
        'when',
        'attachments',
        'leaning',
        'category',
        'user_id'
    ];

    /**
     * Get the user that owns the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
