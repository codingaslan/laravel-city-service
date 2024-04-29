<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpeningClosing extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'opining',
        'closing',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
