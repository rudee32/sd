<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'type', 'is_menu_feature', 'file_path', 'cover_image', 'published_at', 'user_id', 'status', 'uploader_name', 'uploader_email'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['user_name'] = $this->user ? $this->user->name : null;
        $array['comments_count'] = $this->comments->count();
        return $array;
    }
}
