<?php

namespace Obydul\Larable\Subscribe\Events;

use Illuminate\Database\Eloquent\Model;

class Event
{
    /**
     * @var \Illuminate\Database\Eloquent\Model|\Obydul\Larable\Subscribe\Subscription
     */
    public $subscription;

    /**
     * Event constructor.
     */
    public function __construct(Model $subscription)
    {
        $this->subscription = $subscription->refresh();
    }
}
