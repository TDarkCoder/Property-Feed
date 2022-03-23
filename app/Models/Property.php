<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
    ];

    public $timestamps = false;

    public function scopeFilter(Builder $builder, Request $request): Builder
    {
        [$minPrice, $maxPrice] = $request->priceRange;

        return $builder
            ->when($request->name, fn(Builder $builder, string $name) => $builder->where('name', 'ilike', "%$name%"))
            ->when($request->bedrooms, fn(Builder $builder, int $bedrooms) => $builder->where('bedrooms', $bedrooms))
            ->when($request->bathrooms, fn(Builder $builder, int $bathrooms) => $builder->where('bathrooms', $bathrooms))
            ->when($request->garages, fn(Builder $builder, int $garages) => $builder->where('garages', $garages))
            ->when($request->storeys, fn(Builder $builder, int $storeys) => $builder->where('storeys', $storeys))
            ->when($minPrice && $maxPrice, fn(Builder $builder) => $builder->whereBetween('price', [$minPrice, $maxPrice]));
    }
}
