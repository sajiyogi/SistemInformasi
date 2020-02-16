@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Testimoni
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('admin.testimoni.store')}}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                @if ($errors->has('nama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
                
            </div>


            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="konten" name="deskripsi" type="text" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }} " name="deskripsi" value="{{old('deskripsi')}}" required> </textarea>
                @if($errors->has('deskripsi'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('deskripsi') }}</strong>
                   </span>
                @endif
                
            </div>

            
            <div class="form-group row mb-0">
                <div class="col-md-6  text-left">
                    <button type="submit" class="btn btn-primary">{{ __('add') }}
                    </button>
                                
                        <a href="{{ route('admin.testimoni.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>  
@endsection