<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $guarded;

    protected $casts=[
        'skills' => 'array',
        'tags' => 'array',
    ];

    public static function published()
    {
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function skills()
    {
            return $this->belongsToMany(Skill::class,'skills_videos','video_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'tags_videos');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopePublished(){
        return $this->where('published' , 1);
    }
}
