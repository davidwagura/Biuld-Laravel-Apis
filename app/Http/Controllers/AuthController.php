<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    use HttpResponses;

    public function login() 
    {
        return 'This is my login method';
    }

    public function register(StoreUserRequest $request)
    {
        return response()->json($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of'. $user->name)->plainTextToken
        ]);
    }

    public function logout()
    {
        return response()->json('This is my logout method');
    }

}
