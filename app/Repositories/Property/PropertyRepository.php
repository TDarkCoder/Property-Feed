<?php

namespace App\Repositories\Property;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function get(Request $request): array
    {
        $builder = Property::query()->filter($request);

        $total = $builder->count();

        if ($request->page && $request->limit) {
            $builder->offset($request->page - 1)->take($request->limit);
        }

        $data = $builder->get();

        return compact('total', 'data');
    }

    public function getPriceRange(): array
    {
        $builder = Property::query();

        $min = $builder->min('price');
        $max = $builder->max('price');

        return compact('min', 'max');
    }
}
