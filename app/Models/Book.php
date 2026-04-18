<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable(['user_id', 'category_id', 'title', 'slug', 'author', 'description', 'price', 'stock', 'cover_image', 'status'])]
#[Hidden([''])]

class Book extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
