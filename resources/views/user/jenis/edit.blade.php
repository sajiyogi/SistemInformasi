@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Jenis Barang
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.jenis.update' , $jenis['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            

            <div class="form-group">
                <label for="nama">Nama jenis</label>
                <div class="col-md-6">
                    <input id="jenis" type="text" name="nama" value="{{ $jenis['nama'] }}" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}"  value="{{ old('jenis') }}" required>

                    @if ($errors->has('jenis'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jenis') }}</strong>
                    </span>
                    @endif
                </div>
             </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 text-left">
                    <button type="submit" class="btn btn-primary">{{ __('edit') }}
                    </button>
                        <a href="{{ route('admin.jenis.index') }}" class="btn btn-danger">Back</a>
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