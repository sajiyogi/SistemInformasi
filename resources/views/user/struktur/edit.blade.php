@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Struktur
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.struktur.update' , $struktur['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <div class="col-md-6">
                    <input id="nama" type="text" name="nama" value="{{$struktur['nama']}}" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"  value="{{ old('nama') }}" required autofocus>

                    @if ($errors->has('nama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <div class="col-md-6">
                    <input id="jabatan" type="text" name="jabatan" value="{{$struktur['jabatan']}}" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}"  value="{{ old('jabatan') }}" required autofocus>

                    @if ($errors->has('jabatan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jabatan') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
             <div class="form-group">
                <label for="file">Foto</label>
                <div class="col-md-6">
                    <input type="file" name="file" />
                    <img src="{{ URL::to('/') }}/asset/uploadcover/{{ $struktur->file }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{ $struktur->file }}" />
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