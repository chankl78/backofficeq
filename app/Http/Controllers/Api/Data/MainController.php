<?php

namespace App\Http\Controllers\Api\Data;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => '',
            'contents' => [
                'something1' => '123',
                'something2' => '234',
                'something3' => '345'
            ],
            'user' => Auth::user()->username
        ], 200);
    }
}
