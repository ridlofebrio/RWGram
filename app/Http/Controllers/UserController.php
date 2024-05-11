<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //


    public function index()
    {
        $data = User::with('Role')->get();
        $active = 'akun';
        return view('dashboard.akun', compact('data', 'active'));
    }

    public function destroy($id)
    {

        try {
            User::destroy($id);
            return redirect('dashboard/akun')->with('flash', ['success', 'Data berhasil dihapus']);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('dashboard/akun')->with('flash', ['error', 'Data Gagal dihapus karena data terkait dengan tabel lain']);
        }
    }


    public function show()
    {
        $user = User::with('role')->find(Auth::user()->user_id);
        $active = 'Detail Akun';

        return view('dashboard.detail_akun', compact('user', 'active'));
    }


}
