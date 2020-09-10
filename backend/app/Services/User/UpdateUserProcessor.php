<?php

namespace App\Services\User;

use App\Api\ApiMessages;
use App\User;

class UpdateUserProcessor
{
    public function __construct(array $requestData, $id, User $user)
    {
        $this->requestData = $requestData;
        $this->id = $id;
        $this->user = $user;
    }

    public function updateUser()
    {
        try {
            if ($this->requestData['password']) {
                $this->requestData['password'] = bcrypt($this->requestData['password']);
            } else {
                unset($this->requestData['password']);
            }

            $idUser = $this->id;
            $user = $this->user->findOrFail($idUser)
                ->first()
                ->fill($this->requestData)
                ->save();

            return response()->json([
                'data' => [
                    'msg' => 'Usuário atualizado com sucesso!!!',
                ],
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());

            return response()->json(['message' => 'Ops, algo deu errado, verifique todos os campos obrigatórios!'], 401);
        }
    }
}
