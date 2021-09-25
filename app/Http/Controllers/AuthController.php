<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Services\AuthService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\User\Resource as UserResource;

class AuthController extends Controller
{
    use ApiResponser;
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Login $request){
        $data = $this->authService->login($request);
        if (isset($data['errors'])) {
            return $this->error($data);
        } else {
            $user = $data;
            $data = [
                'user' => new UserResource($user),
                'token' => $data->createToken(config('app.name'))->accessToken
            ];
            return $this->success($data, 200);
        }
    }
}
