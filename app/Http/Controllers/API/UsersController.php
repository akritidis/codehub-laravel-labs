<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return response()->json([
            'users' => User::all(),
            'count' => count(User::all())
        ]);
    }

    public function show($id){
        $user = User::find($id);
        if(!isset($user)){
            $response = ['user' => 'not found'];
        }else{
            $response = ['user' => User::find($id)];
        }
        return response()->json($response);
    }
}
