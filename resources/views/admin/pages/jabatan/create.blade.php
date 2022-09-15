@extends('admin.layout.app')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Buat jabatan</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Buat jabatan</h6>
  </div>
  <div class="card-body">
    <form action="/admin/jabatan" method="post">
      @csrf
      <div class="form-group">
        <label for="jabatan">Nama jabatan<span class="required-star">*</span></label>
        <input name="name" type="jabatan" class="form-control" id="jabatan" placeholder="jabatan...">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection