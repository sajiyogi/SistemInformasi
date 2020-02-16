@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.majalah.create") }}"> Tambah Majalah
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
       Data Majalah
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
                            File
                        </th>
                        <th>
                            Judul
                        </th>
                         <th>
                            Penyusun
                        </th>
                         <th>
                            Kategori
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($majalah as $key => $m)
                        <tr data-entry-id="{{ $m->id }}">
                            <td>

                            </td>
                            <td>
                              {{ $m->file  ?? '' }}
                               <!-- <img src="{{asset ('asset/uploadcover/'.$m->file ) }} " alt="" style="width: 200px; height: 200px;" /> -->
                            </td>
                        
                            <td>
                                {{ $m->judul  ?? '' }}
                            </td>
                            <td>
                                {{$m->penyusun ?? '' }}
                            </td>
                            <td>
                                {{$m->kategori ?? '' }}
                            </td>
                            

                            <td>
                             
                                    <a class="btn btn-primary" href="/majalah/{{$m->file}}" download="{{ $m->file }}">download
                                    </a>
                      
                             
                                    <a class="btn btn-info" href="{{ route('admin.majalah.edit', $m->id) }}">
                                        Edit
                                    </a>
                          
                                    <form action="{{ route('admin.majalah.destroy', $m->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
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
    url: "{{ route('admin.majalah.massDestroy') }}",
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
@endsection