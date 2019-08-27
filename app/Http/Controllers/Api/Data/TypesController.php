<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccesszAccessTypes;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $types = AccesszAccessTypes::select(['id', 'value'])->orderBy('created_at', 'DESC')->get()->all();

        return response()->json($types, 200);
    }

    public function type(Request $request)
    {
        if ($type = AccesszAccessTypes::find($request->get('id'))) {
            return response()->json($type);
        } else {
            return response()->json([
                'error' => 'Type not found'
            ]);
        }
    }

    public function create(Request $request)
    {
        $typeName = $request->get('value');

        if (!AccesszAccessTypes::where(['value' => $typeName])->first()) {
            try {
                AccesszAccessTypes::create(['value' => $typeName]);

                $this->logger->info('[Type create] Type created successfully.');
                return response()->json([
                    'message' => 'Type created successfully',
                ], 201);
            } catch (\Exception $e) {
                $this->logger->error('[Type create] ' . $e->getMessage());
                return response()->json([
                    'error' => 'Error when create type',
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
            $type = AccesszAccessTypes::where(['id' => $id])->update(['value' => $newTypeName]);

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
            AccesszAccessTypes::find($id)->delete();

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

}
