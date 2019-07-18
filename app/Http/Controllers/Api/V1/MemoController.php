<?php

namespace App\Http\Controllers\Api\V1;

use App\Memo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MemoResource;

class MemoController extends Controller
{
    /**
     * メモ一覧を取得するApi
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        return MemoResource::collection($request->user()->memos()->with(['user'])->latest()->get());
    }

    /**
     * メモ一見取得
     * @param  Memo   $memo [description]
     * @return [type]       [description]
     */
    public function show(Memo $memo)
    {
        $memo->load(['user']);
        return new MemoResource($memo);
    }

    /**
     * メモ追加
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|String|min:1|max:50',
            'content' => 'required|String|min:1|max:1000',
            'image' => 'image'
        ]);

        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');

        if ($request->hasFile('image'))
        {
            $path = $request->image->store('images', 'public');
            $memo->image_path = $path;
        }

        $memo->user_id = $request->user()->id;

        $memo->save();

        return (new MemoResource($memo))
            ->response()
            ->setStatusCode(201);
    }
}
