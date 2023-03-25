<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WargadashboardController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            if($user->level == '2'){
                $pengumumans = DB::table('pengumuman')->limit(5)->get();
                $beritas = DB::table('beritas')->limit(5)->get();
                date_default_timezone_set('Asia/Jakarta'); // Set timezone sesuai dengan lokasi Anda
                $hour = date('H'); // Ambil jam saat ini

                if ($hour >= 17) {
                    $greeting = 'Good Evening';
                    $image = 'evening.svg';
                    $icon = 'night.svg'; // Jika jam lebih dari atau sama dengan 18, pesan diubah menjadi "Good evening"
                } else {
                    $greeting = 'Good Day';
                    $image = 'bgwarga.svg';
                    $icon = 'day.svg'; // Jika jam kurang dari 18, pesan tetap "Good day"
                }

            //render view with posts
            return view('clients.index', compact('pengumumans','beritas','greeting','image','icon'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }
}
