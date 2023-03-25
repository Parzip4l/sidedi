@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
  </ol>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Warga Margalaksana 09</h6>
        <a class="btn btn-primary mb-3" href="{{ route('wargas.create') }}" role="button">Tambah Data</a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>No KTP</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>RW</th>
                <th>RT</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status Perkawinan</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($wargas as $data)
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $data->nik}}</td>
                <td>{{ $data->nama}}</td>
                <td>{{ $data->jk}}</td>
                <td>{{ $data->rw}}</td>
                <td>{{ $data->rt}}</td>
                <td>{{ $data->tempatlahir}}</td>
                <td>{{ $data->tanggallahir}}</td>
                <td>{{ $data->statusperkawinan}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush