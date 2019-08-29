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
            'user' => auth()->user()
        ], 200);
    }

    protected function getUserMenu()
    {
        $user = Auth::user();
        $roleMenuAdditions = [];

        if ($user->getAuthIdentifier()) {
            if (auth('api')->user()->hasAnyRole(['system-administrator', 'software-administrator'])) {
                $access = [
                    'icon' => 'mdi-shield-account',
                    'to' => 'home',
                    'label' => 'Access Rights',
                    'separator' => true,
                    'expandable' => true,
                    'children' => [
                        [
                            'to' => 'role-access',
                            'label' => 'Role Access',
                            'separator' => false,
                            'expandable' => false,
                            'level' => 1
                        ],
                        [
                            'to' => 'user-access',
                            'label' => 'User Access',
                            'separator' => false,
                            'expandable' => false,
                            'level' => 1
                        ],
                        [
                            'icon' => 'mdi-table',
                            'to' => '',
                            'label' => 'Default Table',
                            'separator' => false,
                            'expandable' => true,
                            'level' => 1,
                            'children' => [
                                [
                                    'to' => 'default-table-access-types',
                                    'label' => 'Access Types',
                                    'separator' => false,
                                    'expandable' => false,
                                    'level' => 2
                                ],
                                [
                                    'to' => 'default-table-statuses',
                                    'label' => 'Status',
                                    'separator' => false,
                                    'expandable' => false,
                                    'level' => 2
                                ]
                            ]
                        ]
                    ]
                ];
                $roleMenuAdditions = array_merge($roleMenuAdditions, [$access]);
            }
        }
        return array_merge($this->defaultMenuItems, $roleMenuAdditions);
    }
}
