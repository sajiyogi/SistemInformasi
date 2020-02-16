@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Data Kategori Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('admin.kategori.store')}}" enctype="multipart/form-data">
            @csrf           
            <div class="form-group">
                <label for="nama">Kategori</label>
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required>

                @if ($errors->has('nama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
                
            </div>

            
            <div class="form-group row mb-0">
                <div class="col-md-6  text-left">
                    <button type="submit" class="btn btn-primary">{{ __('add') }}
                    </button>
                                
                        <a href="{{ route('admin.kategori.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection