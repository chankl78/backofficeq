<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    public function index()
    {
        $types = AccessType::select(['id', 'name', 'description'])->orderBy('created_at', 'DESC')->get()->all();

        return response()->json($types, 200);
    }

    public function type(Request $request)
    {
        try {
            if ($request->get('id') === 'new') {
                return response()->json([
                    'type' => false,
                ]);
            } elseif ($type = AccessType::find($request->get('id'))) {
                return response()->json([
                    'type' => $type
                ]);
            } else {
                return response()->json([
                    'error' => 'Type not found'
                ], 409);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error when loading access type'
            ], 500);
        }
    }

    public function create(Request $request)
    {
        $typeName = $request->get('value');

        if (!AccessType::where(['description' => $typeName])->exists()) {
            try {
                $systemName = $this->createForSystemName($typeName);
                AccessType::create([
                    'name' => $systemName,
                    'description' => $typeName,
                ]);
                $this->logger->info('[Type create] Type created successfully.');
                return response()->json([
                    'message' => 'Type created successfully',
                ], 201);
            } catch (\Exception $e) {
                $this->logger->error('[Type create] ' . $e->getMessage());
                return response()->json([
                    'error' => $e->getMessage() //'Error when create type',
                ], 500);
            }
        }
        $message = sprintf('Type "%s" already exists.', $typeName);

        $this->logger->warning('[Type create] ' . $message);
        return response()->json([
            'error' => $message
        ], 409);
    }

    public function update(Request $request)
    {
        try {
            $id = $request->get('id');
            $newTypeName = $request->get('value');
            if (!AccessType::where(['description' => $newTypeName])->exists()) {
                $systemName = $this->createForSystemName($newTypeName);
                $type = AccessType::where(['id' => $id])->update([
                    'name' => $systemName,
                    'description' => $newTypeName,
                ]);
            } else {
                $message = sprintf('Access type "%s" already exists', $newTypeName);
                $this->logger->warning('[Type update] ' . $message);
                return response()->json([
                    'error' => $message,
                ], 409);
            }
            $this->logger->info('[Type update] Type updated successfully.');
            return response()->json($type, 200);
        } catch (\Exception $e) {
            $this->logger->error('[Type update] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when type update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            AccessType::find($id)->delete();

            $this->logger->info('[Type delete] Type deleted successfully.');
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            $this->logger->info('[Type delete] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when type delete',
            ], 409);
        }
    }

    protected function createForSystemName($name)
    {
        $name = str_replace(' ', '-', strtolower($name));
        if (AccessType::where(['name' => $name])->exists()) {
            $add = 1;
            $name = sprintf('%s-%s', $name, $add);
            while (AccessType::where(['name' => $name])->exists()) {
                $add++;
                $name = sprintf('%s-%s', $name, $add);
            }
        }
        return $name;
    }

}
