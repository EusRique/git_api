<?php

namespace App\Services\User;

use App\Api\ApiMessages;
use App\User;

class UserCreateProcessor
{
    protected $requestData;
    private $user;

    public function __construct(array $requestData, User $user)
    {
        $this->requestData = $requestData;
        $this->user = $user;
    }

    public function createUser(): object
    {
        if (!$this->requestData['name'] || !$this->requestData['email'] || !$this->requestData['password']) {
            $message = new ApiMessages('Ops, verifique os campos obrigatórios!!!');

            return response()->json($message->getMessage(), 400);
        }

        try {
            $this->requestData['password'] = bcrypt($this->requestData['password']);

            $user = $this->user->create($this->requestData);

            return response()->json([
                'data' => [
                    'msg' => 'Usuário cadastrado com sucesso!',
                ],
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());

            return response()->json($message->getMessage(), 401);
        }
    }
}
