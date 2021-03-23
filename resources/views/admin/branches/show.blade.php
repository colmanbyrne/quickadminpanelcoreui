@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.branch.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.id') }}
                        </th>
                        <td>
                            {{ $branch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_no') }}
                        </th>
                        <td>
                            {{ $branch->branch_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.shortname') }}
                        </th>
                        <td>
                            {{ $branch->shortname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.longname') }}
                        </th>
                        <td>
                            {{ $branch->longname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_country') }}
                        </th>
                        <td>
                            {{ $branch->branch_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_currency') }}
                        </th>
                        <td>
                            {{ $branch->branch_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_secretary') }}
                        </th>
                        <td>
                            {{ $branch->branch_secretary->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_treasurer') }}
                        </th>
                        <td>
                            {{ $branch->branch_treasurer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_chair') }}
                        </th>
                        <td>
                            {{ $branch->branch_chair->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_rep_1') }}
                        </th>
                        <td>
                            {{ $branch->branch_rep_1->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.branch_rep_2') }}
                        </th>
                        <td>
                            {{ $branch->branch_rep_2->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
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
            <a class="nav-link" href="#branch_members" role="tab" data-toggle="tab">
                {{ trans('cruds.member.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="branch_members">
            @includeIf('admin.branches.relationships.branchMembers', ['members' => $branch->branchMembers])
        </div>
    </div>
</div>

@endsection