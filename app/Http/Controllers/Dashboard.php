<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Warga;
use App\User;

class Dashboard extends Controller
{
    public function index(){
        $jumlah_data = User::count();
        $laki = User::where('jk', 'LAKI-LAKI')->count();
        $perempuan = User::where('jk', 'PEREMPUAN')->count();
        return view('dashboard', compact('jumlah_data','laki','perempuan'));
    }
}
