@extends('admin.layout.app')

@section('title', 'Santri')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Data santri</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ $santri->name }}</h6>
  </div>
  <div class="card-body">
    <img src="{{ asset("upload/photo/$santri->photo") }}" style="width: 12rem;" class="img-thumbnail" alt="{{ $santri->photo }}"> <br>

    Nama : {{ $santri->name }} <br>
    Phone : {{ $santri->phone }} <br>
    No kamar : {{ $santri->room }} <br>
    Status : {{ $santri->status }} <br>
    Instansi : {{ $santri->institute }} <br>
    Alamat : {{ $santri->address }} <br>
    Tempat lahir : {{ $santri->birthplace }} <br>
    Tanggal lahir : {{ $santri->born }} <br>
    Tahun masuk : {{ $santri->year_of_entry }} <br>
    Tahun keluar : {{ $santri->year_out }} <br>
    Jabatan : {{ $santri->jabatan->name }} <br>
  </div>
</div>
@endsection
