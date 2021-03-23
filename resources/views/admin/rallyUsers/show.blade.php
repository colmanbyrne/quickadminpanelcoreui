@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rallyUser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rally-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.id') }}
                        </th>
                        <td>
                            {{ $rallyUser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.event') }}
                        </th>
                        <td>
                            {{ $rallyUser->event->event_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.rally_entry_name') }}
                        </th>
                        <td>
                            {{ $rallyUser->rally_entry_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.member_no') }}
                        </th>
                        <td>
                            {{ $rallyUser->member_no->member_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.entry_type') }}
                        </th>
                        <td>
                            {{ $rallyUser->entry_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.entry_status') }}
                        </th>
                        <td>
                            {{ $rallyUser->entry_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.entry_date') }}
                        </th>
                        <td>
                            {{ $rallyUser->entry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.entry_paid') }}
                        </th>
                        <td>
                            {{ $rallyUser->entry_paid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.fee_due') }}
                        </th>
                        <td>
                            {{ $rallyUser->fee_due }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.fee_paid') }}
                        </th>
                        <td>
                            {{ $rallyUser->fee_paid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.fee_currency') }}
                        </th>
                        <td>
                            {{ $rallyUser->fee_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.entry_notes') }}
                        </th>
                        <td>
                            {{ $rallyUser->entry_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.entry_comment') }}
                        </th>
                        <td>
                            {{ $rallyUser->entry_comment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.num_adults') }}
                        </th>
                        <td>
                            {{ $rallyUser->num_adults }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.num_child_18') }}
                        </th>
                        <td>
                            {{ $rallyUser->num_child_18 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.num_child_12') }}
                        </th>
                        <td>
                            {{ $rallyUser->num_child_12 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.opt_dinner_adult') }}
                        </th>
                        <td>
                            {{ $rallyUser->opt_dinner_adult }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.opt_dinner_teen') }}
                        </th>
                        <td>
                            {{ $rallyUser->opt_dinner_teen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.opt_dinner_child') }}
                        </th>
                        <td>
                            {{ $rallyUser->opt_dinner_child }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.vessel_name') }}
                        </th>
                        <td>
                            {{ $rallyUser->vessel_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.vessel_length') }}
                        </th>
                        <td>
                            {{ $rallyUser->vessel_length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.vessel_draft') }}
                        </th>
                        <td>
                            {{ $rallyUser->vessel_draft }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.vessel_air_draft') }}
                        </th>
                        <td>
                            {{ $rallyUser->vessel_air_draft }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.vcruise_normal') }}
                        </th>
                        <td>
                            {{ $rallyUser->vcruise_normal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.vcruise_max') }}
                        </th>
                        <td>
                            {{ $rallyUser->vcruise_max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.own_vessel') }}
                        </th>
                        <td>
                            {{ $rallyUser->own_vessel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyUser.fields.boat_number') }}
                        </th>
                        <td>
                            {{ $rallyUser->boat_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rally-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection