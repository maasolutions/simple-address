<?php

namespace MaaSolutions\SimpleAddress\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleAddress extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "simple_address";
    }
}
