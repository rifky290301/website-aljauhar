@extends('admin.layout.app')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit testimonial</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit testimonial</h6>
  </div>
  <div class="card-body">
    <form action="/admin/testimoni/{{ $testimonial->id }}" method="post" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="name">Nama<span class="required-star">*</span></label>
        <input value="{{ $testimonial->name }}" name="name" type="text" class="@error('name') is-invalid @enderror form-control" id="name" placeholder="nama..." autofocus>
      </div>
      <div class="form-group">
        <label for="job">Pekerjaan<span class="required-star">*</span></label>
        <input value="{{ $testimonial->job }}" name="job" type="text" class="@error('job') is-invalid @enderror form-control" id="job" placeholder="pekerjaan...">
      </div>
      <div class="form-group">
        <label for="description">Deskripsi<span class="required-star">*</span></label>
        <textarea name="description" class="form-control" id="description" rows="3">{{ $testimonial->description }}</textarea>
      </div>
      <div class="form-group">
        <label for="photo">Foto<span class="required-star">*</span></label>
        <div class="custom-file">
          <input name="photo" type="file" class="@error('photo') is-invalid @enderror custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" onChange="mainThamUrl(this)">
          <label class="custom-file-label" for="photo">Choose file</label>
        </div>
        <img class="mt-3" src="{{ asset("upload/testimonial/$testimonial->photo") }}" id="mainThmb">
      </div>
      <div class="form-group">
        <label for="status">Status<span class="required-star">*</span></label>
        <select name="publish" class="@error('publish') is-invalid @enderror form-control" id="status">
          <option value="" selected disabled>--status--</option>
          <option value="1">PUBLISHED</option>
          <option value="0">DRAFT</option>
        </select>
      </div>
      <button type="submut" class="btn btn-primary">Simpan</button>
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