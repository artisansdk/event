<?php

namespace ArtisanSdk\Event\Models;

use ArtisanSdk\Contract\Entity as Contract;
use Ds\Hashable;
use ArtisanSdk\Event\Concerns\Hash;

abstract class Entity implements Contract, Hashable
{
    use Hash;
}
