<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required|email|max:88',
            'password' => 'required',
        ];
        $input = $request->only('email', 'password');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->messages()]);
        } else {
            $credentials = request(['email', 'password']);
            if (!$token = Auth::guard('api')->attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'token' => '',
                    'user_if' => '',
                    'error' => [['email or password incorrect']],
                ]);
            }
            return response()
                ->json([
                    'status' => true,
                    'token' => $token,
                    'user_if' => auth('api')->user(),
                    'error' => [],
                ]);
        }
    }
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'email'    => 'unique:users|required|email|string',
            'phone'    => 'digits:10',
            'password' => 'required|min:8',
        ];
        $input = $request->only('name', 'email', 'password', 'phone');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $user = User::create(['name' => $name, 'email' => $email, 'phone_number' => $phone, 'password' => Hash::make($password)]);
        $user->assignRole('normal_user');
        return response()->json(['success' => true]);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth::user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth::factory()->getTTL() * 60
        ]);
    }
}
