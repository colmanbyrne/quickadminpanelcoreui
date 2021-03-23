@extends('layouts.admin')
@section('content')
@can('branch_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.branches.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.branch.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Branch', 'route' => 'admin.branches.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.branch.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Branch">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.shortname') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.longname') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_secretary') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_treasurer') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_chair') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_rep_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.branch.fields.branch_rep_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $key => $branch)
                        <tr data-entry-id="{{ $branch->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $branch->id ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_no ?? '' }}
                            </td>
                            <td>
                                {{ $branch->shortname ?? '' }}
                            </td>
                            <td>
                                {{ $branch->longname ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_country ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_currency ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_secretary->name ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_secretary->email ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_treasurer->name ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_treasurer->email ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_chair->name ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_chair->email ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_rep_1->name ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_rep_1->email ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_rep_2->name ?? '' }}
                            </td>
                            <td>
                                {{ $branch->branch_rep_2->email ?? '' }}
                            </td>
                            <td>
                                @can('branch_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.branches.show', $branch->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('branch_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.branches.edit', $branch->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('branch_delete')
                                    <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('branch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.branches.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-Branch:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection