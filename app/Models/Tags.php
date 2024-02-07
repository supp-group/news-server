<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\NewsTags;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'tag_description', 'media_id', 'slug'];


    public function news_tags(): HasMany
    {
        return $this->hasMany(NewsTags::class);
    }


    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tags::class, 'news_tags', 'news_id', 'tag_id');
    // }

}
