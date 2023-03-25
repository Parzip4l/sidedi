<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $wargas = User::all();

            //render view with posts
            return view('wargas.index', compact('wargas'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
        
    }

    public function create()
    {
        if($user = Auth::user()){
            if($user->level == '1'){

            //render view with posts
            return view('wargas.create');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try{

        
        //validate form
        $this->validate($request, [
            'nik'     => 'required|unique:wargas',
            'nokk'     => 'required|max:16'
        ]);

        //create post
        User::create([
            'nik'     => $request->nik,
            'nokk'   => $request->nokk,
            'rt'     => $request->rt,
            'rw'   => $request->rw,
            'nama'     => $request->nama,
            'jk'   => $request->jk,
            'agama'     => $request->agama,
            'pendidikan'   => $request->pendidikan,
            'pekerjaan'     => $request->pekerjaan,
            'tanggallahir'   => $request->tanggallahir,
            'tempatlahir'     => $request->tempatlahir,
            'statusperkawinan'   => $request->statusperkawinan,
            'email'     => $request->email,
            'level'     => $request->level,
            'password' => Hash::make($request->password)
        ]);

        //redirect to index
        return redirect()->route('wargas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }catch (ValidationException $exception) {
            $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
            redirect()->route('wargas.index')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
        }
    }   

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $warga = Warga::where('email', $request->email)->first();

        // if (!$warga || !Auth::check($request->password, $warga->password)) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Login Failed!',
        //     ]);
        // }

        return response()->json([
            'success' => true,
            'message' => 'Login Success!',
            'data'    => $warga,
            'token'   => $warga->createToken('authToken')->accessToken    
        ]);
    }
    
    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();

        if($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Success!',  
            ]);
        }
    }
}