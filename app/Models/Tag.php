<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded;
    public function videos()
    {
        return $this->belongsToMany(video::class, 'tags_videos');
    }
}
