# Simple Address for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maa-solutions/simple-address.svg?style=flat-square)](https://packagist.org/packages/maa-solutions/simple-address)
[![Total Downloads](https://img.shields.io/packagist/dt/maa-solutions/simple-address.svg?style=flat-square)](https://packagist.org/packages/maa-solutions/simple-address)
[![GitHub Issues](https://img.shields.io/github/issues/maa-solutions/simple-address.svg?style=flat-square)](https://github.com/maa-solutions/simple-address/issues)
[![License](https://img.shields.io/github/license/maa-solutions/simple-address.svg?style=flat-square)](https://github.com/maa-solutions/simple-address/blob/master/LICENSE.md)

A Laravel package to easily manage addresses associated with your Eloquent models.

## Introduction

The Simple Address package enables you to attach and manage addresses to any of your Eloquent models. Whether you want to track shipping addresses for orders, store addresses for users, or office addresses for companies, this package provides a clean and simple solution.

## Installation

To get started with Simple Address, install it via Composer:

```sh
composer require maa-solutions/laravel-simple-address
```

## Usage

Implement the `Addressable` interface in your Eloquent model and add its `HasAddresses` trait:

```php
class MyModel extends Model implements Addressable
{
    use HasAddresses;

    ...
}
```

Now, you can easily manage addresses for your model instances:

```php
use MaaSolutions\SimpleAddress\Facades\SimpleAddress;

...

public function create(Request $request)
{
    $validated_address = SimpleAddress::validate($request->all());

    $myModel = MyModel::create($request->validated());

    SimpleAddress::create(for: $myModel, with: $validated_address);
}

public function update(Request $request, MyModel $myModel)
{
    SimpleAddress::update(for: $myModel, with: $request->all());
}
```
