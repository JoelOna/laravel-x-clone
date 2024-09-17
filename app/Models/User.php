<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_img',
        'user_bio',
        'user_name_x',
        'user_location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con los seguidores
      public function followers()
      {
          return $this->belongsToMany(User::class, 'follows', 'user_id', 'follower_id');
      }
  
      // Relación con los usuarios que sigue
      public function following()
      {
          return $this->belongsToMany(User::class, 'follows', 'follower_id', 'user_id');
      }
      public function posts()
      {
          return $this->hasMany(Post::class);
      }
      public function likes()
      {
          return $this->hasMany(Like::class);
      }
      public function likedPosts()
      {
          return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
      }

}
