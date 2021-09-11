<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $with = [];
        if(isset($request['include']) && !empty($request['include'])){
            $with = explode(',', $request['include']);
        }
        $user = User::with($with)->get();
        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::with('orders')->find($id);
        return response()->json($user);
    }
}
