@extends('admin.layout.app')

@section('title', 'Biografi')

@section('script-or-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.tiny.cloud/1/g556owebzva5ilvjh4vbddn8xnipvn7mrc9hcbib1vglssoi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit kategori</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit kategori</h6>
  </div>
  <div class="card-body">
    <form action="/admin/biografi/{{ $biography->id }}" method="post" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="name">Nama<span class="required-star">*</span></label>
        <input value="{{ $biography->name }}" name="name" type="text" class="@error('name') is-invalid @enderror form-control" id="name" placeholder="nama..." autofocus>
      </div>
      <div class="form-group">
        <label for="photo">Gambar<span class="required-star">*</span></label>
        <div class="custom-file">
          <input name="photo" type="file" class="@error('photo') is-invalid @enderror custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" onChange="mainThamUrl(this)">
          <label class="custom-file-label" for="photo">Choose file</label>
        </div>
        <img class="mt-3" src="{{ asset("upload/biography/$biography->photo") }}" id="mainThmb">
      </div>
      <div class="form-group">
        <label for="biography">Biografi<span class="required-star">*</span></label>
        <textarea name="biography" id="biography" rows="3">{{ $biography->biography }}</textarea>
      </div>
      <div class="form-group">
        <label for="position">Jabatan<span class="required-star">*</span></label>
        <input value="{{ $biography->position }}" name="position" type="text" class="form-control @error('position') is-invalid @enderror form-control" id="position" placeholder="jabatan..." autofocus>
      </div>
      <div class="form-group">
        <label for="status">Status<span class="required-star">*</span></label>
        <select name="publish" class="@error('publish') is-invalid @enderror form-control" id="status">
          <option value="1" @if($biography->status == '1') selected @endif>PUBLISHED</option>
          <option value="0" @if($biography->status == '0') selected @endif>UNPUBLISHED</option>
        </select>
      </div>
      <button type="submut" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

tinymce.init({
  selector: 'textarea#biography',
});

$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection