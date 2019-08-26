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
        $roleMenuAdditions = [];

        if ($user->getAuthIdentifier()) {
            if (auth()->user()->roleid == 'Resource Administrator') {
                $access = [
                    'icon' => 'mdi-shield-account',
                    'to' => 'home',
                    'label' => 'Access Rights',
                    'separator' => false,
                    'expandable' => true,
                    'children' => [
                        [
                            'icon' => 'mdi-alpha-r-box',
                            'to' => '',
                            'label' => 'Role Access',
                            'separator' => false,
                            'expandable' => false,
                            'level' => 1
                        ],
                        [
                            'icon' => 'mdi-alpha-u-box',
                            'to' => '',
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
                                    'icon' => 'mdi-alpha-a-circle',
                                    'to' => '',
                                    'label' => 'Access Types',
                                    'separator' => false,
                                    'expandable' => false,
                                    'level' => 2
                                ],
                                [
                                    'icon' => 'mdi-alpha-r-circle',
                                    'to' => '',
                                    'label' => 'Roles',
                                    'separator' => false,
                                    'expandable' => false,
                                    'level' => 2
                                ],
                                [
                                    'icon' => 'mdi-alpha-s-circle',
                                    'to' => '',
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
