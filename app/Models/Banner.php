<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title','slug','link','description','image','is_active',])]


class Banner extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'created_at' => 'datetime', // Optional, but good for clarity
        ];
    }
}
