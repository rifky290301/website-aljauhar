@extends('admin.layout.app')

@section('script-or-css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-2 d-flex justify-content-between">
  <h1 class="h3 text-gray-800">Tabel user</h1>
  <a href="/admin/user/tambah" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah user</span>
  </a>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel user</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($users as $item)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $item->email }}</td>
            <td class="d-flex">
              {{-- @include('admin.components.edit-button', ['url' => '/admin/user/' . $item->id]) --}}
              @include('admin.components.delete-button', ['url' => '/admin/user/' . $item->id])
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