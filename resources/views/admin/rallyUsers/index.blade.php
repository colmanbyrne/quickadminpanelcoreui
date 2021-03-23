@extends('layouts.admin')
@section('content')
@can('rally_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.rally-users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.rallyUser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.rallyUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RallyUser">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.event') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.rally_entry_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.member_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.member.fields.surname') }}
                    </th>
                    <th>
                        {{ trans('cruds.member.fields.firstname') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.entry_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.entry_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.entry_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.entry_paid') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.fee_due') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.fee_paid') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.fee_currency') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.entry_notes') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.entry_comment') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.num_adults') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.num_child_18') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.num_child_12') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.opt_dinner_adult') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.opt_dinner_teen') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.opt_dinner_child') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.vessel_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.vessel_length') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.vessel_draft') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.vessel_air_draft') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.vcruise_normal') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.vcruise_max') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.own_vessel') }}
                    </th>
                    <th>
                        {{ trans('cruds.rallyUser.fields.boat_number') }}
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
@can('rally_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rally-users.massDestroy') }}",
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
    ajax: "{{ route('admin.rally-users.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'event_event_name', name: 'event.event_name' },
{ data: 'rally_entry_name_name', name: 'rally_entry_name.name' },
{ data: 'rally_entry_name.email', name: 'rally_entry_name.email' },
{ data: 'member_no_member_no', name: 'member_no.member_no' },
{ data: 'member_no.surname', name: 'member_no.surname' },
{ data: 'member_no.firstname', name: 'member_no.firstname' },
{ data: 'entry_type', name: 'entry_type' },
{ data: 'entry_status', name: 'entry_status' },
{ data: 'entry_date', name: 'entry_date' },
{ data: 'entry_paid', name: 'entry_paid' },
{ data: 'fee_due', name: 'fee_due' },
{ data: 'fee_paid', name: 'fee_paid' },
{ data: 'fee_currency', name: 'fee_currency' },
{ data: 'entry_notes', name: 'entry_notes' },
{ data: 'entry_comment', name: 'entry_comment' },
{ data: 'num_adults', name: 'num_adults' },
{ data: 'num_child_18', name: 'num_child_18' },
{ data: 'num_child_12', name: 'num_child_12' },
{ data: 'opt_dinner_adult', name: 'opt_dinner_adult' },
{ data: 'opt_dinner_teen', name: 'opt_dinner_teen' },
{ data: 'opt_dinner_child', name: 'opt_dinner_child' },
{ data: 'vessel_name', name: 'vessel_name' },
{ data: 'vessel_length', name: 'vessel_length' },
{ data: 'vessel_draft', name: 'vessel_draft' },
{ data: 'vessel_air_draft', name: 'vessel_air_draft' },
{ data: 'vcruise_normal', name: 'vcruise_normal' },
{ data: 'vcruise_max', name: 'vcruise_max' },
{ data: 'own_vessel', name: 'own_vessel' },
{ data: 'boat_number', name: 'boat_number' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-RallyUser').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection