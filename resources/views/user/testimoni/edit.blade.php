@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Testimoni
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.testimoni.update' , $data['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <div class="col-md-6">
                    <input id="nama" type="text" name="nama" value="{{$data['nama']}}" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"  value="{{ old('nama') }}" required>

                    @if ($errors->has('nama'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                    @endif
                </div>
             </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="konten" name="deskripsi" value="{{$data['deskripsi']}}" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"   value="{{ old('deskripsi') }}" required>{{ $data->deskripsi }} </textarea>
                @if($errors->has('deskripsi'))
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 text-left">
                    <button type="submit" class="btn btn-primary">{{ __('edit') }}
                    </button>
                        <a href="{{ route('admin.testimoni.index') }}" class="btn btn-danger">Back</a>
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