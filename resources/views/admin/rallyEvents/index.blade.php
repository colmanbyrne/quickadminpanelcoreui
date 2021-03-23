@extends('layouts.admin')
@section('content')
@can('rally_event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.rally-events.create') }}">
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RallyEvent">
            <thead>
                <tr>
                    <th width="10">

                    </th>
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('rally_event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rally-events.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.rally-events.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'event_name', name: 'event_name' },
{ data: 'event_organiser', name: 'event_organiser' },
{ data: 'event_type', name: 'event_type' },
{ data: 'date_start', name: 'date_start' },
{ data: 'date_end', name: 'date_end' },
{ data: 'event_status', name: 'event_status' },
{ data: 'max_entries', name: 'max_entries' },
{ data: 'date_early_fee', name: 'date_early_fee' },
{ data: 'fee_currency', name: 'fee_currency' },
{ data: 'fee_normal', name: 'fee_normal' },
{ data: 'fee_early', name: 'fee_early' },
{ data: 'fee_open', name: 'fee_open' },
{ data: 'fee_solo', name: 'fee_solo' },
{ data: 'fee_new_member', name: 'fee_new_member' },
{ data: 'fee_dinner_adult', name: 'fee_dinner_adult' },
{ data: 'fee_adult_teen', name: 'fee_adult_teen' },
{ data: 'fee_dinner_child', name: 'fee_dinner_child' },
{ data: 'mem_only', name: 'mem_only' },
{ data: 'email_from_name', name: 'email_from_name' },
{ data: 'email_from', name: 'email_from' },
{ data: 'email_copy', name: 'email_copy' },
{ data: 'event_comment', name: 'event_comment' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-RallyEvent').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection