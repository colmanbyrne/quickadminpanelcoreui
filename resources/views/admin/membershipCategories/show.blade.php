@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.membershipCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.membership-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $membershipCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.category_type') }}
                        </th>
                        <td>
                            {{ $membershipCategory->category_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.category_name') }}
                        </th>
                        <td>
                            {{ $membershipCategory->category_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.mem_fee') }}
                        </th>
                        <td>
                            {{ $membershipCategory->mem_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.fee_add') }}
                        </th>
                        <td>
                            {{ $membershipCategory->fee_add }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.country_code') }}
                        </th>
                        <td>
                            {{ $membershipCategory->country_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membershipCategory.fields.curr_symbol') }}
                        </th>
                        <td>
                            {{ $membershipCategory->curr_symbol }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.membership-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#membership_category_members" role="tab" data-toggle="tab">
                {{ trans('cruds.member.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="membership_category_members">
            @includeIf('admin.membershipCategories.relationships.membershipCategoryMembers', ['members' => $membershipCategory->membershipCategoryMembers])
        </div>
    </div>
</div>

@endsection