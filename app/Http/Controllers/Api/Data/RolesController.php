<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccesszRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index()
    {
        $roles = AccesszRoles::select(['id', 'value'])->get()->all();

        return response()->json($roles, 200);
    }

    public function role(Request $request)
    {
        if ($role = AccesszRoles::find($request->get('id'))) {
            return response()->json($role);
        } else {
            return response()->json([
                'error' => 'Role not found'
            ]);
        }
    }

    public function create(Request $request)
    {
        $roleName = $request->get('value');

        if (!AccesszRoles::where('value', $roleName)->first()) {
            $role = AccesszRoles::create(['value' => $roleName]);

            return response()->json($role, 201);
        }

        return response()->json([
            'error' => sprintf('Role "%s" already exists.', $roleName)
        ], 409);
    }

    public function update(Request $request)
    {
        try {
            $id = $request->get('id');
            $newRoleName = $request->get('value');
            $role = AccesszRoles::where(['id' => $id])->update(['value' => $newRoleName]);

            return response()->json($role, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() //'Error when role update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            AccesszRoles::find($id)->delete();

            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error when role delete',
            ], 409);
        }
    }
}
