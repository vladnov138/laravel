<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'role'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearchByTag($query, $tag)
    {
        return $query->where('tag_id', $tag->id);
    }
}
