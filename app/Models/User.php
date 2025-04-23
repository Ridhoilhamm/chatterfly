<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'pin',
        'is_private',
        'phone_number',
        'gender',
        'role'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function isFollowing(User $user): bool
    {
        return $this->following()->where('following_id', $user->id)->exists();
    }
    // public function followRequests(): HasMany
    // {
    //     return $this->hasMany(FollowRequest::class, 'follower_id');
    // }

    // // Permintaan yang diterima user
    // public function pendingFollowRequests(): HasMany
    // {
    //     return $this->hasMany(FollowRequest::class, 'followed_id');
    // }

    public function hasSentFollowRequestTo(User $user): bool
    {
        return $this->followRequests()->where('followed_id', $user->id)->exists();
    }

    // Cek apakah user menerima permintaan
    public function hasPendingFollowRequestFrom(User $user): bool
    {
        return $this->pendingFollowRequests()->where('follower_id', $user->id)->exists();
    }

    public function totalLikes()
    {
        return $this->hasManyThrough(Like::class, post_foto::class, 'user_id', 'post_foto_id', 'id', 'id');
    }

    public function postFotoCount()
    {
        return $this->hasMany(post_foto::class, 'user_id', 'id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->wherePivot('status', 'accepted');
    }

    public function friendsOfFriends()
    {
        return User::whereHas('friends', function ($query) {
            $query->whereIn('id', $this->friends()->pluck('id'));
        })->where('id', '!=', $this->id)->get();
    }

    public function mutualFriends(User $user)
    {
        return $this->friends()->whereIn('id', $user->friends()->pluck('id'));
    }

    public function taggedPhotos()
    {
        return $this->belongsToMany(post_foto::class, 'post_foto_tag', 'friend_id', 'post_foto_id');
    }

    public function reportsMade()
    {
        return $this->hasMany(Laporan::class, 'user_id');
    }

    public function appeals()
    {
        return $this->hasMany(Appeal::class);
    }

    // Di model User
    public function postFoto()
    {
        return $this->hasMany(post_foto::class);
    }
}
