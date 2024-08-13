<?php

namespace MaaSolutions\SimpleAddress\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the SimpleAddress package.
 *
 * @author Marc-André Appel <contact@maa.rocks>
 * @package MaaSolutions\SimpleAddress\Facades
 * @see \MaaSolutions\SimpleAddress\Helpers\SimpleAddress
 */
class SimpleAddress extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "simple_address";
    }
}
