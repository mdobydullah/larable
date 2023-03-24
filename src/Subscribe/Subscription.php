<?php

namespace Obydul\Larable\Subscribe;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Obydul\Larable\Subscribe\Events\Subscribed;
use Obydul\Larable\Subscribe\Events\Unsubscribed;

/**
 * @property \Illuminate\Database\Eloquent\Model $user
 * @property \Illuminate\Database\Eloquent\Model $subscriber
 * @property \Illuminate\Database\Eloquent\Model $subscribable
 */
class Subscription extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => Subscribed::class,
        'deleted' => Unsubscribed::class,
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = \config('larable_subscribe.subscriptions_table');

        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();

        self::saving(function (Subscription $subscription) {
            $userForeignKey = \config('larable_subscribe.user_foreign_key');
            $subscription->{$userForeignKey} = $subscription->{$userForeignKey} ?: auth()->id();

            if (\config('larable_subscribe.uuids')) {
                $subscription->{$subscription->getKeyName()} = $subscription->{$subscription->getKeyName()} ?: (string) Str::orderedUuid();
            }
        });
    }

    public function subscribable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\config('auth.providers.users.model'), \config('larable_subscribe.user_foreign_key'));
    }

    public function subscriber(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->user();
    }

    public function scopeWithType(Builder $query, string $type): Builder
    {
        return $query->where('subscribable_type', app($type)->getMorphClass());
    }
}
