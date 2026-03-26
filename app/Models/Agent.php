<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'name',
        'vapi_assistant_id',
        'prompt'
    ];

    // Relation: One Agent can have many Calls
    public function calls()
    {
        return $this->hasMany(Call::class);
    }
}
