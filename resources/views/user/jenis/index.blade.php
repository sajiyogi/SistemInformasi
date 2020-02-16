@extends('layouts.admin')

@section('content')


    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route('admin.jenis.create')}}"> Tambah jenis jenis
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">Data Jenis jenis</div>

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
                        <th>Id Jenis Barang</th>
                        <th>Nama Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenis as $row)
                        <tr data-entry-id="{{ $row->id }}">
                            <td>

                            </td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->nama}}</td>
                            
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.jenis.edit', $row->id)}}" class="btn btn-warning">Ubah
                                    </a>
                                
                                    <form method="POST" action="{{ route('admin.jenis.destroy', $row->id ) }}"  onclick="return confirm('Are You Sure ? ')">
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

@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {text: deleteButtonTrans,url: "{{ route('admin.jenis.massDestroy') }}",className: 'btn-danger', action: function (e, dt, node, config) {
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
@can('jenis_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection