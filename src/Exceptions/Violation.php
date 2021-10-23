<?php

namespace ArtisanSdk\Event\Exceptions;

use DomainException;

abstract class Violation extends DomainException
{
    /**
     * Create a business rule exception.
     *
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message = null, int $code = 400)
    {
        parent::__construct($message, $code);
    }

    /**
     * The business rule that is considered an invariant.
     *
     * @return string
     */
    abstract public static function rule() : string;
}
