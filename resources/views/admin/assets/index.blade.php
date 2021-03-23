@extends('layouts.admin')
@section('content')
@can('asset_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.assets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.asset.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.asset.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Asset">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.asset_branch') }}
                    </th>
                    <th>
                        {{ trans('cruds.branch.fields.branch_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.asset_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.serial_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.photos') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.location') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.notes') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.assigned_to') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.asset_year') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.date_purchased') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.cost') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.value') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.date_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.rep_value_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.asset.fields.rep_value') }}
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
@can('asset_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.assets.massDestroy') }}",
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
    ajax: "{{ route('admin.assets.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'asset_branch_shortname', name: 'asset_branch.shortname' },
{ data: 'asset_branch.branch_no', name: 'asset_branch.branch_no' },
{ data: 'category_name', name: 'category.name' },
{ data: 'asset_type_description', name: 'asset_type.description' },
{ data: 'serial_number', name: 'serial_number' },
{ data: 'name', name: 'name' },
{ data: 'photos', name: 'photos', sortable: false, searchable: false },
{ data: 'status_name', name: 'status.name' },
{ data: 'location_name', name: 'location.name' },
{ data: 'notes', name: 'notes' },
{ data: 'assigned_to_name', name: 'assigned_to.name' },
{ data: 'asset_year', name: 'asset_year' },
{ data: 'date_purchased', name: 'date_purchased' },
{ data: 'cost', name: 'cost' },
{ data: 'value', name: 'value' },
{ data: 'date_value', name: 'date_value' },
{ data: 'rep_value_date', name: 'rep_value_date' },
{ data: 'rep_value', name: 'rep_value' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Asset').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection