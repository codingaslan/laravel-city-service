<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
    ];

    protected $hidden = [];

    public function listing():BelongsTo
    {
        return $this->$this->belongsTo(Listing::class,'listing_id','id');
    }
}
