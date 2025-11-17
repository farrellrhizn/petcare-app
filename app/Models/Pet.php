<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_code',
        'owner_id',
        'name',
        'species',
        'age',
        'weight',
    ];

    protected $casts = [
        'age' => 'integer',
        'weight' => 'decimal:2',
    ];

    /**
     * Get the owner that owns the pet.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    /**
     * Get the checkups for the pet.
     */
    public function checkups(): HasMany
    {
        return $this->hasMany(Checkup::class);
    }

    /**
     * Generate unique registration code for the pet.
     * Format: HHMMXXXXYYYY
     * - HHMM: hour and minute when data is saved
     * - XXXX: 4-digit owner ID (left padded)
     * - YYYY: pet sequence number
     */
    public static function generateRegistrationCode(int $ownerId): string
    {
        $hhmm = now()->format('Hi');
        $ownerIdPadded = str_pad($ownerId, 4, '0', STR_PAD_LEFT);
        
        // Get the next sequence number for this owner
        $lastPet = self::where('owner_id', $ownerId)->orderBy('id', 'desc')->first();
        $sequence = $lastPet ? (self::where('owner_id', $ownerId)->count() + 1) : 1;
        $sequencePadded = str_pad($sequence, 4, '0', STR_PAD_LEFT);
        
        return $hhmm . $ownerIdPadded . $sequencePadded;
    }
}
