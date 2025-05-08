<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'featured_image',
        'published_at',
        'quantity',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get all elements for this post.
     */
    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    /**
     * Get only the approved elements for this post.
     */
    public function approvedElements()
    {
        return $this->elements()->where('status', 'approved');
    }

    /**
     * Get only the pending elements for this post.
     */
    public function pendingElements()
    {
        return $this->elements()->where('status', 'pending');
    }

    /**
     * Get only the rejected elements for this post.
     */
    public function rejectedElements()
    {
        return $this->elements()->where('status', 'rejected');
    }

    /**
     * Check if the post is published.
     */
    public function isPublished()
    {
        return !is_null($this->published_at);
    }
}