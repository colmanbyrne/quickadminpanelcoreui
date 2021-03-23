@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.incomeCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.income-categories.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.incomeCategory.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.incomeCategory.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="income_category_id">{{ trans('cruds.incomeCategory.fields.income_category') }}</label>
                            <select class="form-control select2" name="income_category_id" id="income_category_id">
                                @foreach($income_categories as $id => $income_category)
                                    <option value="{{ $id }}" {{ old('income_category_id') == $id ? 'selected' : '' }}>{{ $income_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('income_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('income_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.incomeCategory.fields.income_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="branch_id">{{ trans('cruds.incomeCategory.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id">
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.incomeCategory.fields.branch_helper') }}</span>
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