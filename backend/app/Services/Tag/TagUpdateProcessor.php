<?php

namespace App\Services\Tag;

use App\Api\ApiMessages;
use App\Entities\Repository\Repository;
use App\Entities\Tag\Tag;
use GuzzleHttp\Client;

class TagUpdateProcessor
{
    protected $requestData;
    protected $tag;
    protected $id;

    private const REPOSITORIE_BASE_TAG = 'https://api.github.com/repos/';
    private const REPOSITORIE_URL_TAG = '/releases/';

    public function __construct(array $requestData, $id, Tag $tag)
    {
        $this->requestData = $requestData;
        $this->id = $id;
        $this->tag = $tag;
    }

    public function process(): object
    {
        if (!$this->requestData['tag_name'] || !$this->requestData['body']) {
            $message = new ApiMessages('Ops, verifique os campos obrigatórios!!!');

            return response()->json($message->getMessage(), 400);
        }

        try {

            $tag = Tag::where('id_tag_repository', $this->id['id'])
            ->first()
            ->toArray();

            if (empty($tag)) {
                $message = new ApiMessages('Ops, nenhum registro encontrado!!!');

                return response()->json($message->getMessage(), 200);
            }

            $repositorie = Repository::where('id', $tag['repository_id'])
                ->first()
                ->toArray();

            $this->updateTagGitAndLocal($tag, $repositorie);

            return response()->json(['message' => 'Tag Atualizada com sucesso'], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Ops, Algo deu errado tente novamente mais tarde!!!',
            ], 500);
        }
    }

    public function updateTagGitAndLocal(array $tag, array $repositorie): void
    {
        $urlRepository = self::REPOSITORIE_BASE_TAG . $repositorie['owner'] . '/' . $repositorie['title'] . self::REPOSITORIE_URL_TAG . $tag['id_tag_repository'];

        $client = new Client();
        $response = $client->patch($urlRepository, [
            'auth' => [$repositorie['owner'], $repositorie['token_git']],
            'json' => [
                'tag_name' => $this->requestData['tag_name'],
                'body' => $this->requestData['body'],
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            $this->tag->findOrFail($tag['id'])
                ->first()
                ->fill($this->requestData)
                ->save();
        }
    }
}
