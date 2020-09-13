<?php

namespace App\Services\Repository;

use App\Api\ApiMessages;
use App\Entities\Repository\Repository;
use GuzzleHttp\Client;

class RepositoryProcessor
{
    protected $requestData;

    private const REPOSITORIE_BASE = 'https://api.github.com/users/';
    private const REPOSITORIE_URL = '/repos';

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    public function process(): object
    {
        $repositories = $this->searchRepositorie();

        return $repositories;
    }

    public function searchRepositorie(): object
    {
        if (!$this->requestData['usernameGit']) {
            $message = new ApiMessages('Ops, verifique os campos obrigatórios!!!');

            return response()->json($message->getMessage(), 400);
        }

        try {
            $username = $this->requestData['usernameGit'];
            $urlRepository = self::REPOSITORIE_BASE . $username . self::REPOSITORIE_URL;

            $client = new Client();
            $repositories = $client->get($urlRepository);
            $repositories = json_decode($repositories->getBody());
            $repositories = $this->treatRepositories($repositories);

            return response()->json($repositories, 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Ops, Repositório não encontrado!!!'
            ], 401);
        }
    }

    public function treatRepositories(array $repositories): array
    {
        $listRepositories = [];
        foreach ($repositories as $repositorie) {
            $listRepositories[] = [
                'id_repository' => $repositorie->id,
                'title' => $repositorie->name,
                'description' => $repositorie->description,
                'language' => $repositorie->language,
                'owner' => $repositorie->owner->login,
                'url' => $repositorie->url,
            ];
        }
        return $listRepositories;
    }
}
