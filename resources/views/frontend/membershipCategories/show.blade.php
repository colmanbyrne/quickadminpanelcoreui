@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.membershipCategory.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.membership-categories.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.membership-categories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection