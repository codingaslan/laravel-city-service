<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [];

    public function listing(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class,'listing_id','id');
    }
}
