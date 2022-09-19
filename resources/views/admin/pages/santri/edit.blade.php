@extends('admin.layout.app')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Buat data santri</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Buat data santri</h6>
  </div>
  <div class="card-body">
    <form action="/admin/santri/{{ $santri->id }}" method="post" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="name">Nama<span class="required-star">*</span></label>
        <input name="name" value="{{ $santri->name }}" type="text" class="@error('name') is-invalid @enderror form-control" id="name" placeholder="nama..." autofocus>
      </div>
      <div class="form-group">
        <label for="phone">Nomor hp<span class="required-star">*</span></label>
        <input name="phone" value="{{ $santri->phone}}" type="text" class="@error('phone') is-invalid @enderror form-control" id="phone" placeholder="nomor hp...">
      </div>
      <div class="form-group">
        <label for="room">Nomor kamar<span class="required-star">*</span></label>
        <input name="room" value="{{ $santri->room }}" type="number" class="@error('room') is-invalid @enderror form-control" id="room" placeholder="nomor kamar...">
      </div>
      <div class="form-group">
        <label for="status">Status<span class="required-star">*</span></label>
        <select name="status" class="form-control @error('status') is-invalid @enderror" id="category">
          <option disabled selected>--status--</option>
          <option value="aktif">aktif</option>
          <option value="alumni">alumni</option>
          <option value="tidak_jelas">tidak jelas</option>
        </select>
      </div>
      <div class="form-group">
        <label for="institute">Instantsi<span class="required-star">*</span></label>
        <input name="institute" value="{{ $santri->institute }}" type="text" class="@error('institute') is-invalid @enderror form-control" id="institute" placeholder="instansi...">
      </div>
      <div class="form-group">
        <label for="address">Alamat<span class="required-star">*</span></label>
        <input name="address" value="{{ $santri->address }}" type="text" class="@error('address') is-invalid @enderror form-control" id="address" placeholder="alamat...">
      </div>
      <div class="form-group">
        <label for="birthplace">Tempat lahir<span class="required-star">*</span></label>
        <input name="birthplace" value="{{ $santri->birthplace }}" type="text" class="@error('birthplace') is-invalid @enderror form-control" id="birthplace" placeholder="tempat lahir...">
      </div>
      <div class="form-group">
        <label for="born">Tanggal lahir<span class="required-star">*</span></label>
        <input name="born" value="{{ $santri->born }}" type="date" class="@error('born') is-invalid @enderror form-control" id="born" placeholder="tanggal lahir...">
      </div>
      <div class="form-group">
        <label for="year_of_entry">Tanggal masuk<span class="required-star">*</span></label>
        <input name="year_of_entry" value="{{ $santri->year_of_entry }}" type="date" class="@error('year_of_entry') is-invalid @enderror form-control" id="year_of_entry" placeholder="tanggal masuk...">
      </div>
      <div class="form-group">
        <label for="year_out">Tahun keluar</label>
        <input name="year_out" value="{{ $santri->year_out }}" type="date" class="@error('year_out') is-invalid @enderror form-control" id="year_out" placeholder="tanggal keluar...">
      </div>
      <div class="form-group">
        <label for="photo">Foto</label>
        <div class="custom-file">
          <input name="image" type="file" class="@error('image') is-invalid @enderror custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" onChange="mainThamUrl(this)">
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
        <img class="mt-3" src="/upload/photo/{{ $santri->photo }}" id="mainThmb">
      </div>
      <div class="form-group">
        <div class="d-flex justify-content-between">
          <label for="category">Jabatan</label>
        </div>
        <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" id="category">
          <option value="" selected disabled>--jabatan--</option>
          @foreach ($jabatans as $item)
          <option value="{{ $item->id }}" {{ $item->id == $santri->jabatan_id ? 'selected' : '' }}>{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection

@section('script')
<script>
function mainThamUrl(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e){
      $('#mainThmb').attr('src', e.target.result).width(100).height(100);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection