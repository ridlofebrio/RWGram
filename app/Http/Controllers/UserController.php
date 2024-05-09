<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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



}
