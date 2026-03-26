<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'to_number',
        'call_sid',
        'vapi_call_id',
        'status',
        'duration',
        'transcript',
        'recording_url'
    ];

    // Relation: Call belongs to an Agent
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
