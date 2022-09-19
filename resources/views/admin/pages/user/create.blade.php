@extends('admin.layout.app')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Tambah user</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah user</h6>
  </div>
  <div class="card-body">
    <form action="/admin/user" method="post">
      @csrf
      <div class="form-group">
        <label for="email">Email<span class="required-star">*</span></label>
        <input name="email" type="email" class="form-control" id="email" placeholder="email..." autofocus>
      </div>
      <div class="form-group">
        <label for="password">Password<span class="required-star">*</span></label>
        <input name="password" type="password" class="form-control" id="password" placeholder="password...">
      </div>
      <div class="form-group">
        <div class="d-flex justify-content-between">
          <label for="santri">Santri<span class="required-star">*</span></label>
        </div>
        <select name="santri_id" class="form-control @error('santri_id') is-invalid @enderror" id="santri">
          <option disabled selected>--santri--</option>
          @foreach ($santris as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      @role('admin')
      <div class="form-group">
        <div class="d-flex justify-content-between">
          <label for="role">Role<span class="required-star">*</span></label>
        </div>
        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="role">
          <option disabled selected>--role--</option>
          @foreach ($roles as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      @endrole
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
