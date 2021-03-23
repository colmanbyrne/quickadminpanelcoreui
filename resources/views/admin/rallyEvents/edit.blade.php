@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rallyEvent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rally-events.update", [$rallyEvent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="event_name">{{ trans('cruds.rallyEvent.fields.event_name') }}</label>
                <input class="form-control {{ $errors->has('event_name') ? 'is-invalid' : '' }}" type="text" name="event_name" id="event_name" value="{{ old('event_name', $rallyEvent->event_name) }}" required>
                @if($errors->has('event_name'))
                    <span class="text-danger">{{ $errors->first('event_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.event_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_organiser">{{ trans('cruds.rallyEvent.fields.event_organiser') }}</label>
                <input class="form-control {{ $errors->has('event_organiser') ? 'is-invalid' : '' }}" type="text" name="event_organiser" id="event_organiser" value="{{ old('event_organiser', $rallyEvent->event_organiser) }}" required>
                @if($errors->has('event_organiser'))
                    <span class="text-danger">{{ $errors->first('event_organiser') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.event_organiser_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_type">{{ trans('cruds.rallyEvent.fields.event_type') }}</label>
                <input class="form-control {{ $errors->has('event_type') ? 'is-invalid' : '' }}" type="text" name="event_type" id="event_type" value="{{ old('event_type', $rallyEvent->event_type) }}" required>
                @if($errors->has('event_type'))
                    <span class="text-danger">{{ $errors->first('event_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.event_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_start">{{ trans('cruds.rallyEvent.fields.date_start') }}</label>
                <input class="form-control date {{ $errors->has('date_start') ? 'is-invalid' : '' }}" type="text" name="date_start" id="date_start" value="{{ old('date_start', $rallyEvent->date_start) }}" required>
                @if($errors->has('date_start'))
                    <span class="text-danger">{{ $errors->first('date_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.date_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_end">{{ trans('cruds.rallyEvent.fields.date_end') }}</label>
                <input class="form-control date {{ $errors->has('date_end') ? 'is-invalid' : '' }}" type="text" name="date_end" id="date_end" value="{{ old('date_end', $rallyEvent->date_end) }}" required>
                @if($errors->has('date_end'))
                    <span class="text-danger">{{ $errors->first('date_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.date_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_status">{{ trans('cruds.rallyEvent.fields.event_status') }}</label>
                <input class="form-control {{ $errors->has('event_status') ? 'is-invalid' : '' }}" type="text" name="event_status" id="event_status" value="{{ old('event_status', $rallyEvent->event_status) }}" required>
                @if($errors->has('event_status'))
                    <span class="text-danger">{{ $errors->first('event_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.event_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_entries">{{ trans('cruds.rallyEvent.fields.max_entries') }}</label>
                <input class="form-control {{ $errors->has('max_entries') ? 'is-invalid' : '' }}" type="number" name="max_entries" id="max_entries" value="{{ old('max_entries', $rallyEvent->max_entries) }}" step="1">
                @if($errors->has('max_entries'))
                    <span class="text-danger">{{ $errors->first('max_entries') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.max_entries_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_early_fee">{{ trans('cruds.rallyEvent.fields.date_early_fee') }}</label>
                <input class="form-control date {{ $errors->has('date_early_fee') ? 'is-invalid' : '' }}" type="text" name="date_early_fee" id="date_early_fee" value="{{ old('date_early_fee', $rallyEvent->date_early_fee) }}">
                @if($errors->has('date_early_fee'))
                    <span class="text-danger">{{ $errors->first('date_early_fee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.date_early_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fee_currency">{{ trans('cruds.rallyEvent.fields.fee_currency') }}</label>
                <input class="form-control {{ $errors->has('fee_currency') ? 'is-invalid' : '' }}" type="text" name="fee_currency" id="fee_currency" value="{{ old('fee_currency', $rallyEvent->fee_currency) }}" required>
                @if($errors->has('fee_currency'))
                    <span class="text-danger">{{ $errors->first('fee_currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fee_normal">{{ trans('cruds.rallyEvent.fields.fee_normal') }}</label>
                <input class="form-control {{ $errors->has('fee_normal') ? 'is-invalid' : '' }}" type="number" name="fee_normal" id="fee_normal" value="{{ old('fee_normal', $rallyEvent->fee_normal) }}" step="0.01" required>
                @if($errors->has('fee_normal'))
                    <span class="text-danger">{{ $errors->first('fee_normal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_normal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_early">{{ trans('cruds.rallyEvent.fields.fee_early') }}</label>
                <input class="form-control {{ $errors->has('fee_early') ? 'is-invalid' : '' }}" type="number" name="fee_early" id="fee_early" value="{{ old('fee_early', $rallyEvent->fee_early) }}" step="0.01">
                @if($errors->has('fee_early'))
                    <span class="text-danger">{{ $errors->first('fee_early') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_early_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_open">{{ trans('cruds.rallyEvent.fields.fee_open') }}</label>
                <input class="form-control {{ $errors->has('fee_open') ? 'is-invalid' : '' }}" type="number" name="fee_open" id="fee_open" value="{{ old('fee_open', $rallyEvent->fee_open) }}" step="0.01">
                @if($errors->has('fee_open'))
                    <span class="text-danger">{{ $errors->first('fee_open') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_open_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_solo">{{ trans('cruds.rallyEvent.fields.fee_solo') }}</label>
                <input class="form-control {{ $errors->has('fee_solo') ? 'is-invalid' : '' }}" type="number" name="fee_solo" id="fee_solo" value="{{ old('fee_solo', $rallyEvent->fee_solo) }}" step="0.01">
                @if($errors->has('fee_solo'))
                    <span class="text-danger">{{ $errors->first('fee_solo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_solo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_new_member">{{ trans('cruds.rallyEvent.fields.fee_new_member') }}</label>
                <input class="form-control {{ $errors->has('fee_new_member') ? 'is-invalid' : '' }}" type="number" name="fee_new_member" id="fee_new_member" value="{{ old('fee_new_member', $rallyEvent->fee_new_member) }}" step="0.01">
                @if($errors->has('fee_new_member'))
                    <span class="text-danger">{{ $errors->first('fee_new_member') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_new_member_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_dinner_adult">{{ trans('cruds.rallyEvent.fields.fee_dinner_adult') }}</label>
                <input class="form-control {{ $errors->has('fee_dinner_adult') ? 'is-invalid' : '' }}" type="number" name="fee_dinner_adult" id="fee_dinner_adult" value="{{ old('fee_dinner_adult', $rallyEvent->fee_dinner_adult) }}" step="0.01">
                @if($errors->has('fee_dinner_adult'))
                    <span class="text-danger">{{ $errors->first('fee_dinner_adult') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_dinner_adult_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_adult_teen">{{ trans('cruds.rallyEvent.fields.fee_adult_teen') }}</label>
                <input class="form-control {{ $errors->has('fee_adult_teen') ? 'is-invalid' : '' }}" type="number" name="fee_adult_teen" id="fee_adult_teen" value="{{ old('fee_adult_teen', $rallyEvent->fee_adult_teen) }}" step="0.01">
                @if($errors->has('fee_adult_teen'))
                    <span class="text-danger">{{ $errors->first('fee_adult_teen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_adult_teen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_dinner_child">{{ trans('cruds.rallyEvent.fields.fee_dinner_child') }}</label>
                <input class="form-control {{ $errors->has('fee_dinner_child') ? 'is-invalid' : '' }}" type="number" name="fee_dinner_child" id="fee_dinner_child" value="{{ old('fee_dinner_child', $rallyEvent->fee_dinner_child) }}" step="0.01">
                @if($errors->has('fee_dinner_child'))
                    <span class="text-danger">{{ $errors->first('fee_dinner_child') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.fee_dinner_child_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mem_only">{{ trans('cruds.rallyEvent.fields.mem_only') }}</label>
                <input class="form-control {{ $errors->has('mem_only') ? 'is-invalid' : '' }}" type="text" name="mem_only" id="mem_only" value="{{ old('mem_only', $rallyEvent->mem_only) }}" required>
                @if($errors->has('mem_only'))
                    <span class="text-danger">{{ $errors->first('mem_only') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.mem_only_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_from_name">{{ trans('cruds.rallyEvent.fields.email_from_name') }}</label>
                <input class="form-control {{ $errors->has('email_from_name') ? 'is-invalid' : '' }}" type="text" name="email_from_name" id="email_from_name" value="{{ old('email_from_name', $rallyEvent->email_from_name) }}" required>
                @if($errors->has('email_from_name'))
                    <span class="text-danger">{{ $errors->first('email_from_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.email_from_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_from">{{ trans('cruds.rallyEvent.fields.email_from') }}</label>
                <input class="form-control {{ $errors->has('email_from') ? 'is-invalid' : '' }}" type="email" name="email_from" id="email_from" value="{{ old('email_from', $rallyEvent->email_from) }}" required>
                @if($errors->has('email_from'))
                    <span class="text-danger">{{ $errors->first('email_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.email_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_copy">{{ trans('cruds.rallyEvent.fields.email_copy') }}</label>
                <input class="form-control {{ $errors->has('email_copy') ? 'is-invalid' : '' }}" type="email" name="email_copy" id="email_copy" value="{{ old('email_copy', $rallyEvent->email_copy) }}">
                @if($errors->has('email_copy'))
                    <span class="text-danger">{{ $errors->first('email_copy') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.email_copy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_comment">{{ trans('cruds.rallyEvent.fields.event_comment') }}</label>
                <textarea class="form-control {{ $errors->has('event_comment') ? 'is-invalid' : '' }}" name="event_comment" id="event_comment">{{ old('event_comment', $rallyEvent->event_comment) }}</textarea>
                @if($errors->has('event_comment'))
                    <span class="text-danger">{{ $errors->first('event_comment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rallyEvent.fields.event_comment_helper') }}</span>
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