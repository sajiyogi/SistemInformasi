@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Gallery
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('admin.gallery.store')}}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="kategori">Keterangan</label>
                <input id="keterangan" type="text" class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" value="{{ old('keterangan') }}" required autofocus>

                @if ($errors->has('keterangan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('keterangan') }}</strong>
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
            <div class="form-group row mb-0">
                <div class="col-md-6  text-left">
                    <button type="submit" class="btn btn-primary">{{ __('add') }}
                    </button>
                                
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection