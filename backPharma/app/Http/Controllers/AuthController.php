<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }
        $user = $request->user();
        $token = $user->createToken('Access Token');
        $user->access_token = $token->accessToken;
        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token->accessToken,

        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => "User logged out successfully"
        ], 200);
    }
  
    public function index()
    {
        return response()->json([
            'message' => 'Hello world'
        ], 200);
    }


    
    /*
    |--------------------------------------------------------------------------
    | Forgot-password
    |--------------------------------------------------------------------------
    */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json(['status' => 'failed', 'message' => 'User not found'], 404);
        }
    
        $token = Str::random(60);
        $existingToken = DB::table('password_resets')->where('email', $user->email)->first();
    
        if ($existingToken) {
            DB::table('password_resets')->where('email', $user->email)->update(['token' => $token]);
        } else {
            DB::table('password_resets')->insert(['email' => $user->email, 'token' => $token]);
        }
    
        Mail::send('forgot_password', ['token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Réinitialisation du mot de passe');
        });
    
        return response()->json(['status' => 'success', 'message' => 'Password reset link sent to your email']);
    }
    public function reset(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        
            $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $validatedData['email'],
                'token' => $request->token
            ])->first();
        if (!$updatePassword) {
            return response()->json(['error' => 'invalid_token'], 400);
        }

        User::where('email', $validatedData['email'])
            ->update(['password' => Hash::make($validatedData['password'])]);

        DB::table('password_resets')->where('email', $validatedData['email'])->delete();

        return response()->json(['message' => 'Password reset successfully'], 200);
    }
}
