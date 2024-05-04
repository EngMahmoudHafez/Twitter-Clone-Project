<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory;

    public $with = ['user', 'comments.user'];
    protected $withCount = ['likes'];


    protected $fillable = ['content', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like');
    }

    public function scopeSearch($query, $search = '')
    {
        $query->where('content', 'like', '%' . $search . '%');
    }
}
