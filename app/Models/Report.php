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
        'type_abuse',      // New field for type of abuse
        'description',     // Description of the incident
        'province',        // Province where the incident occurred
        'district',        // District where the incident occurred
        'sector',          // Sector related to the district
        'date_incident',   // Date of the incident
        'attachments',     // Attachments related to the report
        'user_id',         // User creating the report
        'status'           // Status of the report
    ];

    /**
     * Get the user that owns the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
