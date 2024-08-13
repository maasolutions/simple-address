<?php

namespace MaaSolutions\SimpleAddress\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * The Address model.
 *
 * @author Marc-André Appel <contact@maa.rocks>
 * @package MaaSolutions\SimpleAddress\Models
 *
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
        'group_name'
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    public function fullAddress(): Attribute
    {
        $street_address_complement = $this->street_address_complement ? "$this->street_address_complement\n" : '';

        return Attribute::make(
            get: fn () => "{$this->street_address}\n$street_address_complement{$this->zip_code} {$this->city}\n{$this->state_province} {$this->country}",
        );
    }
}
