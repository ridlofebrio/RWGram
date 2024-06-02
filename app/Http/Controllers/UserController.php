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
        $data = User::with('Role')->paginate(3);
        $active = 'akun';
        return view('dashboard.akun', compact('data', 'active'));
    }

    public function gantiGambar(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $file = (array) cloudinary()->uploadApi()->upload($request->file('foto_profil')->getRealPath(), $options = []);

            $user->foto_profil = $file['secure_url'];
            $user->asset_id = $file['asset_id'];
            $user->save();

        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('dashboard/detail-akun')->with('flash', ['success', 'Foto Profil Berhasil Di Perbarui']);
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
