<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tweets extends Model
{  
    protected $fillable = [
        'text', 'user_id'
    ];

    public function comments()
    {
        return $this->hasMany('\App\Models\Comment');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function setTextAttribute($text)
    {
        $this->attributes['text'] = $text;
    }
}
