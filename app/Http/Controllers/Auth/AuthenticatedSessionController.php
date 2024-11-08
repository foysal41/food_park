<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

     /*
        যখন একজন ইউজার লগইন করে, তখন মেথডটি ইউজারের তথ্য যাচাই করে। যদি ক্রিডেনশিয়াল সঠিক হয়, তবে সেশন তৈরি হয় এবং ডিফল্ট রুটে রিডাইরেক্ট করা হয়।

        Route Service Provider-এ HOME নামে একটি কনস্ট্যান্ট আছে যা dashboard পাথ নির্দেশ করে। তাই, লগইনের পর সবাই dashboard URL-এ রিডাইরেক্ট হয়। ফলে, অ্যাডমিনকেও ডিফল্টভাবে ইউজার ড্যাশবোর্ডে পাঠানো হচ্ছে, তার অ্যাডমিন ড্যাশবোর্ডে নয়।

        অ্যাডমিনকে সঠিকভাবে রিডাইরেক্ট করতে পৃথক সেটআপ প্রয়োজন।

     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if($request->user()->role === 'admin'){
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

        //normal user redirect to home page
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
