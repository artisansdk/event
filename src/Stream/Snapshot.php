<?php

namespace ArtisanSdk\Event\Stream;

abstract class Snapshot extends Event
{
    /**
     * Get all the events that make up the snapshot as sourced from the context.
     *
     * @return \ArtisanSdk\Event\Stream\Stream
     */
    abstract public function events() : Stream;
}
