@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.rallyUser.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.rally-users.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="event_id">{{ trans('cruds.rallyUser.fields.event') }}</label>
                            <select class="form-control select2" name="event_id" id="event_id" required>
                                @foreach($events as $id => $event)
                                    <option value="{{ $id }}" {{ old('event_id') == $id ? 'selected' : '' }}>{{ $event }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('event'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.event_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="rally_entry_name_id">{{ trans('cruds.rallyUser.fields.rally_entry_name') }}</label>
                            <select class="form-control select2" name="rally_entry_name_id" id="rally_entry_name_id" required>
                                @foreach($rally_entry_names as $id => $rally_entry_name)
                                    <option value="{{ $id }}" {{ old('rally_entry_name_id') == $id ? 'selected' : '' }}>{{ $rally_entry_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rally_entry_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rally_entry_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.rally_entry_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="member_no_id">{{ trans('cruds.rallyUser.fields.member_no') }}</label>
                            <select class="form-control select2" name="member_no_id" id="member_no_id" required>
                                @foreach($member_nos as $id => $member_no)
                                    <option value="{{ $id }}" {{ old('member_no_id') == $id ? 'selected' : '' }}>{{ $member_no }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('member_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('member_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.member_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entry_type">{{ trans('cruds.rallyUser.fields.entry_type') }}</label>
                            <input class="form-control" type="text" name="entry_type" id="entry_type" value="{{ old('entry_type', '') }}" required>
                            @if($errors->has('entry_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.entry_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entry_status">{{ trans('cruds.rallyUser.fields.entry_status') }}</label>
                            <input class="form-control" type="text" name="entry_status" id="entry_status" value="{{ old('entry_status', '') }}" required>
                            @if($errors->has('entry_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.entry_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entry_date">{{ trans('cruds.rallyUser.fields.entry_date') }}</label>
                            <input class="form-control date" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date') }}" required>
                            @if($errors->has('entry_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.entry_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="entry_paid">{{ trans('cruds.rallyUser.fields.entry_paid') }}</label>
                            <input class="form-control date" type="text" name="entry_paid" id="entry_paid" value="{{ old('entry_paid') }}">
                            @if($errors->has('entry_paid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_paid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.entry_paid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fee_due">{{ trans('cruds.rallyUser.fields.fee_due') }}</label>
                            <input class="form-control" type="number" name="fee_due" id="fee_due" value="{{ old('fee_due', '') }}" step="0.01" required>
                            @if($errors->has('fee_due'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fee_due') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.fee_due_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fee_paid">{{ trans('cruds.rallyUser.fields.fee_paid') }}</label>
                            <input class="form-control" type="number" name="fee_paid" id="fee_paid" value="{{ old('fee_paid', '') }}" step="0.01">
                            @if($errors->has('fee_paid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fee_paid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.fee_paid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fee_currency">{{ trans('cruds.rallyUser.fields.fee_currency') }}</label>
                            <input class="form-control" type="text" name="fee_currency" id="fee_currency" value="{{ old('fee_currency', '') }}" required>
                            @if($errors->has('fee_currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fee_currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.fee_currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="entry_notes">{{ trans('cruds.rallyUser.fields.entry_notes') }}</label>
                            <textarea class="form-control" name="entry_notes" id="entry_notes">{{ old('entry_notes') }}</textarea>
                            @if($errors->has('entry_notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.entry_notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="entry_comment">{{ trans('cruds.rallyUser.fields.entry_comment') }}</label>
                            <textarea class="form-control" name="entry_comment" id="entry_comment">{{ old('entry_comment') }}</textarea>
                            @if($errors->has('entry_comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_comment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.entry_comment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="num_adults">{{ trans('cruds.rallyUser.fields.num_adults') }}</label>
                            <input class="form-control" type="number" name="num_adults" id="num_adults" value="{{ old('num_adults', '') }}" step="1">
                            @if($errors->has('num_adults'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('num_adults') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.num_adults_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="num_child_18">{{ trans('cruds.rallyUser.fields.num_child_18') }}</label>
                            <input class="form-control" type="number" name="num_child_18" id="num_child_18" value="{{ old('num_child_18', '') }}" step="1">
                            @if($errors->has('num_child_18'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('num_child_18') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.num_child_18_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="num_child_12">{{ trans('cruds.rallyUser.fields.num_child_12') }}</label>
                            <input class="form-control" type="number" name="num_child_12" id="num_child_12" value="{{ old('num_child_12', '') }}" step="1">
                            @if($errors->has('num_child_12'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('num_child_12') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.num_child_12_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="opt_dinner_adult">{{ trans('cruds.rallyUser.fields.opt_dinner_adult') }}</label>
                            <input class="form-control" type="number" name="opt_dinner_adult" id="opt_dinner_adult" value="{{ old('opt_dinner_adult', '') }}" step="1">
                            @if($errors->has('opt_dinner_adult'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('opt_dinner_adult') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.opt_dinner_adult_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="opt_dinner_teen">{{ trans('cruds.rallyUser.fields.opt_dinner_teen') }}</label>
                            <input class="form-control" type="number" name="opt_dinner_teen" id="opt_dinner_teen" value="{{ old('opt_dinner_teen', '') }}" step="1">
                            @if($errors->has('opt_dinner_teen'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('opt_dinner_teen') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.opt_dinner_teen_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="opt_dinner_child">{{ trans('cruds.rallyUser.fields.opt_dinner_child') }}</label>
                            <input class="form-control" type="number" name="opt_dinner_child" id="opt_dinner_child" value="{{ old('opt_dinner_child', '') }}" step="1">
                            @if($errors->has('opt_dinner_child'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('opt_dinner_child') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.opt_dinner_child_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="vessel_name">{{ trans('cruds.rallyUser.fields.vessel_name') }}</label>
                            <input class="form-control" type="text" name="vessel_name" id="vessel_name" value="{{ old('vessel_name', '') }}" required>
                            @if($errors->has('vessel_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vessel_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.vessel_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="vessel_length">{{ trans('cruds.rallyUser.fields.vessel_length') }}</label>
                            <input class="form-control" type="number" name="vessel_length" id="vessel_length" value="{{ old('vessel_length', '') }}" step="0.01" required>
                            @if($errors->has('vessel_length'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vessel_length') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.vessel_length_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vessel_draft">{{ trans('cruds.rallyUser.fields.vessel_draft') }}</label>
                            <input class="form-control" type="number" name="vessel_draft" id="vessel_draft" value="{{ old('vessel_draft', '') }}" step="0.01">
                            @if($errors->has('vessel_draft'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vessel_draft') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.vessel_draft_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vessel_air_draft">{{ trans('cruds.rallyUser.fields.vessel_air_draft') }}</label>
                            <input class="form-control" type="number" name="vessel_air_draft" id="vessel_air_draft" value="{{ old('vessel_air_draft', '') }}" step="0.01">
                            @if($errors->has('vessel_air_draft'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vessel_air_draft') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.vessel_air_draft_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vcruise_normal">{{ trans('cruds.rallyUser.fields.vcruise_normal') }}</label>
                            <input class="form-control" type="number" name="vcruise_normal" id="vcruise_normal" value="{{ old('vcruise_normal', '') }}" step="0.01">
                            @if($errors->has('vcruise_normal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vcruise_normal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.vcruise_normal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vcruise_max">{{ trans('cruds.rallyUser.fields.vcruise_max') }}</label>
                            <input class="form-control" type="number" name="vcruise_max" id="vcruise_max" value="{{ old('vcruise_max', '') }}" step="0.01">
                            @if($errors->has('vcruise_max'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vcruise_max') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.vcruise_max_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="own_vessel">{{ trans('cruds.rallyUser.fields.own_vessel') }}</label>
                            <input class="form-control" type="text" name="own_vessel" id="own_vessel" value="{{ old('own_vessel', '') }}">
                            @if($errors->has('own_vessel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('own_vessel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.own_vessel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="boat_number">{{ trans('cruds.rallyUser.fields.boat_number') }}</label>
                            <input class="form-control" type="number" name="boat_number" id="boat_number" value="{{ old('boat_number', '') }}" step="1">
                            @if($errors->has('boat_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('boat_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.rallyUser.fields.boat_number_helper') }}</span>
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