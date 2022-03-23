<?php

namespace App\Repositories\Property;

use Illuminate\Http\Request;

interface PropertyRepositoryInterface
{
    public function get(Request $request): array;
}
