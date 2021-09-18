<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Resources\User\Resource as UserResource;
use App\Http\Resources\User\Collection as UserCollection;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->collection($request);
        return new UserCollection($users);
    }

    public function show($id, Request $request)
    {
        $user = $this->userService->show($id, $request);
        return new UserResource($user);
    }
}
