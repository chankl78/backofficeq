<?php

namespace App\Http\Controllers\Api\Data;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $defaultMenuItems = [
        [
            'icon' => 'mdi-home',
            'to' => 'home',
            'label' => 'Home',
            'separator' => false,
        ],
        [
            'icon' => 'mdi-account',
            'to' => 'profile',
            'label' => 'Profile',
            'separator' => false,
        ],
        [
            'icon' => 'mdi-settings',
            'to' => 'settings',
            'label' => 'Settings',
            'separator' => true,
        ],
    ];

    public function index()
    {
        return response()->json([
            'status' => '',
            'contents' => [
                'something1' => '123',
                'something2' => '234',
                'something3' => '345'
            ],
            'menu' => $this->getUserMenu(),
            'user' => Auth::user()
        ], 200);
    }

    protected function getUserMenu()
    {
        $user = Auth::user();

        return array_merge($this->defaultMenuItems, []);
    }
}
