@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.membershipStatus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.membership-statuses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="statusname">{{ trans('cruds.membershipStatus.fields.statusname') }}</label>
                <input class="form-control {{ $errors->has('statusname') ? 'is-invalid' : '' }}" type="text" name="statusname" id="statusname" value="{{ old('statusname', '') }}" required>
                @if($errors->has('statusname'))
                    <span class="text-danger">{{ $errors->first('statusname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.membershipStatus.fields.statusname_helper') }}</span>
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