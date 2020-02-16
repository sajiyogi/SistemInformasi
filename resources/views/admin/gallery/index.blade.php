@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.gallery.create') }}"> Tambah Gallery
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Data Gallery
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                         <th>Image</th>
                        <th> Kategori</th>
                         <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($data as $row)
                        <tr data-entry-id="{{ $row->id }}">
                            <td>

                            </td>
                            <td>
                               <img src="{{URL::to('/')}}/uploadgallery/{{ $row->image}} " class="img-rounded" width="75" />
                            </td>
                        
                            <td>{{ $row->keterangan}}</td>
                            <td>
                              <div class="btn-group" >
                              <a class="btn btn-info" href="{{route('admin.gallery.edit', $row->id)}}">Ubah</a>
                              <form action="{{route('admin.gallery.destroy', $row->id)}}" method="POST" onclick="return confirm('Are You Sure ? ')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form>
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
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.buku.massDestroy') }}",
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
@can('buku_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection -->