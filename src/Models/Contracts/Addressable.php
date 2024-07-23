<?php

namespace MaaSolutions\SimpleAddress\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Addressable
{
    public function address(): MorphOne;
}
