<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function books()
    {
        /**
         * A user has many books. 
         * We specify 'user_id' as the foreign key in the books table.
         */
        return $this->hasMany(Book::class);
    }

    public function favoriteBooks()
    {
        /**
         * belongsToMany defines the relationship through the 'favorites' table.
         */
        return $this->belongsToMany(Book::class, 'favorites')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }


    public function isAdmin(): bool
    {
        return $this->role === 2;
    }

    public function isSeller(): bool
    {
        return $this->role === 1;
    }

    public function isCustomer(): bool
    {
        return $this->role === 0;
    }
}
