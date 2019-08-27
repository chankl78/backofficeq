<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccesszStatus;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusesController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $statuses = AccesszStatus::select(['id', 'value'])->orderBy('created_at', 'DESC')->get()->all();

        return response()->json($statuses, 200);
    }

    public function status(Request $request)
    {
        if ($status = AccesszStatus::find($request->get('id'))) {
            return response()->json($status);
        } else {
            return response()->json([
                'error' => 'Status not found'
            ]);
        }
    }

    public function create(Request $request)
    {
        $statusName = $request->get('value');

        if (!AccesszStatus::where(['value' => $statusName])->first()) {
            try {
                AccesszStatus::create(['value' => $statusName]);

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
            $status = AccesszStatus::where(['id' => $id])->update(['value' => $newStatusName]);

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
            AccesszStatus::find($id)->delete();

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

}
