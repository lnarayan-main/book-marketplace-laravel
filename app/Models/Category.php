<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;


#[Fillable(['name', 'parent_id', 'slug', 'description', 'is_active', 'image'])]


class Category extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
