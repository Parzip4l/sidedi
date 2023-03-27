@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<section class="bgwrap" style="background-image: url('{{ asset('assets/images/'. $image) }}'); background-size:contain;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <div>
                        <img class="wd-70 rounded-circle profile" src="{{ asset('assets/images/profile.png') }}" alt="profile">
                    </div>
                    <div class="text-nama">
                        <p class="text-white">Hai, {{ $greeting }} <img src="{{ asset('assets/icons/'. $icon) }}" alt=""></p>
                        <span class="h30 text-white">{{ Auth::user()->nama }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="profile-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="card-title mb-0">Layanan Publik</h6>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur.svg') }}" alt="">
                                </div>
                            </a>
                            <p>catatan administrasi</p>
                        </div>
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_2.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Layanan Pajak</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/pengaduanwarga') }}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_3.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Layanan Pengaduan</p>
                        </div>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_4.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Surat Pengantar</p>
                        </div>
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_8.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Catatan Kelahiran</p>
                        </div>
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_7.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Catatan Kematian</p>
                        </div>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_6.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Pemilihan Online</p>
                        </div>
                        <div class="warga-menu">
                            <a href="">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/service-11.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Berita Online</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/laporanzakatwarga') }}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/service-10.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Laporan Zakat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="pengumuman-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="card-title mb-0">Pengumuman</h6>
                    </div>
                    <div class="list-pengumuman-wrap">
                    @foreach ($pengumumans as $data)
                        <div class="pengumuman-item d-flex justify-content-between py-2">
                            <h6 class="title-pengumuman">{{ $data->judul}}</h6>
                            <a href="{{ route('pengumuman.download', $data->id) }}">Download File</a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="news-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="card-title mb-0">Berita Terbaru</h6>
                    </div>
                    <div class="list-berita-wrap">
                        <div class="berita-item justify-content-between py-2">
                        @foreach ($beritas as $data)
                            <div class="berita-konten-wrap">
                                <div class="featured-image">
                                    <img src="{{ asset('images/' .$data->gambar) }}" alt="">
                                </div>
                                <div class="body-berita justify-content-between py-2">
                                <div class="category-berita">
                                        Umum
                                    </div>
                                    <h6 class="title-pengumuman"><a href="{{ route('berita.show', $data->id) }}">{{ $data->judul }}</a></h6>
                                </div>
                                <div class="desc-berita">
                                    <p>{{$data->konten}}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection