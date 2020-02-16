@extends('layouts.admin')

@section('content')


    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route('admin.berita.create')}}"> Tambah Berita
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">Data Berita</div>

    <!-- session pesan -->
    @if(session('pesan'))
                <div class="alert alert-info">
                    <b>Success ! </b> : {{session('pesan')}}
                </div>
                @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Artikel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $berita)
                        <tr data-entry-id="{{ $berita->id }}">
                            <td>

                            </td>
                            <td>
                               <img src="{{URL::to('/')}}/uploadberita/{{ $berita->image}}" class="img-thumbnail" width="75" />
                            </td>
                            <td >{{ $berita->judul }}</td>

                            </td>
                            <td class="text-justify">                            
                            <?php  
                              $ringkas="$berita->artikel ";
                              echo substr($ringkas,0,250)."..."; ?></td>

                            <td>
                                @can('berita_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.berita.show', $berita->id) }}">{{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('berita_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.berita.edit', $berita->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('berita_delete')
                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    
                                    </form>
                                  @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<!-- @section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {text: deleteButtonTrans,url: "{{ route('admin.berita.massDestroy') }}",className: 'btn-danger', action: function (e, dt, node, config) {
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
@can('berita_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection -->