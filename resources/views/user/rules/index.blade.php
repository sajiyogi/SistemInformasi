@extends('layouts.admin')
@section('content')
@can('rule_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.rules.create") }}">
                {{ trans('global.add') }} {{ trans('global.rule.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.rule.title_singular') }} {{ trans('global.list') }}
    </div>
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
                            {{  trans('global.rule.fields.description') }}
                        </th>
                        <th>
                            {{ trans('global.rule.fields.pengesah') }}
                        </th>
                        <th>
                            &nbsp; Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rules as $key => $rule)
                        <tr data-entry-id="{{ $rule->id }}">
                            <td>

                            </td>
                            <td><?php  
                    $ringkas="
                    
                        $rule->description  
                       ";
                      echo substr($ringkas, 0,250)."..."; ?>
                            </td>
                            <td>
                                {{ $rule->pengesah ?? '' }}
                            </td>
                            <td>
                                @can('rule_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rules.show', $rule->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('rule_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rules.edit', $rule->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('rule_delete')
                                    <form action="{{ route('admin.rules.destroy', $rule->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.rules.massDestroy') }}",
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
@can('rule_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection