@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Ebook
    </div>

    <div class="card-body">
        <form action="{{ route("admin.ebook.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', isset($ebook) ? $ebook->judul : '') }}">
                @if($errors->has('judul'))
                    <p class="help-block">
                        {{ $errors->first('judul') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.judul_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('penerbit') ? 'has-error' : '' }}">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" class="form-control" value="{{ old('penerbit', isset($ebook) ? $ebook->penerbit : '') }}">
                @if($errors->has('penerbit'))
                    <p class="help-block">
                        {{ $errors->first('penerbit') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.penerbit_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('pengarang') ? 'has-error' : '' }}">
                <label for="pengarang">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" class="form-control" value="{{ old('pengarang', isset($ebook) ? $ebook->pengarang : '') }}">
                @if($errors->has('pengarang'))
                    <p class="help-block">
                        {{ $errors->first('pengarang') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.pengarang_helper') }}
                </p>
            </div>
            
            
            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} ">
             <label for="file">File</label>
               <input id="file" type="file" class="form-control" name="file" value="{{ old('file'), isset($ebook) ? $ebook->file : '' }}">

                    @if ($errors->has('image'))
                         <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                        <p class="helper-block">
                            {{ trans('global.buku.fields.image_helper')}}
                        </p>
                
             </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ __('add') }}">
            </div>
        </form>
    </div>
</div>

@endsection