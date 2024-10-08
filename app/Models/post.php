<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [

        "title",
        "description",
        "user_name",
        "user_id",
        "usertype",
        "post_status",
        "category_id",
        "image"
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function tags()
    {
        // Correct the relationship to belongsToMany
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
