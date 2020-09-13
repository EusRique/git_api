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
        if (!$this->requestData['name'] || !$this->requestData['email'] || !$this->requestData['password']) {
            $message = new ApiMessages('Ops, verifique os campos obrigatórios!!!');

            return response()->json($message->getMessage(), 403);
        }

        try {
            if ($this->requestData['password']) {
                $this->requestData['password'] = bcrypt($this->requestData['password']);
            } else {
                unset($this->requestData['password']);
            }

            $idUser = $this->id;
            $userId = User::where('id', $idUser['id'])
                ->first();

            if (empty($userId)) {
                $message = new ApiMessages('Ops, Não encontramos o usuário!!!');

                return response()->json($message->getMessage(), 403);
            }

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

            return response()->json([
                'message' => 'Ops, algo deu errado, verifique todos os campos obrigatórios!'
            ], 400);
        }
    }
}
