<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccesszRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index()
    {
        // ...
        $roles = AccesszRoles::select(['id', 'value'])->get()->all();

        return response()->json($roles);
    }
}
