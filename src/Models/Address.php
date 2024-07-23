<?php

namespace MaaSolutions\SimpleAddress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property string $address
 * @property string $address_additional_info
 * @property string $city_name
 * @property string $zip_code
 * @property string $country
 */
class Address extends Model
{
    /* @var array<int, string> */
    protected $fillable = [
        'street_address',
        'street_address_complement',
        'city_name',
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
