<?php

namespace App\Repositories\Property;

use App\Http\Controllers\ApiController;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function get(Request $request): array
    {
        $page  = $request->page ?? ApiController::PAGE;
        $limit = $request->limit ?? ApiController::LIMIT;

        $builder = Property::query()->filter($request);

        $total = $builder->count();
        $data  = $builder
            ->offset($page - 1)
            ->take($limit)
            ->get();

        return compact('total', 'data');
    }
}
