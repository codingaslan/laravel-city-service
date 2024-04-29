<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Maize\Markable\Models\Favorite;
use Maize\Markable\Models\Like;
use Maize\Markable\Models\Reaction;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'image',
        'content',
    ];

    protected static $marks = [
        Like::class,
        Favorite::class,
        Reaction::class,
        ];

    protected $hidden =[];

    public function listing():BelongsTo
    {
        return $this->belongsTo(Listing::class,'listing_id','id');
    }
}
