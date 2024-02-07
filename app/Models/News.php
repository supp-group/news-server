<?php

namespace App\Models;

use App\Models\CategoryNews;
use App\Models\NewsTags;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

// use Rennokki\Likeable\Contracts\Likeable as LikeableContract;
// use Rtconner\LaravelLikeable\Traits\Likeable;

class News extends Model
{
    use HasFactory;

    protected $news = 'composer_name';

    protected $fillable = ['title', 'content', 'news_image', 'composer_id', 'category_id', 'status', 'media_id', 'slug'];


    public function category_news(): HasMany
    {
        return $this->hasMany(CategoryNews::class);
    }

    public function new_tag(): belongsToMany
    {
        return $this->belongsToMany(NewsTags::class);
    }

 
//    public function news(): BelongsToMany
//    {
//        return $this->belongsToMany(News::class, 'news_tags', 'news_id', 'tag_id');
//    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function comment_for_new(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    // public function getLikesCountAttribute()
    // {
    //     return $this->likes()->count();
    // }
    
    // public function getLikedAttribute()
    // {
    //     return $this->isLikedBy(auth()->user());
    // }
    
    // public function toggleLike()
    // {
    //     if ($this->isLikedBy(auth()->user())) {
    //         $this->unlike();
    //     } else {
    //         $this->like();
    //     }
    // }
    


}
