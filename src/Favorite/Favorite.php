<?php

namespace Obydul\Larable\Favorite;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Obydul\Larable\Favorite\Events\Favorited;
use Obydul\Larable\Favorite\Events\Unfavorited;

/**
 * @property \Illuminate\Database\Eloquent\Model $user
 * @property \Illuminate\Database\Eloquent\Model $favoriter
 * @property \Illuminate\Database\Eloquent\Model $favoriteable
 */
class Favorite extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => Favorited::class,
        'deleted' => Unfavorited::class,
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = \config('larable_favorite.favorites_table');

        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($favorite) {
            $userForeignKey = \config('larable_favorite.user_foreign_key');
            $favorite->{$userForeignKey} = $favorite->{$userForeignKey} ?: auth()->id();

            if (\config('larable_favorite.uuids')) {
                $favorite->{$favorite->getKeyName()} = $favorite->{$favorite->getKeyName()} ?: (string) Str::orderedUuid();
            }
        });
    }

    public function favoriteable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\config('auth.providers.users.model'), \config('larable_favorite.user_foreign_key'));
    }

    public function favoriter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->user();
    }

    public function scopeWithType(Builder $query, string $type): Builder
    {
        return $query->where('favoriteable_type', app($type)->getMorphClass());
    }
}
