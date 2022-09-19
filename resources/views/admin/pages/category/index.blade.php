@extends('admin.layout.app')

@section('script-or-css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-2 d-flex justify-content-between">
  <h1 class="h3 text-gray-800">Tabel kategori</h1>
  @unlessrole('santri')
  <a href="/admin/kategori/tambah" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah kategori</span>
  </a>
  @endunlessrole
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel kategori</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            @unlessrole('santri')
            <th>Action</th>
            @endunlessrole
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Name</th>
            @unlessrole('santri')
            <th>Action</th>
            @endunlessrole
          </tr>
        </tfoot>
        <tbody>
          @foreach ($categories as $item)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $item->name }}</td>
            @unlessrole('santri')
            <td class="d-flex">
              @include('admin.components.edit-button', ['url' => '/admin/kategori/' . $item->id])
              @include('admin.components.delete-button', ['url' => '/admin/kategori/' . $item->id])
            </td>
            @endunlessrole
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