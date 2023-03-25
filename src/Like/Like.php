<?php

namespace Obydul\Larable\Like;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Obydul\Larable\Like\Events\Liked;
use Obydul\Larable\Like\Events\Unliked;

class Like extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => Liked::class,
        'deleted' => Unliked::class,
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = \config('larable_like.likes_table');

        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($like) {
            $userForeignKey = \config('larable_like.user_foreign_key');
            $like->{$userForeignKey} = $like->{$userForeignKey} ?: auth()->id();

            if (\config('larable_like.uuids')) {
                $like->{$like->getKeyName()} = $like->{$like->getKeyName()} ?: (string) Str::orderedUuid();
            }
        });
    }

    public function likeable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\config('auth.providers.users.model'), \config('larable_like.user_foreign_key'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function liker()
    {
        return $this->user();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithType(Builder $query, string $type)
    {
        return $query->where('likeable_type', app($type)->getMorphClass());
    }
}
