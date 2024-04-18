<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPlan extends Model
{
    use HasFactory;

    protected $table = 'custom_plans';

    protected $fillable = [
        'user_id',
        'plan_name',
        'min_amount',
        'max_amount',
        'interest_rate',
        'term',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
