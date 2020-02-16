@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Kategori Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.kategori.update' , $kategori['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <div class="col-md-6">
                    <input id="kategori" type="text" name="nama" value="{{ $kategori['nama'] }}" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}"  value="{{ old('kategori') }}" required>

                    @if ($errors->has('kategori'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('kategori') }}</strong>
                    </span>
                    @endif
                </div>
             </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 text-left">
                    <button type="submit" class="btn btn-primary">{{ __('edit') }}
                    </button>
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-danger">Back</a>
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