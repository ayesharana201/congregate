<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'organization_id',
    'first_name',
    'last_name',
    'gender',
    'date_of_birth',
    'email',
    'phone',
    'address',
    'joined_at',
    'baptism_date',
    'membership_status',
    'photo',
])]
class Member extends Model
{
    use HasFactory;

    /**
     * Member belongs to a user account.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Member belongs to an organization.
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Member attendance records.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'joined_at' => 'date',
            'baptism_date' => 'date',
        ];
    }
}