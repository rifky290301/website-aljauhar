@extends('admin.layout.app')

@section('script-or-css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-2 d-flex justify-content-between">
  <h1 class="h3 text-gray-800">Tabel santri</h1>
  @unlessrole('santri')
  <a href="/admin/santri/tambah" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah santri</span>
  </a>
  @endunlessrole
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel santri</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Status</th>
            <th>Room</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Status</th>
            <th>Room</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($santris as $item)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td> 
              <img src="{{ asset("upload/photo/$item->photo") }}" style="width: 12rem;" class="img-thumbnail" alt="{{ $item->title }}">
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->room }}</td>
            <td class="d-flex">
              @unlessrole('santri')
              @include('admin.components.edit-button', ['url' => '/admin/santri/' . $item->id])
              @include('admin.components.delete-button', ['url' => '/admin/santri/' . $item->id])
              @endunlessrole
              @include('admin.components.read-button', ['url' => '/admin/santri/lihat/' . $item->id])
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endsection