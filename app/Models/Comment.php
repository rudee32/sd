<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment', 'name', 'email', 'content_id'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['content_title'] = $this->content ? $this->content->title : null;
        return $array;
    }
}