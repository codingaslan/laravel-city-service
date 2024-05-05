<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Maize\Markable\Models\Favorite;
use Maize\Markable\Models\Like;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover',
        'logo',
        'title',
        'description',
        'phone',
        'email',
        'date_established',
        'website',
    ];

    protected static array $marks = [
        Like::class,
        Favorite::class,
    ];

    protected $hidden = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'listing_id', 'id');
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'listing_id', 'id');
    }

    public function social(): HasOne
    {
        return $this->hasOne(SocialNetwork::class, 'listing_id', 'id');
    }

    public function opining_closing(): HasMany
    {
        return $this->hasMany(OpeningClosing::class, 'listing_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'listing_id', 'id');

    }
}
