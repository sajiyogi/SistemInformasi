@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Data Jenis Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('admin.jenis.store')}}" enctype="multipart/form-data">
            @csrf
            
            


            <div class="form-group">
                <label for="nama">Jenis</label>
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required>

                @if ($errors->has('jenis'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jenis') }}</strong>
                    </span>
                @endif
                
            </div>

            
            <div class="form-group row mb-0">
                <div class="col-md-6  text-left">
                    <button type="submit" class="btn btn-primary">{{ __('add') }}
                    </button>
                                
                        <a href="{{ route('admin.jenis.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection