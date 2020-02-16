@extends('layouts.admin')
@section('content')
<script src="{{asset ('js/jquery.js') }}"></script>
<script src="{{asset ('ckeditor/ckeditor.js') }}"></script>
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.barang.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('global.barang.fields.nama') }}*</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($barang) ? $barang->nama : '') }}">
                @if($errors->has('nama'))
                    <p class="help-block">
                        {{ $errors->first('nama') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.barang.fields.nama_helper') }}
                </p>
            </div>
            <div id="notif" class="form-group {{ $errors->has('kategori') ? 'has-error' : '' }}">
                <label for="kategori">{{ trans('global.barang.fields.kategori') }}*</label>
                <select id="kategori_id" name="kategori" class="form-control" >
                @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->nama }}" selected> {{ $kategori->nama }} </option>
                @endforeach        
                </select>
                
            </div>
            <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
                <label for="jenis">{{ trans('global.barang.fields.jenis') }}*</label>
                <select id="jenis" name="jenis" class="form-control" >
                @foreach($jenis as $jen)
                        <option value="{{ $jen->nama }}" selected> {{ $jen->nama }} </option>
                @endforeach        
                </select>
                
            </div>
            <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                <label for="deskripsi">{{ trans('global.barang.fields.deskripsi') }}</label>
                <textarea id="konten" name="deskripsi" class="form-control ">{{ strip_tags(old('deskripsi', isset($barang) ? $barang->deskripsi : '')) }}</textarea>
                @if($errors->has('deskripsi'))
                    <p class="help-block">
                        {{ $errors->first('deskripsi') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.barang.fields.deskripsi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('stok') ? 'has-error' : '' }}">
                <label for="stok">{{ trans('global.barang.fields.stok') }}*</label>
                <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok', isset($barang) ? $barang->stok : '') }}">
                @if($errors->has('stok'))
                    <p class="help-block">
                        {{ $errors->first('stok') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.barang.fields.stok_helper') }}
                </p>
            </div>
            
            
            
            
            <div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }} ">
             <label for="foto">{{ trans('global.barang.fields.foto') }}*</label>
               <input id="foto" type="file" class="form-control" name="foto" value="{{ old('foto'), isset($barang) ? $barang->foto : '' }}">
               <br>
               <img src="" id="profile-img" width="200px" />

                    @if ($errors->has('foto'))
                         <p class="help-block">
                            {{ $errors->first('foto') }}
                        </p>
                    @endif
                        <p class="helper-block">
                            {{ trans('global.barang.fields.foto_helper')}}
                        </p>
                        <script type="text/javascript">
                         function readURL(input) {
                     if (input.files && input.files[0]) {
                         var reader = new FileReader();
            
                     reader.onload = function (e) {
                        $('#profile-img').attr('src', e.target.result);
                             }
                        reader.readAsDataURL(input.files[0]);
                            }
                        }
                         $("#foto").change(function(){
                        readURL(this);
                         });
                    </script>
                                        <script>
                      var konten = document.getElementById("konten");
                        CKEDITOR.replace(konten,{
                        language:'en-gb'
                      });
                      CKEDITOR.config.allowedContent = true;
                    </script>
                
             </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ __('add') }}">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js">
    var timeout = setInterval(reloadChat, 5000);    
function reloadChat () {

     $('#notif').load('admin.kategori.create');
</script>

@endsection