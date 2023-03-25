<?php

namespace Obydul\Larable\Like\Traits;

use Illuminate\Database\Eloquent\Model;

trait Likeable
{
    public function isLikedBy(Model $user): bool
    {
        if (\is_a($user, config('auth.providers.users.model'))) {
            if ($this->relationLoaded('likers')) {
                return $this->likers->contains($user);
            }

            return $this->likers()->where(\config('larable_like.user_foreign_key'), $user->getKey())->exists();
        }

        return false;
    }

    /**
     * Return followers.
     */
    public function likers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            config('larable_like.likes_table'),
            'likeable_id',
            config('larable_like.user_foreign_key')
        )
            ->where('likeable_type', $this->getMorphClass());
    }
}
