@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Struktur Organisasi
    </div>

    <div class="card-body">
        <form action="{{ route("admin.struktur.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($struktur) ? $strukturs->nama : '') }}">
                @if($errors->has('nama'))
                    <p class="help-block">
                        {{ $errors->first('nama') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.judul_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}">
                <label for="penerbit">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-control" value="{{ old('jabatan', isset($struktur) ? $strukturs->jabatan : '') }}">
                @if($errors->has('jabatan'))
                    <p class="help-block">
                        {{ $errors->first('jabatan') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.buku.fields.penerbit_helper') }}
                </p>
            </div>
            
            
            <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }} ">
             <label for="file">Gambar</label>
               <input id="file" type="file" class="form-control" name="file" value="{{ old('file'), isset($struktur) ? $strukturs->file : '' }}">

                    @if ($errors->has('file'))
                         <p class="help-block">
                            {{ $errors->first('file') }}
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
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.struktur.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('struktur_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection