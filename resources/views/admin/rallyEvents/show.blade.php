@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rallyEvent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rally-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.id') }}
                        </th>
                        <td>
                            {{ $rallyEvent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.event_name') }}
                        </th>
                        <td>
                            {{ $rallyEvent->event_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.event_organiser') }}
                        </th>
                        <td>
                            {{ $rallyEvent->event_organiser }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.event_type') }}
                        </th>
                        <td>
                            {{ $rallyEvent->event_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.date_start') }}
                        </th>
                        <td>
                            {{ $rallyEvent->date_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.date_end') }}
                        </th>
                        <td>
                            {{ $rallyEvent->date_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.event_status') }}
                        </th>
                        <td>
                            {{ $rallyEvent->event_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.max_entries') }}
                        </th>
                        <td>
                            {{ $rallyEvent->max_entries }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.date_early_fee') }}
                        </th>
                        <td>
                            {{ $rallyEvent->date_early_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_currency') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_normal') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_normal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_early') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_early }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_open') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_open }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_solo') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_solo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_new_member') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_new_member }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_dinner_adult') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_dinner_adult }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_adult_teen') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_adult_teen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.fee_dinner_child') }}
                        </th>
                        <td>
                            {{ $rallyEvent->fee_dinner_child }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.mem_only') }}
                        </th>
                        <td>
                            {{ $rallyEvent->mem_only }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.email_from_name') }}
                        </th>
                        <td>
                            {{ $rallyEvent->email_from_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.email_from') }}
                        </th>
                        <td>
                            {{ $rallyEvent->email_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.email_copy') }}
                        </th>
                        <td>
                            {{ $rallyEvent->email_copy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rallyEvent.fields.event_comment') }}
                        </th>
                        <td>
                            {{ $rallyEvent->event_comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rally-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection