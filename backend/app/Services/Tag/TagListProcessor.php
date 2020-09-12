<?php

namespace App\Services\Tag;

use App\Entities\Tag\Tag;

class TagListProcessor
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function process(): object
    {
        $listTag = auth('api')->user()->tag();

        dd($listTag);

        return response()->json($listTag->paginate(10), 200);
    }
}
