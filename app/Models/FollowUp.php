<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'followup_date',
        'remarks',
        'status'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }


    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }
}
