@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.branch.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.branches.update", [$branch->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="branch_no">{{ trans('cruds.branch.fields.branch_no') }}</label>
                            <input class="form-control" type="number" name="branch_no" id="branch_no" value="{{ old('branch_no', $branch->branch_no) }}" step="1" required>
                            @if($errors->has('branch_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="shortname">{{ trans('cruds.branch.fields.shortname') }}</label>
                            <input class="form-control" type="text" name="shortname" id="shortname" value="{{ old('shortname', $branch->shortname) }}" required>
                            @if($errors->has('shortname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('shortname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.shortname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="longname">{{ trans('cruds.branch.fields.longname') }}</label>
                            <input class="form-control" type="text" name="longname" id="longname" value="{{ old('longname', $branch->longname) }}" required>
                            @if($errors->has('longname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('longname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.longname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="branch_country">{{ trans('cruds.branch.fields.branch_country') }}</label>
                            <input class="form-control" type="text" name="branch_country" id="branch_country" value="{{ old('branch_country', $branch->branch_country) }}" required>
                            @if($errors->has('branch_country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="branch_currency">{{ trans('cruds.branch.fields.branch_currency') }}</label>
                            <input class="form-control" type="text" name="branch_currency" id="branch_currency" value="{{ old('branch_currency', $branch->branch_currency) }}" required>
                            @if($errors->has('branch_currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="branch_secretary_id">{{ trans('cruds.branch.fields.branch_secretary') }}</label>
                            <select class="form-control select2" name="branch_secretary_id" id="branch_secretary_id" required>
                                @foreach($branch_secretaries as $id => $branch_secretary)
                                    <option value="{{ $id }}" {{ (old('branch_secretary_id') ? old('branch_secretary_id') : $branch->branch_secretary->id ?? '') == $id ? 'selected' : '' }}>{{ $branch_secretary }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_secretary'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_secretary') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_secretary_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="branch_treasurer_id">{{ trans('cruds.branch.fields.branch_treasurer') }}</label>
                            <select class="form-control select2" name="branch_treasurer_id" id="branch_treasurer_id" required>
                                @foreach($branch_treasurers as $id => $branch_treasurer)
                                    <option value="{{ $id }}" {{ (old('branch_treasurer_id') ? old('branch_treasurer_id') : $branch->branch_treasurer->id ?? '') == $id ? 'selected' : '' }}>{{ $branch_treasurer }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_treasurer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_treasurer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_treasurer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="branch_chair_id">{{ trans('cruds.branch.fields.branch_chair') }}</label>
                            <select class="form-control select2" name="branch_chair_id" id="branch_chair_id" required>
                                @foreach($branch_chairs as $id => $branch_chair)
                                    <option value="{{ $id }}" {{ (old('branch_chair_id') ? old('branch_chair_id') : $branch->branch_chair->id ?? '') == $id ? 'selected' : '' }}>{{ $branch_chair }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_chair'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_chair') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_chair_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="branch_rep_1_id">{{ trans('cruds.branch.fields.branch_rep_1') }}</label>
                            <select class="form-control select2" name="branch_rep_1_id" id="branch_rep_1_id">
                                @foreach($branch_rep_1s as $id => $branch_rep_1)
                                    <option value="{{ $id }}" {{ (old('branch_rep_1_id') ? old('branch_rep_1_id') : $branch->branch_rep_1->id ?? '') == $id ? 'selected' : '' }}>{{ $branch_rep_1 }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_rep_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_rep_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.branch_rep_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="branch_rep_2_id">{{ trans('cruds.branch.fields.branch_rep_2') }}</label>
                            <select class="form-control select2" name="branch_rep_2_id" id="branch_rep_2_id">
                                @foreach($branch_rep_2s as $id => $branch_rep_2)
                                    <option value="{{ $id }}" {{ (old('branch_rep_2_id') ? old('branch_rep_2_id') : $branch->branch_rep_2->id ?? '') == $id ? 'selected' : '' }}>{{ $branch_rep_2 }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_rep_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch_rep_2') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection