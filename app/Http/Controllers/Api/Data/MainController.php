<?php

namespace App\Http\Controllers\Api\Data;

use App\Http\Controllers\Controller;
use App\Models\User;

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
        $userId = auth('api')->user();
        return response()->json([
            'status' => '',
            'contents' => [
                'something1' => '123',
                'something2' => '234',
                'something3' => '345'
            ],
            'menu' => $this->getUserMenu(),
        ], 200);
    }

    protected function getUserWithPermissions()
    {
        $userId = auth('api')->user()->id;
        $user = User::with(['roles'])->where(['id' => $userId])->first();
        $permissions = $user->getPermissionsViaRoles()->pluck('name');
        return [
            'user' => $user->only(['name', 'username', 'email']),
            'roles' => $user->roles()->pluck('name'),
            'permissions' => $permissions,
        ];
    }

    protected function getUserMenu()
    {
        $user = auth('api')->user();
        $roleMenuAdditions = [];

        if ($user->getAuthIdentifier()) {
            $access = [];
            $events = [];
            if (
                $user->hasAnyRole(['system-administrator', 'software-administrator']) &&
                $user->hasVerifiedEmail()
            ) {
                $access = [
                    'icon' => 'mdi-shield-account',
                    'to' => 'home',
                    'label' => 'Access Rights ',
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
                $events = [
                    'icon' => 'mdi-calendar-text',
                    'label' => 'Events',
                    'separator' => true,
                    'expandable' => true,
                    'children' => [
                        [
                            'to' => 'events-list',
                            'label' => 'List',
                            'separator' => false,
                            'expandable' => false,
                            'level' => 1,
                        ]
                    ]
                ];
            } elseif ($user->hasPermissionTo('read') && !$user->hasVerifiedEmail()) {
                $access = [
                    'icon' => 'mdi-account-question',
                    'color' => 'red',
                    'class' => 'text-negative',
                    'captionClass' => 'text-negative',
                    'label' => 'Email is not verified!',
                    'caption' => '( Click to resend )',
                    'separator' => true,
                    'expandable' => false,
                    'callFunc' => 'resendVerification',
                    'callFuncParam' => ['email' => $user->email],
                ];
            }
            if (count($access) > 0) {
                $roleMenuAdditions = array_merge($roleMenuAdditions, [$events, $access]);
            }
        }
        return array_merge($this->defaultMenuItems, $roleMenuAdditions);
    }
}
