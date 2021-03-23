@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.membershipCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.membership-categories.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="category_type">{{ trans('cruds.membershipCategory.fields.category_type') }}</label>
                            <input class="form-control" type="text" name="category_type" id="category_type" value="{{ old('category_type', '') }}" required>
                            @if($errors->has('category_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.membershipCategory.fields.category_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="category_name">{{ trans('cruds.membershipCategory.fields.category_name') }}</label>
                            <input class="form-control" type="text" name="category_name" id="category_name" value="{{ old('category_name', '') }}" required>
                            @if($errors->has('category_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.membershipCategory.fields.category_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mem_fee">{{ trans('cruds.membershipCategory.fields.mem_fee') }}</label>
                            <input class="form-control" type="number" name="mem_fee" id="mem_fee" value="{{ old('mem_fee', '') }}" step="0.01">
                            @if($errors->has('mem_fee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mem_fee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.membershipCategory.fields.mem_fee_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fee_add">{{ trans('cruds.membershipCategory.fields.fee_add') }}</label>
                            <input class="form-control" type="number" name="fee_add" id="fee_add" value="{{ old('fee_add', '') }}" step="0.01">
                            @if($errors->has('fee_add'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fee_add') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.membershipCategory.fields.fee_add_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="country_code">{{ trans('cruds.membershipCategory.fields.country_code') }}</label>
                            <input class="form-control" type="text" name="country_code" id="country_code" value="{{ old('country_code', '') }}">
                            @if($errors->has('country_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.membershipCategory.fields.country_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="curr_symbol">{{ trans('cruds.membershipCategory.fields.curr_symbol') }}</label>
                            <input class="form-control" type="text" name="curr_symbol" id="curr_symbol" value="{{ old('curr_symbol', '') }}">
                            @if($errors->has('curr_symbol'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('curr_symbol') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.membershipCategory.fields.curr_symbol_helper') }}</span>
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