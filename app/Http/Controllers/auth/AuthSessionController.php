<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

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
            return redirect('/kas')->with('success', 'berhasil Login');
        }

        throw ValidationException::withMessages([
            'username' => trans('auth.failed'),

        ]);

    }



}
