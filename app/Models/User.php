<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
        'img',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //public $with = ['ideas'];

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id',  'follower_id');
    }

    public function follows(User $user)
    {
        //dd($user->followings());
        return $this->followings()->where('user_id', $user->id)->exists();
    }
    public function getImageURL()
    {
        //dd(isset($this->img));
        if (isset($this->img)) {
            return url('storage/' . $this->img);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed=" . $this->name;
    }


    public function likes()
    {
        return $this->belongsToMany(Idea::class, 'idea_like');
    }

    public function LikesIdea(Idea $idea)
    {
        //dd($user->followings());
        return $this->likes()->where('idea_id', $idea->id)->exists();
    }
}