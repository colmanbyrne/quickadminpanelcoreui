@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('membership_category_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.membership-categories.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.membershipCategory.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'MembershipCategory', 'route' => 'admin.membership-categories.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.membershipCategory.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MembershipCategory">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.category_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.category_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.mem_fee') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.fee_add') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.country_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.membershipCategory.fields.curr_symbol') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($membershipCategories as $key => $membershipCategory)
                                    <tr data-entry-id="{{ $membershipCategory->id }}">
                                        <td>
                                            {{ $membershipCategory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $membershipCategory->category_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $membershipCategory->category_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $membershipCategory->mem_fee ?? '' }}
                                        </td>
                                        <td>
                                            {{ $membershipCategory->fee_add ?? '' }}
                                        </td>
                                        <td>
                                            {{ $membershipCategory->country_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $membershipCategory->curr_symbol ?? '' }}
                                        </td>
                                        <td>
                                            @can('membership_category_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.membership-categories.show', $membershipCategory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('membership_category_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.membership-categories.edit', $membershipCategory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('membership_category_delete')
                                                <form action="{{ route('frontend.membership-categories.destroy', $membershipCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('membership_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.membership-categories.massDestroy') }}",
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
  let table = $('.datatable-MembershipCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection