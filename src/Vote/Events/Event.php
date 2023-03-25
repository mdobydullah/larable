<?php

namespace Obydul\Larable\Vote\Events;

use Obydul\Larable\Vote\Vote;

class Event
{
    public Vote $vote;

    /**
     * Event constructor.
     */
    public function __construct(Vote $vote)
    {
        $this->vote = $vote;
    }
}
