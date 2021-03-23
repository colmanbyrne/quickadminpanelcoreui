<div class="m-3">
    @can('member_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.members.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.member.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.member.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-branchMembers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.member.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.member_username') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.member_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.membership_category') }}
                            </th>
                            <th>
                                {{ trans('cruds.membershipCategory.fields.category_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.surname') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.firstname') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.prefix') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.partner') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.organisation_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.address_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.address_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.town') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.county') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.post_code') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.country') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.tel_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mob_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.email_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.email_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.sms_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mem_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mem_fee') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mem_fee_currency') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.pay_method') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.date_joined') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.date_renewed') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.date_card_issued') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.date_dd_issued') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.date_cancelled') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mem_notes') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.member_role') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.branch') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.updated_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mem_status') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $key => $member)
                            <tr data-entry-id="{{ $member->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $member->id ?? '' }}
                                </td>
                                <td>
                                    {{ $member->member_username->email ?? '' }}
                                </td>
                                <td>
                                    {{ $member->member_username->name ?? '' }}
                                </td>
                                <td>
                                    {{ $member->member_no ?? '' }}
                                </td>
                                <td>
                                    {{ $member->membership_category->category_type ?? '' }}
                                </td>
                                <td>
                                    {{ $member->membership_category->category_name ?? '' }}
                                </td>
                                <td>
                                    {{ $member->surname ?? '' }}
                                </td>
                                <td>
                                    {{ $member->firstname ?? '' }}
                                </td>
                                <td>
                                    {{ $member->prefix ?? '' }}
                                </td>
                                <td>
                                    {{ $member->partner ?? '' }}
                                </td>
                                <td>
                                    {{ $member->organisation_name ?? '' }}
                                </td>
                                <td>
                                    {{ $member->address_1 ?? '' }}
                                </td>
                                <td>
                                    {{ $member->address_2 ?? '' }}
                                </td>
                                <td>
                                    {{ $member->town ?? '' }}
                                </td>
                                <td>
                                    {{ $member->county ?? '' }}
                                </td>
                                <td>
                                    {{ $member->post_code ?? '' }}
                                </td>
                                <td>
                                    {{ $member->country ?? '' }}
                                </td>
                                <td>
                                    {{ $member->tel_no ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mob_no ?? '' }}
                                </td>
                                <td>
                                    {{ $member->email_2 ?? '' }}
                                </td>
                                <td>
                                    {{ $member->email_status ?? '' }}
                                </td>
                                <td>
                                    {{ $member->sms_status ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mem_year ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mem_fee ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mem_fee_currency ?? '' }}
                                </td>
                                <td>
                                    {{ $member->pay_method ?? '' }}
                                </td>
                                <td>
                                    {{ $member->date_joined ?? '' }}
                                </td>
                                <td>
                                    {{ $member->date_renewed ?? '' }}
                                </td>
                                <td>
                                    {{ $member->date_card_issued ?? '' }}
                                </td>
                                <td>
                                    {{ $member->date_dd_issued ?? '' }}
                                </td>
                                <td>
                                    {{ $member->date_cancelled ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mem_notes ?? '' }}
                                </td>
                                <td>
                                    {{ $member->member_role->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($member->branches as $key => $item)
                                        <span class="badge badge-info">{{ $item->shortname }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $member->updated_by ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mem_status->statusname ?? '' }}
                                </td>
                                <td>
                                    @can('member_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.members.show', $member->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('member_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.members.edit', $member->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('member_delete')
                                        <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('member_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.members.massDestroy') }}",
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
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-branchMembers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection