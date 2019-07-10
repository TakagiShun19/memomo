<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return new UserResource($request->user());
    }
}
