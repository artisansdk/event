<?php

namespace ArtisanSdk\Event\Concerns;

use ArtisanSdk\Contract\Entity;

trait Hash
{
    /**
     * @inheritdoc
     */
    public function equals(object $obj) : bool
    {
        return $obj instanceof Entity
            && $obj->key() === $this->key();
    }

    /**
     * @inheritdoc
     */
    public function hash() : mixed
    {
        return $this->key();
    }
}
