<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Repository\RepositoryProcessor;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function searchRepositories(Request $request)
    {
        $searchRepositories = new RepositoryProcessor($request->all());
        $response = $searchRepositories->process();

        return $response;
    }
}
