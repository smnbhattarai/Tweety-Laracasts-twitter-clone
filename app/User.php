<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(20);
    }

    public function getAvatarAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value);
        }
        return 'https://i.pravatar.cc/150?u=' . $this->email;
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
