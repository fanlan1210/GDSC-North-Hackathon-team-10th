<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOption\None;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('account', $request->input('account'))->first();

        if ($user){
            if($user->password == hash('sha256', $request->input('password'))){
                $token = $user->createToken('api_token')->plainTextToken;
                return response(['token'=>$token]);
            }
        }

        return response("fail", 401);
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->account = $request->input('account');
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->password = hash('sha256', $request->input('password'));
        $user->email = $request->input('email');
        $user->type = 0;

        $user->save();
    }

    public function show(Request $request)
    {
        return $request->user();
    }

    public function delete(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->delete();
    }
}
