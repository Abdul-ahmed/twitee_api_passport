<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\PersonalAccessTokenResult;

class UserController extends Controller
{
    public function signUp(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 403);
        }
        $addData = $request->all();
        $addData['password'] = bcrypt($addData['password']);

        $user = User::create($addData);
        $name = $user->name;
        $email = $user->email;
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = [
            'token' => $token,
            'name' => $name,
            'email' => $email
        ];
        return response($response, 200);

    }

    public function signIn(Request $request)
    {
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])) {
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = [
                'token' => $token,
                'name' => $name,
                'email' => $email
            ];
            return response($response, 200);
        }else {
            return response()->json(['error'=>'User Unauthorize'], 403);
        }
    }

    public function signOut(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json(['message' => 'Logged out Successfully']);
    }

}
