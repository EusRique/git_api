<?php

namespace App\Services\Tag;

use App\Api\ApiMessages;
use App\Entities\Repository\Repository;
use App\Entities\Tag\Tag;
use GuzzleHttp\Client;

class TagDeleteProcessor
{
    protected $requestData;
    protected $tag;

    private const REPOSITORIE_BASE_TAG = 'https://api.github.com/repos/';
    private const REPOSITORIE_URL_TAG = '/releases/';

    public function __construct(array $requestData, Tag $tag)
    {
        $this->requestData = $requestData;
        $this->tag = $tag;
    }

    public function process(): object
    {
        try {

            $tag = Tag::where('id_tag_repository', $this->requestData['id'])
                ->first();

            if (empty($tag)) {
                $message = new ApiMessages('Ops, nenhum registro encontrado!!!');

                return response()->json($message->getMessage(), 403);
            }

            $repositorie = Repository::where('id', $tag['repository_id'])
                ->first()
                ->toArray();

            $this->deleteTagGitAndTagLocal($repositorie, $tag);

            return response()->json(['message' => 'Tag excluída com sucesso'], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Ops, Algo deu errado tente novamente mais tarde!!!',
            ], 500);
        }
    }

    private function deleteTagGitAndTagLocal(array $repositorie, Tag $tag ): void
    {
        $idTag = $this->requestData['id'];
        $urlRepository = self::REPOSITORIE_BASE_TAG . $repositorie['owner'] . '/' . $repositorie['title'] . self::REPOSITORIE_URL_TAG . $idTag;

        $client = new Client();
        $response = $client->delete($urlRepository, [
            'auth' => [$repositorie['owner'], $tag['token_git']],
        ]);

        if ($response->getStatusCode() == 204) {
            $this->tag->where('id_tag_repository', $idTag)->delete();
        }
    }
}
