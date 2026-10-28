<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'organization_id',
        'member_id',
        'amount',
        'donation_type',
        'donation_date',
        'payment_method',
        'reference_number',
        'notes',
         'status',
    ];

    protected function casts(): array
    {
        return [
            'donation_date' => 'date',
            'amount' => 'decimal:2',
        ];
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}