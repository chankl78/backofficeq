<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\AccessmUser;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $users = AccessmUser::select([
            'uniquecode',
            'name',
            'username',
            'email',
            'email_verified_at',
            'status'
        ])->orderBy('created_at', 'DESC')->get()->all();

        return response()->json($users, 200);
    }

    public function info(Request $request)
    {
        if ($user = AccessmUser::where(['uniquecode' => $request->get('id')])->first()) {
            return response()->json($user);
        } else {
            return response()->json([
                'error' => 'User not found'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->get('uniquecode');
            $data = $request->only([
                'name',
                'username',
                'email',
                'status'
            ]);

            $user = AccessmUser::where(['uniquecode' => $id])->update($data);

            $this->logger->info('[User update] User updated successfully.');
            return response()->json($user, 200);
        } catch (\Exception $e) {
            $this->logger->error('[User update] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when user update',
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            AccessmUser::where(['uniquecode' => $id])->delete();

            $this->logger->info('[User delete] Role deleted successfully.');
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            $this->logger->info('[User delete] ' . $e->getMessage());
            return response()->json([
                'error' => 'Error when user delete',
            ], 409);
        }
    }

}
