@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Struktur
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.ebook.update' , $ebook['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul</label>
                <div class="col-md-6">
                    <input id="judul" type="text" name="judul" value="{{$ebook['judul']}}" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}"  value="{{ old('judul') }}" required autofocus>

                    @if ($errors->has('judul'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <div class="col-md-6">
                    <input id="pengarang" type="text" name="pengarang" value="{{$ebook['pengarang']}}" class="form-control{{ $errors->has('pengarang') ? ' is-invalid' : '' }}"  value="{{ old('pengarang') }}" required autofocus>

                    @if ($errors->has('pengarang'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pengarang') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <div class="col-md-6">
                    <input id="penerbit" type="text" name="penerbit" value="{{$ebook['penerbit']}}" class="form-control{{ $errors->has('penerbit') ? ' is-invalid' : '' }}"  value="{{ old('penerbit') }}" required autofocus>

                    @if ($errors->has('penerbit'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('penerbit') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
             <div class="form-group">
                <label for="file">File</label>
                <div class="col-md-6">
                    <input type="file" name="file" />
                    <input type="hidden" name="hidden_file" value="{{ $ebook->file }}" />
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
                        <a href="{{ route('admin.struktur.index') }}" class="btn btn-danger">Back</a>
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