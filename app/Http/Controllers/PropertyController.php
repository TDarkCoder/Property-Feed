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
        $properties = $this->propertyRepository->get($request);

        return $this->response($properties);
    }
}
