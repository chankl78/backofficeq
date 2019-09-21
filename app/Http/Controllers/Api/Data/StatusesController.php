<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusesController extends Controller
{
    public function index()
    {
        $statuses = Status::select(['id', 'name', 'description'])->orderBy('created_at', 'DESC')->get()->all();

        return response()->json($statuses, 200);
    }

    public function status(Request $request)
    {
        try {
            if ($request->get('id') === 'new') {
                return response()->json([
                    'status' => false,
                ]);
            } elseif ($status = Status::find($request->get('id'))) {
                return response()->json([
                    'status' => $status,
                ]);
            } else {
                $this->logger->warning('[Access status load]', 'Status not found');
                return response()->json([
                    'error' => 'Status not found'
                ]);
            }
        } catch (\Exception $e) {
            $this->logger->error('[Access status load]', 'Error when loading status');
            return response()->json([
                'error' => 'Error when loading status'
            ], 500);
        }
    }

    public function create(Request $request)
    {
        $statusName = $request->get('value');

        if (!Status::where(['description' => $statusName])->first()) {
            try {
                $systemName = $this->createForSystemName($statusName);

                Status::create([
                    'name' => $systemName,
                    'description' => $statusName,
                ]);

                $this->logger->info('[Status create] Status created successfully.');
                return response()->json([
                    'message' => 'Status created successfully',
                ], 201);
            } catch (\Exception $e) {
                $this->logger->error('[Status create] ' . $e->getMessage());
                return response()->json([
                    'error' => 'Error when create status',
                ], 500);
            }
        }
        $message = sprintf('Status "%s" already exists.', $statusName);

        $this->logger->warning('[Status create] ' . $message);
        return response()->json([
            'error' => $message
        ], 409);
    }

    public function update(Request $request)
    {
        try {
            $id = $request->get('id');
            $newStatusName = $request->get('value');
            if (!Status::where(['description' => $newStatusName])->exists()) {
                $systemName = $this->createForSystemName($newStatusName);
                $status = Status::where(['id' => $id])->update([
                    'name' => $systemName,
                    'description' => $newStatusName
                ]);
            } else {
                $message = sprintf('Status "%s" already exists', $newStatusName);
                $this->logger->warning('[Type update] ' . $message);
                return response()->json([
                    'error' => $message,
                ], 409);
            }
            $this->logger->info('[Status update] Status updated successfully.');
            return response()->json($status, 200);
        } catch (\Exception $e) {
            $this->logger->error('[Status update] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when status update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            Status::find($id)->delete();

            $this->logger->info('[Status delete] Status deleted successfully.');
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            $this->logger->info('[Status delete] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when status delete',
            ], 409);
        }
    }

    protected function createForSystemName($name)
    {
        $name = str_replace(' ', '-', strtolower($name));
        if (Status::where(['name' => $name])->exists()) {
            $add = 1;
            $name = sprintf('%s-%s', $name, $add);
            while (Status::where(['name' => $name])->exists()) {
                $add++;
                $name = sprintf('%s-%s', $name, $add);
            }
        }
        return $name;
    }

}
