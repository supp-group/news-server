<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\User;

class CategoryUser extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'user_id', 'create_user_id'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
