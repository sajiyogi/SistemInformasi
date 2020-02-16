@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.struktur.create") }}"> Add
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Struktur Organisasi
    </div>

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
                         <th>
                            Gambar
                        </th>
                        <th>
                            Nama
                        </th>
                         <th>
                            Jabatan
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($struktur as $key => $s)
                        <tr data-entry-id="{{ $s->id }}">
                            <td>

                            </td>
                            <td>
                               <img src="{{asset ('asset/uploadcover/'.$s->file ) }} " alt="" style="width: 150px; height: 100px;" />
                            </td>
                        
                            <td>
                                {{ $s->nama  ?? '' }}
                            </td>
                            <td>
                                {{$s->jabatan ?? '' }}
                            </td>
                            
                            

                            <td>
                             
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.struktur.show', $s->id) }}">View
                                    </a>
                      
                             
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.struktur.edit', $s->id) }}">
                                        Edit
                                    </a>
                          
                                    <form action="{{ route('admin.struktur.destroy', $s->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                        
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
@can('user_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection