<?php

namespace Obydul\Larable\Favorite\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Illuminate\Database\Eloquent\Collection $favoriters
 * @property \Illuminate\Database\Eloquent\Collection $favorites
 */
trait Favoriteable
{
    /**
     * @deprecated renamed to `hasBeenFavoritedBy`, will be removed at 5.0
     */
    public function isFavoritedBy(Model $user)
    {
        return $this->hasBeenFavoritedBy($user);
    }

    public function hasFavoriter(Model $user): bool
    {
        return $this->hasBeenFavoritedBy($user);
    }

    public function hasBeenFavoritedBy(Model $user): bool
    {
        if (\is_a($user, config('auth.providers.users.model'))) {
            if ($this->relationLoaded('favoriters')) {
                return $this->favoriters->contains($user);
            }

            return ($this->relationLoaded('favorites') ? $this->favorites : $this->favorites())
                    ->where(\config('larable_favorite.user_foreign_key'), $user->getKey())->count() > 0;
        }

        return false;
    }

    public function favorites(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(config('larable_favorite.favorite_model'), 'favoriteable');
    }

    public function favoriters(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            config('larable_favorite.favorites_table'),
            'favoriteable_id',
            config('larable_favorite.user_foreign_key')
        )
            ->where('favoriteable_type', $this->getMorphClass());
    }
}
