<?php

namespace App\Http\Controllers\Api;

use App\Entities\Tag\Tag;
use App\Http\Controllers\Controller;
use App\Services\Tag\TagCreateProcessor;
use App\Services\Tag\TagDeleteProcessor;
use App\Services\Tag\TagListProcessor;
use App\Services\Tag\TagUpdateProcessor;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listTag(Tag $tag)
    {
        $listTag = new TagListProcessor($tag);
        $response = $listTag->process();

        return $response;
    }

    public function createTag(Request $request)
    {
        $createTag = new TagCreateProcessor($request->all());
        $response = $createTag->process();

        return $response;
    }

    public function deleteTag(Request $request, Tag $tag)
    {
        $deleteTag = new TagDeleteProcessor(request()->route()->parameters, $tag);
        $response = $deleteTag->process();

        return $response;
    }

    public function updateTag(Request $request, $id, Tag $tag)
    {
        $updateTag = new TagUpdateProcessor($request->all(), request()->route()->parameters, $tag);
        $response = $updateTag->process();

        return $response;
    }
}
