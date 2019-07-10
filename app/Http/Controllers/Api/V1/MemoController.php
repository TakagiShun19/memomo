<?php

namespace App\Http\Controllers\Api\V1;

use App\Memo;
use App\Http\Resources\V1\MemoResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemoController extends Controller
{
    /**
     * めもの一覧
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        return MemoResource::collection($request->user()->memos()->with(['user'])->get());
    }

/**
 * 一件のメモ
 * @param  Memo   $memo [description]
 * @return [type]       [description]
 */
    public function show(Memo $memo)
    {
        $memo->load(['user']);
        return new MemoResource($memo);
    }
}
