<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
    
            return redirect()->route('homePage');
        }   
        
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
        
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return redirect()->route('login')->with('success', "User logged out successfully");
    }
  
    /*
    |--------------------------------------------------------------------------
    | Forgot-password
    |--------------------------------------------------------------------------
    */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if(!empty($user))
        {
            $user->remember_token = Str::random(40);
            $user->save();
            
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            if ($user) {
                return back()->with('success', 'Check ton email');
            } else {
                return back()->withErrors(['email' => 'Email non trouvé.']);
            }
        } 
        else{
            return back()->withErrors([
                'email'=> 'Email non trouve.'
                ])->onlyInput('email');
        }           
    }

    public function reset(Request $request, $token)
    {
        $request->validate([
            'password' => 'required',
            'confirmPassword' => 'required'
        ]);

        // dd($request);
        
        $user = User::where('remember_token','=',$token)->first();
        if(!empty($user))
        {
            if($request->password == $request->confirmPassword)
            {
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(40);
                $user->save();

                return redirect()->route('login'); 

            }else{
                return back()->withErrors([
                    'password'=> 'Mots de passe non identiques.'
                    ])->onlyInput('password');            }
        }else{
            abort(404);
        }
    }

    public function resetView($token)
    {
        $user = User::where('remember_token', $token)->first();
    
        if (!empty($user)) {
            // Passer le jeton à la vue
            return view('Authentification.reset-password', ['token' => $token]);
        } else {
            abort(404);
        }
    }
    
}
