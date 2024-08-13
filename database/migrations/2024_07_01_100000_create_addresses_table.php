<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(config('simple-address.table_prefix', '') . 'addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs('addressable');
            $table->string('street_address');
            $table->string('street_address_complement')->nullable();
            $table->string('city');
            $table->string('state_province')->nullable();
            $table->string('zip_code');
            $table->string('country')->default('France');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('simple-address.table_prefix', '') . 'addresses');
    }
};
