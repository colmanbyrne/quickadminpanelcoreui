@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('rally_event_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.rally-events.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.rallyEvent.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'RallyEvent', 'route' => 'admin.rally-events.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.rallyEvent.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RallyEvent">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.event_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.event_organiser') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.event_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.date_start') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.date_end') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.event_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.max_entries') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.date_early_fee') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_currency') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_normal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_early') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_open') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_solo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_new_member') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_dinner_adult') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_adult_teen') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.fee_dinner_child') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.mem_only') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.email_from_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.email_from') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.email_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rallyEvent.fields.event_comment') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rallyEvents as $key => $rallyEvent)
                                    <tr data-entry-id="{{ $rallyEvent->id }}">
                                        <td>
                                            {{ $rallyEvent->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->event_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->event_organiser ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->event_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->date_start ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->date_end ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->event_status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->max_entries ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->date_early_fee ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_currency ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_normal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_early ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_open ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_solo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_new_member ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_dinner_adult ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_adult_teen ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->fee_dinner_child ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->mem_only ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->email_from_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->email_from ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->email_copy ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyEvent->event_comment ?? '' }}
                                        </td>
                                        <td>
                                            @can('rally_event_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.rally-events.show', $rallyEvent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('rally_event_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.rally-events.edit', $rallyEvent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('rally_event_delete')
                                                <form action="{{ route('frontend.rally-events.destroy', $rallyEvent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('rally_event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.rally-events.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-RallyEvent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection