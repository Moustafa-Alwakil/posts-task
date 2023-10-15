<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class ListPostController extends Controller
{
    public function __invoke(Request $request)
    {
        return PostResource::collection(
            Post::query()
                ->with('user')
                ->paginate()
        );
    }
}
