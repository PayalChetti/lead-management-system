<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_no',
        'name',
        'company',
        'email',
        'phone',
        'city',
        'address',
        'source_id',
        'status_id',
        'assigned_to',
        'expected_value',
        'remarks',
        'created_by'
    ];

    public function leadStatus()
    {
        return $this->belongsTo(LeadStatus::class, 'status_id');
    }

    public function leadSource()
    {
        return $this->belongsTo(LeadSource::class, 'source_id');
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
