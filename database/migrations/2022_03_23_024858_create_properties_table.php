<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('properties', static function (Blueprint $table) {
            $table->uuid();
            $table->string('name')->index();
            $table->smallInteger('bedrooms')->index();
            $table->smallInteger('bathrooms')->index();
            $table->smallInteger('storeys')->index();
            $table->smallInteger('garages')->index();
            $table->float('price', 19)->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
