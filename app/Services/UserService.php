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
        $with = [];
        if(isset($inputs['include']) && !empty($inputs['include'])){
            $with = explode(',', $inputs['include']);
        }
        $users = $this->userObj->with($with)->get();
        return $users;
    }

    public function show($id, $inputs){
        $with = [];
        if(isset($inputs['include']) && !empty($inputs['include'])){
            $with = explode(',', $inputs['include']);
        }
        $user = $this->userObj->with($with)->find($id);
        if(empty($user)){
            return ['error' => ['message'=> 'User not found.']];
        }
        return $user;
    }
}