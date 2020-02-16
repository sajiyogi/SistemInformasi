@extends('layouts.admin')
@section('content')
<script src="{{asset ('js/jquery.js') }}"></script>
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.berita.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.berita.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
                <label for="judul">{{ trans('global.berita.fields.judul') }}*</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', isset($data) ? $data->judul : '') }}">
                @if($errors->has('judul'))
                    <p class="help-block">
                        {{ $errors->first('judul') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.berita.fields.judul_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('artikel') ? 'has-error' : '' }}">
                <label for="artikel">{{ trans('global.berita.fields.artikel') }}</label>
                <textarea id="konten" name="artikel" class="form-control ">{{ old('artikel', isset($data) ? $data->artikel : '') }}</textarea>
                @if($errors->has('artikel'))
                    <p class="help-block">
                        {{ $errors->first('artikel') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.berita.fields.artikel_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} ">
             <label for="image">{{ trans('global.berita.fields.image') }}*</label>
               <input id="image" type="file" class="form-control" name="image" value="{{ old('image'), isset($data) ? $data->image : '' }}">
               <br>
                <img src="{{asset('uploaddata/'.$data->image)}}" id="profile-img" width="200px" />

                    @if ($errors->has('image'))
                         <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                        <p class="helper-block">
                            {{ trans('global.berita.fields.image_helper')}}
                        </p>
                        <script type="text/javascript">
                        $(document).ready(function(){
                            $("#image").click(function(){
                                $('#profile-img').attr('src',"");

                                });
                                });
                         function readURL(input) {
                     if (input.files && input.files[0]) {
                         var reader = new FileReader();
            
                     reader.onload = function (e) {
                        $('#profile-img').attr('src', e.target.result);
                             }
                        reader.readAsDataURL(input.files[0]);
                            }
                        }
                         $("#image").change(function(){
                        readURL(this);
                         });
                    </script>
                
             </div>
            
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.edit') }}"> 
                <a href="{{ route('admin.home') }}" class="btn btn-danger">Back</a>
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
