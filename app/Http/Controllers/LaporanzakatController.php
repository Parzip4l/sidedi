<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\Zakat;
use App\Mustahiq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use PDF;
use Spatie\Browsershot\Browsershot;

class LaporanzakatController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
            $jumlah_data = Zakat::count();
            $mustahiq_total = Mustahiq::count();
            $beras = Zakat::where('jenis', 'beras')->count();
            $uang = Zakat::where('jenis', 'uang')->count();
            $fakir = Mustahiq::where('jenis', 'Fakir')->count();
            $miskin = Mustahiq::where('jenis', 'Miskin')->count();
            $riqab = Mustahiq::where('jenis', 'Riqab')->count();
            $gharim = Mustahiq::where('jenis', 'Gharim')->count();
            $mualaf = Mustahiq::where('jenis', 'Mualaf')->count();
            $fisabil = Mustahiq::where('jenis', 'Fisabilillah')->count();
            $ibnu = Mustahiq::where('jenis', 'Ibnu Sabil')->count();
            $amil = Mustahiq::where('jenis', 'Amil Zakat')->count();
            $totaluang = $uang * 30000;
            $totalberas = $beras * 2.5;
            //render view with posts
            return view('pages.zakat.laporan', compact('jumlah_data','beras','uang','totalberas','totaluang','fakir','miskin','riqab','gharim','mualaf', 'fisabil', 'ibnu', 'amil', 'mustahiq_total'));
            }else{
                return view('pages.auth.login')->intended('login');
            }
        }
    }

    public function generatePDF()
    {
        $url = 'https://adminsidedi.rinablecreative.com/laporanzakat';

        $pdf = Browsershot::url($url)
                    ->pdf();

        return response($pdf)
                ->header('Content-Type', 'application/pdf');
    }

    public function indexwarga()
    {
        if($user = Auth::user()){
            if($user->level == '2'){
            $jumlah_data = Zakat::count();
            $mustahiq_total = Mustahiq::count();
            $beras = Zakat::where('jenis', 'beras')->count();
            $uang = Zakat::where('jenis', 'uang')->count();
            $fakir = Mustahiq::where('jenis', 'Fakir')->count();
            $miskin = Mustahiq::where('jenis', 'Miskin')->count();
            $riqab = Mustahiq::where('jenis', 'Riqab')->count();
            $gharim = Mustahiq::where('jenis', 'Gharim')->count();
            $mualaf = Mustahiq::where('jenis', 'Mualaf')->count();
            $fisabil = Mustahiq::where('jenis', 'Fisabilillah')->count();
            $ibnu = Mustahiq::where('jenis', 'Ibnu Sabil')->count();
            $amil = Mustahiq::where('jenis', 'Amil Zakat')->count();
            $totaluang = $uang * 30000;
            $totalberas = $beras * 2.5;
            //render view with posts
            return view('pages.zakat.clients', compact('jumlah_data','beras','uang','totalberas','totaluang','fakir','miskin','riqab','gharim','mualaf', 'fisabil', 'ibnu', 'amil', 'mustahiq_total'));
            }else{
                return view('pages.auth.login')->intended('login');
            }
        }
    }
}
