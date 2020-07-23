<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;


class UserController extends Controller
{

    public function __construct()
    {
        // Forces to be authenticated.
        $this->middleware('auth');
        // $this->middleware('check_role:admin');
    }
    public function fetch(Request $request){
        $users = User::query();
        if($request->query('name')){
            $n = $request->query('name');
            $users->where('name', 'like', "{$n}%");
        }
        $users = $users->paginate(10);

        return UserResource::collection($users);
    }
    public function fetchOne(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'Not found'], 404); 
        }
        return new UserResource($user);
    }
}