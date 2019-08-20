<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function submit(Request $req)
    {
        return response()->json([
            'username' =>  $req->post('username'),
            'password_hash' => password_hash($req->post('password'), PASSWORD_BCRYPT),
        ]);
    }
}

