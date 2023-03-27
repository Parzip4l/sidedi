<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ZakatController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $zakat = Zakat::all();

            //render view with posts
            return view('pages.zakat.index', compact('zakat'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function laporan()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
            $jumlah_data = Zakat::count();
            $beras = Zakat::where('jenis', 'beras')->count();
            $uang = Zakat::where('jenis', 'uang')->count();
            //render view with posts
            return view('pages.zakat.laporan');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function create()
    {
        return view('pages.zakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayar' => 'required',
            'tanggal_pembayaran' => 'required',
            'jenis' => 'required',
            'jumlah_zakat' => 'required'
        ]);

        Zakat::create([
            'nama_pembayar' => $request->nama_pembayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jenis' => $request->jenis,
            'jumlah_zakat' => $request->jumlah_zakat,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('zakat.index')->with('success', 'Zakat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $zakat = Zakat::find($id);
        return view('pages.zakat.edit', compact('zakat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembayar' => 'required',
            'tanggal_pembayaran' => 'required',
            'jumlah_zakat' => 'required'
        ]);

        $zakat = Zakat::find($id);
        $zakat->nama_pembayar = $request->nama_pembayar;
        $zakat->tanggal_pembayaran = $request->tanggal_pembayaran;
        $zakat->jenis = $request->jenis;
        $zakat->jumlah_zakat = $request->jumlah_zakat;
        $zakat->keterangan = $request->keterangan;
        $zakat->save();

        return redirect()->route('pages.zakat.index')->with('success', 'Zakat berhasil diupdate.');
    }

    public function destroy($id)
    {
        $zakat = Zakat::find($id);
        $zakat->delete();

        return redirect()->route('pages.zakat.index')->with('success', 'Zakat berhasil dihapus.');
    }

    public function show($id)
    {
        $zakat = Zakat::find($id);

        if (!$zakat) {
            return abort(404);
        }

        return view('pages.zakat.show', compact('zakat'));
    }
}
