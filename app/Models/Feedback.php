<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeSearch($query, $keyword)
    {
        return $query
            ->where('title', 'like', '%'.$keyword.'%')
            ->orWhere('name', 'like', '%'.$keyword.'%')
            ->orWhere('email', 'like', '%'.$keyword.'%')
            ->orWhere('content', 'like', '%'.$keyword.'%');
    }
}
