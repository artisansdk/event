<?php

namespace ArtisanSdk\Event\Models;

use ArtisanSdk\Event\Stream\Event;
use ArtisanSdk\Event\Stream\Snapshot;

abstract class Model extends Entity
{
    /**
     * Apply an event to the model.
     *
     * @param  \ArtisanSdk\Event\Stream\Event $event
     *
     * @throws \ArtisanSdk\Event\Exceptions\Violation
     *
     * @return \ArtisanSdk\Event\Models\Model
     */
    abstract public function apply(Event $event) : Model;

    /**
     * Convert the model a snapshot.
     *
     * @return \ArtisanSdk\Event\Stream\Snapshot
     */
    abstract public function snapshot() : Snapshot;
}
