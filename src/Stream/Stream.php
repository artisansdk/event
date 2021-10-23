<?php

namespace ArtisanSdk\Event\Stream;

use Illuminate\Contracts\Support\Jsonable;
use Ds\Queue;
use JsonSerializable;

class Stream extends Queue implements Jsonable, JsonSerializable
{
}
