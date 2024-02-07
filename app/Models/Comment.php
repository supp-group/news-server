<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'news_id', 'date', 'status'];

    
    public function news_comment(): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id');
    }

}
