<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\News;

class CategoryNews extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'news_id', 'create_user_id'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

}
