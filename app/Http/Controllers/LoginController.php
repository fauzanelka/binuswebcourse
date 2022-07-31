<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->to('/auth/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/module/team/1');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function authenticate_captcha(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'g-recaptcha-response' => 'recaptcha',
        ]);

        if (Auth::attempt(collect($credentials)->only('email', 'password')->toArray())) {
            $request->session()->regenerate();

            return redirect()->intended('/module/team/1');
        }
        
        if (RateLimiter::tooManyAttempts('login-try:'.session()->getId(), 3)) {
            return back()->withErrors([
                'limit' => 'Please try again in 30 seconds',
            ]);
        }

        RateLimiter::hit('login-try:'.session()->getId(), 30);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function formForgotPassword()
    {
        return view('forgot');
    }

    public function forgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'secret' => ['required', 'string', 'in:secret']
        ]);

        $encrypted = Crypt::encryptString(json_encode($data));

        if (!User::whereEmail($data['email'])->exists()) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        return redirect()->route('reset', ['code' => $encrypted]);
    }

    public function formResetPassword(Request $request)
    {
        $data = null;
        try {
            $data = json_decode(Crypt::decryptString($request->input('code')), true);
        } catch (\Throwable $th) {
            return redirect()->route('forgot')->withErrors(['alert' => 'Code is invalid']);
        }
        
        return view('reset', ['email' => $data['email']]);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $user = User::whereEmail($data['email']);
        if (!$user->exists()) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        $user = $user->first();
        $user->password = bcrypt($data['password']);
        $user->save();

        return view('reset', [
            'email' => $data['email'],
            'success' => 'Reset password success! You will be redirected in 5 seconds.'
        ]);
    }
}
