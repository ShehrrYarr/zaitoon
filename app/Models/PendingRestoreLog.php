<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingRestoreLog extends Model
{
    protected $fillable = [
        'mobile_id',
        'restored_by',
        'old_cost_price',
        'new_cost_price',
        'old_selling_price',
        'new_selling_price',
        'old_battery_health',
        'new_battery_health',
    ];

    public function mobile()
    {
        return $this->belongsTo(Mobile::class);
    }

    public function restoredBy()
    {
        return $this->belongsTo(User::class, 'restored_by');
    }
}
