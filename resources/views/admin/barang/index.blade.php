@extends('layouts.admin')
@section('content')
@can('barang_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.barang.create') }}"> {{ trans('global.add') }} {{ trans('global.barang.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.barang.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div id="notif" class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        
                         
                        <th>
                            {{ trans('global.barang.fields.nama') }}
                        </th>
                         <th>
                            {{ trans('global.barang.fields.kategori') }}
                        </th>
                        <th>
                            {{ trans('global.barang.fields.jenis') }}
                        </th>
                         <th>
                            {{ trans('global.barang.fields.deskripsi') }}
                        </th>
                        <th>
                            {{ trans('global.barang.fields.stok') }}
                        </th>
                        <th>
                            {{ trans('global.barang.fields.foto') }}
                        </th>
                        <th>
                            Action                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $b)
                        <tr data-entry-id="{{ $b->id }}">
                            <td>

                               
                            </td>
                            <td>
                                {{$b->nama ?? '' }}
                            </td>
                            <td>
                                {{$b->kategori ?? '' }}
                            </td>
                            <td>
                                {{$b->jenis ?? '' }}
                            </td>
                            <td>
                                {{$b->deskripsi ?? '' }}
                            </td>
                            <td>
                                {{$b->stok ?? '' }}
                            </td>
                            <td>
                               <img src="{{ asset( $b->foto) }}" alt="" style="width: 160px; height: 190px;" />
                            </td>                            

                            <td>
                                @can('barang_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.barang.show', $b->id) }}">{{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('barang_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.barang.edit', $b->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('barang_delete')
                                    <form action="{{ route('admin.barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
    url: "{{ route('admin.barang.massDestroy') }}",
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
@can('barang_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js">
    var timeout = setInterval(reloadChat, 5000);    
function reloadChat () {

     $('notif').load('admin.barang');
</script>
@endsection