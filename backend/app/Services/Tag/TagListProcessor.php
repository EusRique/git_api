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
        $listTags = $this->listTag();

        return $listTags;
    }

    private function listTag(): object
    {
        $listTags = $this->tag->paginate('10');

        return $listTags;
    }
}
