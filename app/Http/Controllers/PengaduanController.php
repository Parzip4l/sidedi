<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email',
            'nomor_telepon' => 'required|string',
            'pesan' => 'required|string',
        ]);

        // Buat pengaduan baru
        $pengaduan = new Pengaduan();
        $pengaduan->nik = $validatedData['nik'];
        $pengaduan->nama = $validatedData['nama'];
        $pengaduan->email = $validatedData['email'];
        $pengaduan->nomor_telepon = $validatedData['nomor_telepon'];
        $pengaduan->pesan = $validatedData['pesan'];
        $pengaduan->save();

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim');
    }

    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $pengaduans = Pengaduan::all();

            //render view with posts
            return view('pages.pengaduan.index', compact('pengaduans'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return abort(404);
        }

        return view('pages.pengaduan.show', compact('pengaduan'));
    }
}
