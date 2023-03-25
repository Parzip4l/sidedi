<?php

namespace App\Http\Controllers;

use App\User;
use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $beritas = Berita::all();

            //render view with posts
            return view('pages.berita.index', compact('beritas'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function create()
    {
        return view('pages.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);
        
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->konten = $request->input('konten');
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
            $berita->gambar = $filename;
        }
        
        $berita->save();
        
        return redirect()->route('berita.index')
            ->with('success','Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita.single', compact('berita'));
    }
}
