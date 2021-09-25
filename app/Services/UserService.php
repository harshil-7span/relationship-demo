<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    private $userObj;

    public function __construct(User $userObj)
    {
        $this->userObj = $userObj;
    }

    public function collection($inputs = null)
    {
        $users = $this->userObj->getQB()->get();
        return $users;
    }

    public function show($id, $inputs){
        $user = $this->userObj->getQB()->find($id);
        if(empty($user)){
            return ['error' => ['message'=> 'User not found.']];
        }
        return $user;
    }
}