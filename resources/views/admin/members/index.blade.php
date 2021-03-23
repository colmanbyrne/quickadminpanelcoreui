@extends('layouts.admin')
@section('content')
@can('member_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.members.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.member.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Member', 'route' => 'admin.members.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.member.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Member">
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
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->email }}">{{ $item->email }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($membership_categories as $key => $item)
                                <option value="{{ $item->category_type }}">{{ $item->category_type }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($roles as $key => $item)
                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($branches as $key => $item)
                                <option value="{{ $item->shortname }}">{{ $item->shortname }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($membership_statuses as $key => $item)
                                <option value="{{ $item->statusname }}">{{ $item->statusname }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
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
@can('member_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.members.massDestroy') }}",
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
    ajax: "{{ route('admin.members.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'member_username_email', name: 'member_username.email' },
{ data: 'member_username.name', name: 'member_username.name' },
{ data: 'member_no', name: 'member_no' },
{ data: 'membership_category_category_type', name: 'membership_category.category_type' },
{ data: 'membership_category.category_name', name: 'membership_category.category_name' },
{ data: 'surname', name: 'surname' },
{ data: 'firstname', name: 'firstname' },
{ data: 'prefix', name: 'prefix' },
{ data: 'partner', name: 'partner' },
{ data: 'organisation_name', name: 'organisation_name' },
{ data: 'address_1', name: 'address_1' },
{ data: 'address_2', name: 'address_2' },
{ data: 'town', name: 'town' },
{ data: 'county', name: 'county' },
{ data: 'post_code', name: 'post_code' },
{ data: 'country', name: 'country' },
{ data: 'tel_no', name: 'tel_no' },
{ data: 'mob_no', name: 'mob_no' },
{ data: 'email_2', name: 'email_2' },
{ data: 'email_status', name: 'email_status' },
{ data: 'sms_status', name: 'sms_status' },
{ data: 'mem_year', name: 'mem_year' },
{ data: 'mem_fee', name: 'mem_fee' },
{ data: 'mem_fee_currency', name: 'mem_fee_currency' },
{ data: 'pay_method', name: 'pay_method' },
{ data: 'date_joined', name: 'date_joined' },
{ data: 'date_renewed', name: 'date_renewed' },
{ data: 'date_card_issued', name: 'date_card_issued' },
{ data: 'date_dd_issued', name: 'date_dd_issued' },
{ data: 'date_cancelled', name: 'date_cancelled' },
{ data: 'mem_notes', name: 'mem_notes' },
{ data: 'member_role_title', name: 'member_role.title' },
{ data: 'branch', name: 'branches.shortname' },
{ data: 'updated_by', name: 'updated_by' },
{ data: 'mem_status_statusname', name: 'mem_status.statusname' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Member').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection