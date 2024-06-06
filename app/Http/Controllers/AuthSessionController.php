<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\RedirectResponse;


class AuthSessionController extends Controller
{
    //

    public function create(): view
    {
        return view("login");
    }


    public function store(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']

        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            switch (Auth::user()->user_id) {
                case 2:
                    return redirect('karangTaruna')->with('success', 'berhasil Login');


                default:
                    return redirect('/dashboard')->with('success', 'berhasil Login');

            }
        }

        throw ValidationException::withMessages([
            'username' => trans('auth.failed'),

        ]);

    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
