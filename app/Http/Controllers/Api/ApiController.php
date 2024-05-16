<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    //REGISTER
    public function register(Request $request)
    {
        try {
        $validateUser = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message'=> 'validation error',
                'errors'=> $validateUser->errors()
            ],401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'status' => true,
            'message'=> 'user created successfully',
            'token' => $user -> createToken('API Token')->plainTextToken
        ],200);



        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message'=>$th->getMessage(),

            ],500);
        }

}

///LOGIN

    public function login(Request $request)
    {
        try {

            $validateUser = Validator::make($request->all(),[

                'email' => 'required|email',
                'password' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message'=> 'validation error',
                    'errors'=> $validateUser->errors()
                ],401);
            }

            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json([
                    'status' => false,
                    'message'=> 'Email or password is not correct',
                    'errors'=> $validateUser->errors()
                ],401);
            }


            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message'=> 'User Logged In successfully',
                'token' => $user -> createToken('API Token')->plainTextToken
            ],  200);


        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message'=>$th->getMessage(),
            ],500);
        }

}

    public function profile() {
        $userData = auth()->user();
        return response()->json([
                'status' => true,
                'message'=> 'User Profile Information',
                'data'=> $userData,
                'id'=> auth()->user()->id ,
        ],200);
}

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message'=> 'User Logged Out successfully',
            'data'=> [],


        ]);
}

























}

// Register Login Profile and Logout
