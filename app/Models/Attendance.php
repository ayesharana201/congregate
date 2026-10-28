<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
    'organization_id',
    'member_id',
    'event_id',
    'attendance_date',

    'status',

    'marked_by',
    'marked_at',

    'approved_by',
    'approved_at',

    'notes',
];

protected function casts(): array
{
    return [
        'attendance_date' => 'date',
        'marked_at' => 'datetime',
        'approved_at' => 'datetime',
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

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}