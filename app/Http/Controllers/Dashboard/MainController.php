<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return response()->json([
            'status' => '',
            'contents' => [
                'something1' => '123',
                'something2' => '234',
                'something3' => '345'
            ]
        ], 200);
    }
}
