<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;
use PhpOption\None;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()->can('index', User::class))
            return User::all();
    }

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

    public function show($id, Request $request)
    {
        $user = User::findOrFail($id);
        if($request->user()->can('view', $user))
            return $user;
    }

    public function delete($id, Request $request)
    {

        $user = User::find($id);

        if($request->user()->can('view', $user))
            $user->delete();
    }
}
