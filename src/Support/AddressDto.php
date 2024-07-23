<?php

namespace MaaSolutions\SimpleAddress\Support;

class AddressDto
{
    public function __construct(
        public string $street_address,
        public string $street_address_complement,
        public string $zip_code,
        public string $city,
        public string $country,
    ) {
        //
    }
}
