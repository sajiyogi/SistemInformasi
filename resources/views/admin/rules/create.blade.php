@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Tata Tertib
    </div>

    <div class="card-body">
        <form action="{{ route('admin.rules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.rule.fields.description') }}</label>
                <textarea id="konten" name="description" class="form-control ">{{ strip_tags(old('description', isset($rule) ? $rule->description : '')) }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.rule.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('pengesah') ? 'has-error' : '' }}">
                <label for="pengesah">{{ trans('global.rule.fields.pengesah') }}*</label>
                <input type="text" id="pengesah" name="pengesah" class="form-control" value="{{ old('pengesah', isset($rule) ? $rule->pengesah : '') }}">
                @if($errors->has('pengesah'))
                    <p class="help-block">
                        {{ $errors->first('pengesah') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.rule.fields.pengesah_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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