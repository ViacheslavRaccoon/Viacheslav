<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $with = ['comments'];

    protected $fillable = [
        'text',
        'topic'
    ];
    public function image():MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


}
