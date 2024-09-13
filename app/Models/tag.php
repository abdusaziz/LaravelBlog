<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'metatitle',
        'slug',
        'content',
        'user_id'
    ];

    public function posts()
    {
        // Correct the relationship to belongsToMany
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
