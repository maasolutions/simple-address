<?php

namespace MaaSolutions\SimpleAddress\Models\Concerns;

use MaaSolutions\SimpleAddress\Models\Address;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Trait HasAddress.
 *
 * @author Marc-André Appel <contact@maa.rocks>
 * @package MaaSolutions\SimpleAddress\Models\Concerns
 */
trait HasAddress
{
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
