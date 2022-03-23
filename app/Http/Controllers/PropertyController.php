<?php

namespace App\Http\Controllers;

use App\Repositories\Property\PropertyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PropertyController extends ApiController
{
    public function __construct(private PropertyRepositoryInterface $propertyRepository)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $request->page  = $request->page ?? self::PAGE;
        $request->limit = $request->limit ?? self::LIMIT;

        $properties = $this->propertyRepository->get($request);
        $priceRange = $this->propertyRepository->getPriceRange();

        return $this->response([
            ...$properties,
            ...$priceRange,
        ]);
    }
}
