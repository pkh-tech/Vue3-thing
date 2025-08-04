<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    public function index()
    {
        return response()->json([
            'users' => [
                ['id' => 1, 'name' => 'Alice'],
                ['id' => 2, 'name' => 'Bob'],
                ['id' => 3, 'name' => 'Charlie']
            ]
        ]);
    }

    public function userList()
{
    $users = \App\Models\User::select('id', 'first_name', 'last_name', 'email', 'role', 'created_at', 'updated_at')
                             ->orderBy('id')
                             ->get();

    return response()->json(['users' => $users]);
}
}

