@extends('admin.layout.app')

@section('script-or-css')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-2 d-flex justify-content-between">
  <h1 class="h3 text-gray-800">Tabel testimoni</h1>
  <a href="/admin/testimoni/tambah" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah testimoni</span>
  </a>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel testimoni</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Publish</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Publish</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($testimonials as $item)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>
              <img src="{{ asset("upload/testimonial/$item->photo") }}" style="width: 12rem;" class="img-thumbnail" alt="{{ $item->name }}">
            </td>
            <td>{{ $item->name }}</td>
            @if ($item->publish == 1)
            <td><span class="badge badge-success">Publish</span></td>
            @else
            <td><span class="badge badge-danger">Unpublish</span></td>
            @endif
            <td class="d-flex">
              @include('admin.components.edit-button', ['url' => '/admin/testimoni/' . $item->id])
              @include('admin.components.delete-button', ['url' => '/admin/testimoni/' . $item->id])
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