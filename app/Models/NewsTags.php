<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tags;
use App\Models\News;

class NewsTags extends Model
{
    use HasFactory;

    protected $table = 'news_tags';
    protected $fillable = ['tag_id', 'news_id', 'create_user_id', 'date'];



    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function tags(): BelongsTo
    {
        return $this->belongsTo(Tags::class);
    }
    
}
