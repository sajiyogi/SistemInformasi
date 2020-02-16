@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Berita
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('admin.berita.store')}}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input id="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" value="{{ old('judul') }}" required autofocus>

                @if ($errors->has('judul'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                @endif
                
            </div>
            
            <div class="form-group">
             <label for="image">Foto</label>
               
                    <input id="image" type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}"  name="image" value="{{ old('image')}}" required>

                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                
             </div>

             <div class="form-group">
                <label for="artikel">Artikel</label>
                <textarea id="konten" name="artikel" type="text" class="form-control {{ $errors->has('artikel') ? ' is-invalid' : '' }} " name="artikel" value="{{old('artikel')}}" required> </textarea>
                @if($errors->has('artikel'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('artikel') }}</strong>
                   </span>
                @endif
                
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6  text-left">
                    <button type="submit" class="btn btn-primary">{{ __('add') }}
                    </button>
                                
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-danger">Back</a>
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