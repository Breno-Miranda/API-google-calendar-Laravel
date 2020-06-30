<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use JWTAuth;
use Hash;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function authenticate(Request $request) {

        $credentials = $request->only('email', 'password');

        try {
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 400);
          }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));

      }

      public function AuthCreateUser(Request $request) {

        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:6', 'max:20']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);

      }
}
