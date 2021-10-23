<?php

namespace ArtisanSdk\Event\Stream;

use ArtisanSdk\Contract\Event as Contract;
use ArtisanSdk\Event\Models\Entity;
use Illuminate\Contracts\Support\Arrayable;

abstract class Event extends Entity implements Contract
{
    /**
     * Get the type of event.
     *
     * @return string
     */
    abstract public static function type() : string;

    /**
     * Get the key for the parent event.
     *
     * @return string|null
     */
    abstract public function parent() : ?string;

    /**
     * Get the attributes for the event.
     *
     * @return \Illuminate\Contracts\Support\Arrayable
     */
    abstract public function attributes() : Arrayable;

    /**
     * Get the metadata that shapes the context for the event.
     *
     * @return \Illuminate\Contracts\Support\Arrayable
     */
    abstract public function context() : Arrayable;

    /**
     * Get the timestamp as in integer in millisecond resolution.
     *
     * @return int
     */
    abstract public function timestamp() : int;
}
