<?php

namespace App\Services\Tag;

use App\Api\ApiMessages;
use App\Entities\Repository\Repository;
use App\Entities\Tag\Tag;
use GuzzleHttp\Client;

class TagCreateProcessor
{
    protected $requestData;

    private const REPOSITORIE_BASE_TAG = 'https://api.github.com/repos/';
    private const REPOSITORIE_URL_TAG = '/releases';

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    public function process(): object
    {
        if (!$this->requestData['owner']
            || !$this->requestData['repo']
            || !$this->requestData['token_git']
            || !$this->requestData['tag_name'])
        {
            $message = new ApiMessages('Ops, verifique os campos obrigatórios!!!');

            return response()->json($message->getMessage(), 401);
        }

        try {
            $owner = $this->requestData['owner'];
            $repositorie = $this->requestData['repo'];
            $urlRepository = self::REPOSITORIE_BASE_TAG . $owner . '/' . $repositorie;

            $client = new Client();
            $repositorie = $client->get($urlRepository);
            $repositorie = json_decode($repositorie->getBody(), true);
            $repositorie = $this->treatRepositorie($repositorie);

            $repositorieData = Repository::updateOrCreate(
                [
                    'id_repository' => $repositorie['id_repository'],
                ], $repositorie
            );

            $this->createTagGit($repositorieData);

            return response()->json(['message' => 'Tag cadastrada com sucesso'], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Ops, Já existe uma tag com esse nome!!!',
            ], 400);
        }
    }

    private function treatRepositorie(array $repositorie): array
    {
        $repositorieData = [
            'id_repository' => $repositorie['id'],
            'title' => $repositorie['name'],
            'description' => $repositorie['description'],
            'language' => $repositorie['language'],
            'owner' => $repositorie['owner']['login'],
            'token_git' => $this->requestData['token_git'],
            'url' => $repositorie['url'],
        ];

        return $repositorieData;
    }

    private function createTagGit(Repository $repositorieData): void
    {
        $owner = $this->requestData['owner'];
        $repositorie = $this->requestData['repo'];
        $tokenGit = $this->requestData['token_git'];
        $urlRepository = self::REPOSITORIE_BASE_TAG . $owner . '/' . $repositorie . self::REPOSITORIE_URL_TAG;

        $client = new Client();
        $tagGit = $client->post($urlRepository, [
            'auth' => [$owner, $tokenGit],
            'json' => [
                'tag_name' => $this->requestData['tag_name'],
                'body' => $this->requestData['body'],
            ],
        ]);
        $tagGit = json_decode($tagGit->getBody(), true);

        $this->treatTag($tagGit, $repositorieData);
    }

    private function treatTag(array $tag, Repository $repositorie): void
    {
        $tagData = [
            'repository_id' => $repositorie['id'],
            'id_tag_repository' => $tag['id'],
            'tag_name' => $tag['tag_name'],
            'target_commitish' => $tag['target_commitish'],
            'login' => $tag['author']['login'],
            'body' => $tag['body'],
        ];

        Tag::updateOrCreate(['id_tag_repository' => $tagData['id_tag_repository']], $tagData);
    }
}
