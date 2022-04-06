<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{



    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'Kredensial Incorrect'
            ], 400);
        };

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'isSuccess' => true,
            'user' => $user,
            'token' => $token
        ], 200);
    }


    public function register(Request $request)
    {
        if (self::checkIfEmailExist($request->email)) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'email ( ' . $request->email . ' ) telah digunakan'
            ], 400);
        };

        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response([
            'isSuccess' => true,
            'message' => 'User berhasil dibuat',
        ], 201);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'isSuccess' => true,
            'message' => 'Token berhasil dihapus',
        ], 200);
    }



    #utility
    private function checkIfEmailExist($email)
    {
        $data = User::where('email', $email)->get();
        if (count($data) > 0) {
            return true;
        }

        return false;
    }
}
