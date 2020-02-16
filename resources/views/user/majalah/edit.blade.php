@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Majalah
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.majalah.update' , $majalah['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul</label>
                <div class="col-md-6">
                    <input id="judul" type="text" name="judul" value="{{$majalah['judul']}}" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}"  value="{{ old('judul') }}" required autofocus>

                    @if ($errors->has('judul'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
            <div class="form-group">
                <label for="penyusun">Penyusun</label>
                <div class="col-md-6">
                    <input id="penyusun" type="text" name="penyusun" value="{{$majalah['penyusun']}}" class="form-control{{ $errors->has('penyusun') ? ' is-invalid' : '' }}"  value="{{ old('penyusun') }}" required autofocus>

                    @if ($errors->has('penyusun'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('penyusun') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <div class="col-md-6">
                    <select id="kategori" type="text" name="kategori" value="{{$majalah['kategori']}}" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}"  value="{{ old('kategori') }}" required autofocus>

                    <option @if($majalah['kategori'] == 'Berita') selected @endif>Berita</option>

                                <option @if($majalah['kategori'] == 'Ilmu Pengtahuan') selected @endif>Ilmu Pengtahuan</option>
                    </select>

                    @if ($errors->has('kategori'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('kategori') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
             <div class="form-group">
                <label for="file">File</label>
                <div class="col-md-6">
                    <input type="file" name="file" />
                    <input type="hidden" name="hidden_file" value="{{ $majalah->file }}" />
                    @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary"><!-- {{ __('edit') }} -->Edit
                    </button>
                        <a href="{{ route('admin.home') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>