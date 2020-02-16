@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Gallery
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.gallery.update' , $data['id']) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <div class="col-md-6">
                    <input id="keterangan" type="text" name="keterangan" value="{{$data['keterangan']}}" class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}"  value="{{ old('keterangan') }}" required autofocus>

                    @if ($errors->has('keterangan'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                    @endif
                </div>
             </div>
             <div class="form-group">
                <label for="image">Foto</label>
                <div class="col-md-6">
                    <input type="file" name="image" />
                    <img src="{{ URL::to('/') }}/uploadgallery/{{ $data->image }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{ $data['image'] }}"/>
                    @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            
            <div class="form-group row mb-0">
                <div class="col-md-6 text-left">
                    <button type="submit" class="btn btn-primary">{{ __('edit') }}
                    </button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
