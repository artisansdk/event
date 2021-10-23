<?php

namespace ArtisanSdk\Event\Exceptions;

use ArtisanSdk\Contract\Event;
use RuntimeException;

class Conflict extends RuntimeException
{
    /**
     * Create a conflict exception for an event.
     *
     * @param \ArtisanSdk\Contract\Event $event in conflict
     * @param string $message
     * @param int $code
     */
    public function __construct(protected Event $event, string $message = null, int $code = 409)
    {
        parent::__construct($message, $code);
    }

    /**
     * The event that is in conflict.
     *
     * @return \ArtisanSdk\Contract\Event
     */
    public function event() : Event
    {
        return $this->event;
    }
}
