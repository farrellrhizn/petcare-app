<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'treatment_id',
        'checkup_date',
        'notes',
        'diagnosis',
        'prescription',
        'cost',
    ];

    protected $casts = [
        'checkup_date' => 'date',
        'cost' => 'decimal:2',
    ];

    /**
     * Get the pet that owns the checkup.
     */
    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * Get the treatment for the checkup.
     */
    public function treatment(): BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }
}
