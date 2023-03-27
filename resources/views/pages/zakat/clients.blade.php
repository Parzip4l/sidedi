@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
<?php 
    $rupiah = $totaluang;
    $formatted_rupiah = "Rp " . number_format($rupiah, 0, ",", ".");

?>
@endpush 
@section('content') 
<div class="notifikasi-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
        <div class="card">
      <div class="card-body">
        <div class="container-fluid d-block justify-content-between">
          <div class="col-lg-3 ps-0">
            <a href="#" class="noble-ui-logo d-block mt-3">SI<span>DEDI</span></a>
            <p>Dusun Margalaksana RW 09<br> Desa Hegarmanah, Kecamatan Jatinangor</p>
          </div>
          <div class="col-lg-3 pe-0">
            <h4 class="fw-bold mt-4 mb-2">Laporan Zakat Fitrah<br> Ramadan 1444H</h4>
          </div>
        </div>
        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
          <div class="table-responsive w-100">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Jenis Zakat Yang Dibayarkan</th>
                      <th class="text-end">Jumlah Muzzaki</th>
                      <th class="text-end">Jumlah per Pembayaran</th>
                      <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                
                  <tr class="text-end">
                    <td class="text-start">1</td>
                    <td class="text-start">Beras</td>
                    <td id="jumlahberas1">{{ $beras }}</td>
                    <td id="jumlahberas2">2.5 Kg</td>
                    <td id="totalberas">{{ $totalberas }} Kg</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">2</td>
                    <td class="text-start">Uang Tunai</td>
                    <td>{{ $uang }}</td>
                    <td>Rp. 30.000</td>
                    <td>{{ $formatted_rupiah }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-6 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                        <tr class="bg-light">
                          <td class="text-bold-800">Total Muzzaki</td>
                          <td class="text-bold-800 text-end">{{$jumlah_data}} Jiwa</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>

        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
          <div class="table-responsive w-100">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Jenis Mustahiq</th>
                      <th class="text-end">Jumlah Mustahiq</th>
                      <th class="text-end">Jumlah per Penerima</th>
                      <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                  <tr class="text-end">
                    <td class="text-start">1</td>
                    <td class="text-start">Fakir</td>
                    <td>{{$fakir}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">2</td>
                    <td class="text-start">Miskin</td>
                    <td>{{$miskin}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">3</td>
                    <td class="text-start">Riqab</td>
                    <td>{{$riqab}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">4</td>
                    <td class="text-start">Gharim</td>
                    <td>{{$gharim}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">5</td>
                    <td class="text-start">Mualaf</td>
                    <td>{{$mualaf}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">6</td>
                    <td class="text-start">Fisabilillah</td>
                    <td>{{$fisabil}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">7</td>
                    <td class="text-start">Ibnu Sabil</td>
                    <td>{{$ibnu}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">8</td>
                    <td class="text-start">Amil Zakat</td>
                    <td>{{$amil}}</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-6 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                        <tr class="bg-light">
                          <td class="text-bold-800">Total Mustahiq</td>
                          <td class="text-bold-800 text-end">{{$mustahiq_total}} Jiwa</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid w-100">
          <!-- <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a> -->
        </div>
      </div>
    </div>
        </div>
    </div>
</div> 
@endsection