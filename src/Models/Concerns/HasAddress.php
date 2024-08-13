<?php

namespace MaaSolutions\SimpleAddress\Models\Concerns;

use MaaSolutions\SimpleAddress\Models\Address;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;

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

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function groupedAddresses(string $group_name): Collection
    {
        return $this->addresses()->where('group_name', $group_name)->get();
    }
}
