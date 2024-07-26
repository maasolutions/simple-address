<?php

namespace MaaSolutions\SimpleAddress\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Interface for models that can have an address.
 *
 * @author  Marc-André Appel <contact@maa.rocks>
 * @package MaaSolutions\SimpleAddress\Models\Contracts
 * @property mixed $address The relation to the address model, provided by the trait.
 */
interface Addressable
{
    public function address(): MorphOne;
}
