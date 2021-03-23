@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.membershipStatus.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.membership-statuses.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="statusname">{{ trans('cruds.membershipStatus.fields.statusname') }}</label>
                            <input class="form-control" type="text" name="statusname" id="statusname" value="{{ old('statusname', '') }}" required>
                            @if($errors->has('statusname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('statusname') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection