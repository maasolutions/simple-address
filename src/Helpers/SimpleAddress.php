<?php

namespace MaaSolutions\SimpleAddress\Helpers;

use MaaSolutions\SimpleAddress\Models\Contracts\Addressable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * SimpleAddress Helper class.
 *
 * @author  Marc-André Appel <contact@maa.rocks>
 * @package MaaSolutions\SimpleAddress\Helpers
 */
class SimpleAddress
{
    private array $rules = [
        'street_address' => 'required',
        'street_address_complement' => 'nullable',
        'city' => 'required',
        'state_province' => 'nullable',
        'zip_code' => 'required',
        'country' => 'nullable',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'group_name' => 'nullable'
    ];

    public function validate(array $data): array
    {
        $validator = Validator::make($data, $this->rules);

        throw_if($validator->fails(), ValidationException::class, $validator);

        return $validator->validated();
    }

    public function update(array $with, Addressable $for, bool $validate = true): void
    {
        $validated = $validate ? $this->validate($with) : $with;

        $for->address()->delete();
        $this->create(with: $validated, for: $for);
    }

    public function create(array $with, Addressable $for): void
    {
        $for->address()->create($with);
    }
}
