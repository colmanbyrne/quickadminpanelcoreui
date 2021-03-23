@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.member.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <td>
                            {{ $member->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.member_username') }}
                        </th>
                        <td>
                            {{ $member->member_username->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.member_no') }}
                        </th>
                        <td>
                            {{ $member->member_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.membership_category') }}
                        </th>
                        <td>
                            {{ $member->membership_category->category_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.surname') }}
                        </th>
                        <td>
                            {{ $member->surname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.firstname') }}
                        </th>
                        <td>
                            {{ $member->firstname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.prefix') }}
                        </th>
                        <td>
                            {{ $member->prefix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.partner') }}
                        </th>
                        <td>
                            {{ $member->partner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.organisation_name') }}
                        </th>
                        <td>
                            {{ $member->organisation_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.address_1') }}
                        </th>
                        <td>
                            {{ $member->address_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.address_2') }}
                        </th>
                        <td>
                            {{ $member->address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.town') }}
                        </th>
                        <td>
                            {{ $member->town }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.county') }}
                        </th>
                        <td>
                            {{ $member->county }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.post_code') }}
                        </th>
                        <td>
                            {{ $member->post_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.country') }}
                        </th>
                        <td>
                            {{ $member->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.tel_no') }}
                        </th>
                        <td>
                            {{ $member->tel_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mob_no') }}
                        </th>
                        <td>
                            {{ $member->mob_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.email_2') }}
                        </th>
                        <td>
                            {{ $member->email_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.email_status') }}
                        </th>
                        <td>
                            {{ $member->email_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.sms_status') }}
                        </th>
                        <td>
                            {{ $member->sms_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mem_year') }}
                        </th>
                        <td>
                            {{ $member->mem_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mem_fee') }}
                        </th>
                        <td>
                            {{ $member->mem_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mem_fee_currency') }}
                        </th>
                        <td>
                            {{ $member->mem_fee_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.pay_method') }}
                        </th>
                        <td>
                            {{ $member->pay_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_joined') }}
                        </th>
                        <td>
                            {{ $member->date_joined }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_renewed') }}
                        </th>
                        <td>
                            {{ $member->date_renewed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_card_issued') }}
                        </th>
                        <td>
                            {{ $member->date_card_issued }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_dd_issued') }}
                        </th>
                        <td>
                            {{ $member->date_dd_issued }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_cancelled') }}
                        </th>
                        <td>
                            {{ $member->date_cancelled }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mem_notes') }}
                        </th>
                        <td>
                            {{ $member->mem_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.member_role') }}
                        </th>
                        <td>
                            {{ $member->member_role->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.branch') }}
                        </th>
                        <td>
                            @foreach($member->branches as $key => $branch)
                                <span class="label label-info">{{ $branch->shortname }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $member->updated_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mem_status') }}
                        </th>
                        <td>
                            {{ $member->mem_status->statusname ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection