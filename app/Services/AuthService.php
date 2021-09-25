<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private $userObj;

    public function __construct(User $userObj)
    {
        $this->userObj = $userObj;
    }

    public function login($inputs = null)
    {
        $user = $this->userObj->where('email', $inputs['email'])->first();
        if($user == null){
            $data['errors']['user'][] = 'User are not fount.';
            return $data;
        } else {
            if(Hash::check($inputs->password, $user->password)){
                return $user;
            } else {
                $data['errors']['user'][] = 'User credential incorrect.';
                return $data;
            }
        }
    }
}