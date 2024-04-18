<?php

namespace App\Models;

use App\Enums\InvestStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['created_time'];


    protected $casts = [
        'status' => InvestStatus::class,
    ];

    public function schema()
    {
        return $this->hasOne(Schema::class, 'id', 'schema_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y H:i', strtotime($value));
    }

    public function getNextProfitTimeAttribute($value)
    {
        return date('M d, Y H:i', strtotime($value));
    }

    public function getCreatedTimeAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format('M d Y h:i');
    }

    // Method to calculate next profit time
    public function calculateNextProfitTime()
    {
        if ($this->schema->return_type === 'lifetime') {
            return null;  // Lifetime investments might not have a "next profit time"
        }

        $investmentStartDate = $this->created_at ?? now();  // Default to current time if not set
        $daysToAdd = $this->schema->return_period * $this->schema->number_of_period;

        return $investmentStartDate->addDays($daysToAdd);
    }

}
