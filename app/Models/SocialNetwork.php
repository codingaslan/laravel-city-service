<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'google',
        'linkedin',
        'youtube',
        'pinterest',
        'tumblr',
        'flickr',
    ];

    protected $hidden = [];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
