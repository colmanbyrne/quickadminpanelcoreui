@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('rally_user_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.rally-users.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RallyUser">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($rallyUsers as $key => $rallyUser)
                                    <tr data-entry-id="{{ $rallyUser->id }}">
                                        <td>
                                            {{ $rallyUser->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->event->event_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->rally_entry_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->rally_entry_name->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->member_no->member_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->member_no->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->member_no->firstname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->entry_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->entry_status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->entry_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->entry_paid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->fee_due ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->fee_paid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->fee_currency ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->entry_notes ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->entry_comment ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->num_adults ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->num_child_18 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->num_child_12 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->opt_dinner_adult ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->opt_dinner_teen ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->opt_dinner_child ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->vessel_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->vessel_length ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->vessel_draft ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->vessel_air_draft ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->vcruise_normal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->vcruise_max ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->own_vessel ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rallyUser->boat_number ?? '' }}
                                        </td>
                                        <td>
                                            @can('rally_user_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.rally-users.show', $rallyUser->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('rally_user_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.rally-users.edit', $rallyUser->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('rally_user_delete')
                                                <form action="{{ route('frontend.rally-users.destroy', $rallyUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rally_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.rally-users.massDestroy') }}",
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
  let table = $('.datatable-RallyUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection