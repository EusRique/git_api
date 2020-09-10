<?php

namespace App\Services\User;

use App\Api\ApiMessages;
use App\User;

class ListUserProcessor
{
    protected $requestData;
    private $user;

    public function __construct(array $requestData, User $user)
    {
        $this->requestData = $requestData;
        $this->user = $user;
    }

    public function listUser(): object
    {
        $users = $this->user->paginate('20');

        return response()->json($users, 200);
    }
}
