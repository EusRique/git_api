<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\User\UserCreateProcessor;
use App\Services\User\ListUserProcessor;
use App\Services\User\UpdateUserProcessor;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request, User $user)
    {
        $createUser = new UserCreateProcessor($request->all(), $user);
        $response = $createUser->createUser();

        return $response;
    }

    public function listUser(Request $request, User $user)
    {
        $listUser = new ListUserProcessor($request->all(), $user);
        $response = $listUser->listUser();

        return $response;
    }

    public function updateUser(Request $request, $id, User $user)
    {
        $listUser = new UpdateUserProcessor($request->all(), request()->route()->parameters, $user);
        $response = $listUser->updateUser();

        return $response;
    }
}
