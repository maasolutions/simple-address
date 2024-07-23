<?php

namespace MaaSolutions\SimpleAddress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property string $street_address
 * @property string $street_address_complement
 * @property string $city
 * @property string $state_province
 * @property string $zip_code
 * @property string $country
 * @property string $latitude
 * @property string $longitude
 */
class Address extends Model
{
    /* @var array<int, string> */
    protected $fillable = [
        'street_address',
        'street_address_complement',
        'city',
        'state_province',
        'zip_code',
        'country',
        'latitude',
        'longitude',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
