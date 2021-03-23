@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.membershipCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.membership-categories.update", [$membershipCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="category_type">{{ trans('cruds.membershipCategory.fields.category_type') }}</label>
                <input class="form-control {{ $errors->has('category_type') ? 'is-invalid' : '' }}" type="text" name="category_type" id="category_type" value="{{ old('category_type', $membershipCategory->category_type) }}" required>
                @if($errors->has('category_type'))
                    <span class="text-danger">{{ $errors->first('category_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.membershipCategory.fields.category_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_name">{{ trans('cruds.membershipCategory.fields.category_name') }}</label>
                <input class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}" type="text" name="category_name" id="category_name" value="{{ old('category_name', $membershipCategory->category_name) }}" required>
                @if($errors->has('category_name'))
                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.membershipCategory.fields.category_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mem_fee">{{ trans('cruds.membershipCategory.fields.mem_fee') }}</label>
                <input class="form-control {{ $errors->has('mem_fee') ? 'is-invalid' : '' }}" type="number" name="mem_fee" id="mem_fee" value="{{ old('mem_fee', $membershipCategory->mem_fee) }}" step="0.01">
                @if($errors->has('mem_fee'))
                    <span class="text-danger">{{ $errors->first('mem_fee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.membershipCategory.fields.mem_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_add">{{ trans('cruds.membershipCategory.fields.fee_add') }}</label>
                <input class="form-control {{ $errors->has('fee_add') ? 'is-invalid' : '' }}" type="number" name="fee_add" id="fee_add" value="{{ old('fee_add', $membershipCategory->fee_add) }}" step="0.01">
                @if($errors->has('fee_add'))
                    <span class="text-danger">{{ $errors->first('fee_add') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.membershipCategory.fields.fee_add_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_code">{{ trans('cruds.membershipCategory.fields.country_code') }}</label>
                <input class="form-control {{ $errors->has('country_code') ? 'is-invalid' : '' }}" type="text" name="country_code" id="country_code" value="{{ old('country_code', $membershipCategory->country_code) }}">
                @if($errors->has('country_code'))
                    <span class="text-danger">{{ $errors->first('country_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.membershipCategory.fields.country_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="curr_symbol">{{ trans('cruds.membershipCategory.fields.curr_symbol') }}</label>
                <input class="form-control {{ $errors->has('curr_symbol') ? 'is-invalid' : '' }}" type="text" name="curr_symbol" id="curr_symbol" value="{{ old('curr_symbol', $membershipCategory->curr_symbol) }}">
                @if($errors->has('curr_symbol'))
                    <span class="text-danger">{{ $errors->first('curr_symbol') }}</span>
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



@endsection