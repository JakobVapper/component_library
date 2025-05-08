<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Get all elements created by the user.
     */
    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    /**
     * Check if the user has pending elements for a specific post.
     */
    public function hasPendingElementsForPost($postId)
    {
        return $this->elements()
            ->where('post_id', $postId)
            ->where('status', 'pending')
            ->exists();
    }

    /**
     * Get the count of pending elements for a specific post.
     */
    public function pendingElementsCountForPost($postId)
    {
        return $this->elements()
            ->where('post_id', $postId)
            ->where('status', 'pending')
            ->count();
    }
}