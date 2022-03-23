<?php

namespace App\Providers;

use App\Repositories\Property\PropertyRepository;
use App\Repositories\Property\PropertyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
    }
}
