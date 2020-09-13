<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Api\ApiMessages;

class AuthController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()

    {
        if (!$this->request['email'] || !$this->request['password']) {
            $message = new ApiMessages('Ops, verifique os campos obrigatórios!!!');

            return response()->json($message->getMessage(), 400);
        }

        try {
            $credentials = request(['email', 'password']);

            Validator::make($credentials, [
                'email' => 'required|string',
                'password' => 'required|string'
            ])->validate();

            if (! $token = auth()->attempt($credentials)) {
                return response()->json([
                    'error' => 'Ops, email ou password inválidos!!!'
                ], 401);
            }

            return $this->respondWithToken($token);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());

            return response()->json([
                'message' => 'Ops, algo deu errado!'
            ], 500);
        }
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Até a próxima!!!'
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    private function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'access_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
