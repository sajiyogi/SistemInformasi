@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Add Majalah
    </div>

    <div class="card-body">
        <form action="{{ route("admin.majalah.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', isset($majalah) ? $majalah->judul : '') }}">
                @if($errors->has('judul'))
                    <p class="help-block">
                        {{ $errors->first('judul') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.judul_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('penyusun') ? 'has-error' : '' }}">
                <label for="penyusun">Penyusun</label>
                <input type="text" id="penyusun" name="penyusun" class="form-control" value="{{ old('penyusun', isset($majalah) ? $majalah->penyusun : '') }}">
                @if($errors->has('penyusun'))
                    <p class="help-block">
                        {{ $errors->first('penyusun') }}
                    </p>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group {{ $errors->has('kategori') ? 'has-error' : '' }}">
                <label for="kategori">Kategori</label>
                <select type="text" id="kategori" name="kategori" class="form-control" value="{{ old('kategori', isset($majalah) ? $majalah->kategori : '') }}">

                <option value="">--Pilih--</option>
                                <option>Berita</option>
                                <option>Ilmu Pengetahuan</option>
                </select>

                @if($errors->has('kategori'))
                    <p class="help-block">
                        {{ $errors->first('kategori') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.pengarang_helper') }}
                </p>
            </div>
            
            
            <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }} ">
             <label for="file">File</label>
               <input id="file" type="file" class="form-control" name="file" value="{{ old('file'), isset($majalah) ? $majalah->file : '' }}">

                    @if ($errors->has('file'))
                         <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                        <p class="helper-block">
                        </p>
                
             </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ __('add') }}">
            </div>
        </form>
    </div>
</div>

@endsection