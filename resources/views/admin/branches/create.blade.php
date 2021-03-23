@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.branch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.branches.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="branch_no">{{ trans('cruds.branch.fields.branch_no') }}</label>
                <input class="form-control {{ $errors->has('branch_no') ? 'is-invalid' : '' }}" type="number" name="branch_no" id="branch_no" value="{{ old('branch_no', '') }}" step="1" required>
                @if($errors->has('branch_no'))
                    <span class="text-danger">{{ $errors->first('branch_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shortname">{{ trans('cruds.branch.fields.shortname') }}</label>
                <input class="form-control {{ $errors->has('shortname') ? 'is-invalid' : '' }}" type="text" name="shortname" id="shortname" value="{{ old('shortname', '') }}" required>
                @if($errors->has('shortname'))
                    <span class="text-danger">{{ $errors->first('shortname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.shortname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="longname">{{ trans('cruds.branch.fields.longname') }}</label>
                <input class="form-control {{ $errors->has('longname') ? 'is-invalid' : '' }}" type="text" name="longname" id="longname" value="{{ old('longname', '') }}" required>
                @if($errors->has('longname'))
                    <span class="text-danger">{{ $errors->first('longname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.longname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_country">{{ trans('cruds.branch.fields.branch_country') }}</label>
                <input class="form-control {{ $errors->has('branch_country') ? 'is-invalid' : '' }}" type="text" name="branch_country" id="branch_country" value="{{ old('branch_country', '') }}" required>
                @if($errors->has('branch_country'))
                    <span class="text-danger">{{ $errors->first('branch_country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_currency">{{ trans('cruds.branch.fields.branch_currency') }}</label>
                <input class="form-control {{ $errors->has('branch_currency') ? 'is-invalid' : '' }}" type="text" name="branch_currency" id="branch_currency" value="{{ old('branch_currency', '') }}" required>
                @if($errors->has('branch_currency'))
                    <span class="text-danger">{{ $errors->first('branch_currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_secretary_id">{{ trans('cruds.branch.fields.branch_secretary') }}</label>
                <select class="form-control select2 {{ $errors->has('branch_secretary') ? 'is-invalid' : '' }}" name="branch_secretary_id" id="branch_secretary_id" required>
                    @foreach($branch_secretaries as $id => $branch_secretary)
                        <option value="{{ $id }}" {{ old('branch_secretary_id') == $id ? 'selected' : '' }}>{{ $branch_secretary }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch_secretary'))
                    <span class="text-danger">{{ $errors->first('branch_secretary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_secretary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_treasurer_id">{{ trans('cruds.branch.fields.branch_treasurer') }}</label>
                <select class="form-control select2 {{ $errors->has('branch_treasurer') ? 'is-invalid' : '' }}" name="branch_treasurer_id" id="branch_treasurer_id" required>
                    @foreach($branch_treasurers as $id => $branch_treasurer)
                        <option value="{{ $id }}" {{ old('branch_treasurer_id') == $id ? 'selected' : '' }}>{{ $branch_treasurer }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch_treasurer'))
                    <span class="text-danger">{{ $errors->first('branch_treasurer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_treasurer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="branch_chair_id">{{ trans('cruds.branch.fields.branch_chair') }}</label>
                <select class="form-control select2 {{ $errors->has('branch_chair') ? 'is-invalid' : '' }}" name="branch_chair_id" id="branch_chair_id" required>
                    @foreach($branch_chairs as $id => $branch_chair)
                        <option value="{{ $id }}" {{ old('branch_chair_id') == $id ? 'selected' : '' }}>{{ $branch_chair }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch_chair'))
                    <span class="text-danger">{{ $errors->first('branch_chair') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_chair_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="branch_rep_1_id">{{ trans('cruds.branch.fields.branch_rep_1') }}</label>
                <select class="form-control select2 {{ $errors->has('branch_rep_1') ? 'is-invalid' : '' }}" name="branch_rep_1_id" id="branch_rep_1_id">
                    @foreach($branch_rep_1s as $id => $branch_rep_1)
                        <option value="{{ $id }}" {{ old('branch_rep_1_id') == $id ? 'selected' : '' }}>{{ $branch_rep_1 }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch_rep_1'))
                    <span class="text-danger">{{ $errors->first('branch_rep_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_rep_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="branch_rep_2_id">{{ trans('cruds.branch.fields.branch_rep_2') }}</label>
                <select class="form-control select2 {{ $errors->has('branch_rep_2') ? 'is-invalid' : '' }}" name="branch_rep_2_id" id="branch_rep_2_id">
                    @foreach($branch_rep_2s as $id => $branch_rep_2)
                        <option value="{{ $id }}" {{ old('branch_rep_2_id') == $id ? 'selected' : '' }}>{{ $branch_rep_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch_rep_2'))
                    <span class="text-danger">{{ $errors->first('branch_rep_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.branch.fields.branch_rep_2_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection