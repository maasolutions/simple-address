<?php

namespace MaaSolutions\SimpleAddress\Models\Concerns;

use MaaSolutions\SimpleAddress\Models\Address;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasAddress
{
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
