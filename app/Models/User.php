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
        'username',
        'email',
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
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function liking(){
        return $this->belongsToMany(Post::class);
    }

    public function bookmarking(){
        return $this->belongsToMany(Post::class,'post_bookmarks_pivot');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user){
           $user->profile()->create([
               'title' => $user->username,
           ]);
        });
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }
}
