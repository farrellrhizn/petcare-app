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
     * - HHMM: hour and minute when data is saved (24-hour format)
     * - XXXX: 4-digit owner ID (left padded with zeros)
     * - YYYY: pet sequence number (left padded with zeros)
     * 
     * Example: 103000120002
     * - 1030: saved at 10:30
     * - 0012: owner_id = 12
     * - 0002: 2nd pet of this owner
     */
    public static function generateRegistrationCode(int $ownerId): string
    {
        // HHMM: Current hour and minute (4 digits)
        $hhmm = now()->format('Hi'); // Hi = 24-hour format without separator (e.g., 1030, 1430)
        
        // XXXX: Owner ID padded to 4 digits
        $ownerIdPadded = str_pad($ownerId, 4, '0', STR_PAD_LEFT);
        
        // YYYY: Pet sequence number for this owner (padded to 4 digits)
        $petsCount = self::where('owner_id', $ownerId)->count();
        $sequence = $petsCount + 1;
        $sequencePadded = str_pad($sequence, 4, '0', STR_PAD_LEFT);
        
        return $hhmm . $ownerIdPadded . $sequencePadded;
    }
}
