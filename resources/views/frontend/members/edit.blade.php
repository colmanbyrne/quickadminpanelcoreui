@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.member.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.members.update", [$member->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="member_username_id">{{ trans('cruds.member.fields.member_username') }}</label>
                            <select class="form-control select2" name="member_username_id" id="member_username_id">
                                @foreach($member_usernames as $id => $member_username)
                                    <option value="{{ $id }}" {{ (old('member_username_id') ? old('member_username_id') : $member->member_username->id ?? '') == $id ? 'selected' : '' }}>{{ $member_username }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('member_username'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('member_username') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.member_username_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="member_no">{{ trans('cruds.member.fields.member_no') }}</label>
                            <input class="form-control" type="number" name="member_no" id="member_no" value="{{ old('member_no', $member->member_no) }}" step="1" required>
                            @if($errors->has('member_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('member_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.member_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="membership_category_id">{{ trans('cruds.member.fields.membership_category') }}</label>
                            <select class="form-control select2" name="membership_category_id" id="membership_category_id" required>
                                @foreach($membership_categories as $id => $membership_category)
                                    <option value="{{ $id }}" {{ (old('membership_category_id') ? old('membership_category_id') : $member->membership_category->id ?? '') == $id ? 'selected' : '' }}>{{ $membership_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('membership_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('membership_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.membership_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="surname">{{ trans('cruds.member.fields.surname') }}</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', $member->surname) }}" required>
                            @if($errors->has('surname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.surname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="firstname">{{ trans('cruds.member.fields.firstname') }}</label>
                            <input class="form-control" type="text" name="firstname" id="firstname" value="{{ old('firstname', $member->firstname) }}" required>
                            @if($errors->has('firstname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('firstname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.firstname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="prefix">{{ trans('cruds.member.fields.prefix') }}</label>
                            <input class="form-control" type="text" name="prefix" id="prefix" value="{{ old('prefix', $member->prefix) }}">
                            @if($errors->has('prefix'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('prefix') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.prefix_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="partner">{{ trans('cruds.member.fields.partner') }}</label>
                            <input class="form-control" type="text" name="partner" id="partner" value="{{ old('partner', $member->partner) }}">
                            @if($errors->has('partner'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.partner_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="organisation_name">{{ trans('cruds.member.fields.organisation_name') }}</label>
                            <input class="form-control" type="text" name="organisation_name" id="organisation_name" value="{{ old('organisation_name', $member->organisation_name) }}">
                            @if($errors->has('organisation_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('organisation_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.organisation_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address_1">{{ trans('cruds.member.fields.address_1') }}</label>
                            <input class="form-control" type="text" name="address_1" id="address_1" value="{{ old('address_1', $member->address_1) }}" required>
                            @if($errors->has('address_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.address_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address_2">{{ trans('cruds.member.fields.address_2') }}</label>
                            <input class="form-control" type="text" name="address_2" id="address_2" value="{{ old('address_2', $member->address_2) }}">
                            @if($errors->has('address_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.address_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="town">{{ trans('cruds.member.fields.town') }}</label>
                            <input class="form-control" type="text" name="town" id="town" value="{{ old('town', $member->town) }}" required>
                            @if($errors->has('town'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('town') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.town_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="county">{{ trans('cruds.member.fields.county') }}</label>
                            <input class="form-control" type="text" name="county" id="county" value="{{ old('county', $member->county) }}">
                            @if($errors->has('county'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('county') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.county_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="post_code">{{ trans('cruds.member.fields.post_code') }}</label>
                            <input class="form-control" type="text" name="post_code" id="post_code" value="{{ old('post_code', $member->post_code) }}" required>
                            @if($errors->has('post_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('post_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.post_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="country">{{ trans('cruds.member.fields.country') }}</label>
                            <input class="form-control" type="text" name="country" id="country" value="{{ old('country', $member->country) }}" required>
                            @if($errors->has('country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tel_no">{{ trans('cruds.member.fields.tel_no') }}</label>
                            <input class="form-control" type="text" name="tel_no" id="tel_no" value="{{ old('tel_no', $member->tel_no) }}">
                            @if($errors->has('tel_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tel_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.tel_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mob_no">{{ trans('cruds.member.fields.mob_no') }}</label>
                            <input class="form-control" type="text" name="mob_no" id="mob_no" value="{{ old('mob_no', $member->mob_no) }}" required>
                            @if($errors->has('mob_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mob_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.mob_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email_2">{{ trans('cruds.member.fields.email_2') }}</label>
                            <input class="form-control" type="email" name="email_2" id="email_2" value="{{ old('email_2', $member->email_2) }}">
                            @if($errors->has('email_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.email_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email_status">{{ trans('cruds.member.fields.email_status') }}</label>
                            <input class="form-control" type="text" name="email_status" id="email_status" value="{{ old('email_status', $member->email_status) }}" required>
                            @if($errors->has('email_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.email_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sms_status">{{ trans('cruds.member.fields.sms_status') }}</label>
                            <input class="form-control" type="text" name="sms_status" id="sms_status" value="{{ old('sms_status', $member->sms_status) }}" required>
                            @if($errors->has('sms_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sms_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.sms_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mem_year">{{ trans('cruds.member.fields.mem_year') }}</label>
                            <input class="form-control" type="text" name="mem_year" id="mem_year" value="{{ old('mem_year', $member->mem_year) }}" required>
                            @if($errors->has('mem_year'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mem_year') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.mem_year_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mem_fee">{{ trans('cruds.member.fields.mem_fee') }}</label>
                            <input class="form-control" type="text" name="mem_fee" id="mem_fee" value="{{ old('mem_fee', $member->mem_fee) }}">
                            @if($errors->has('mem_fee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mem_fee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.mem_fee_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mem_fee_currency">{{ trans('cruds.member.fields.mem_fee_currency') }}</label>
                            <input class="form-control" type="text" name="mem_fee_currency" id="mem_fee_currency" value="{{ old('mem_fee_currency', $member->mem_fee_currency) }}">
                            @if($errors->has('mem_fee_currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mem_fee_currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.mem_fee_currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pay_method">{{ trans('cruds.member.fields.pay_method') }}</label>
                            <input class="form-control" type="text" name="pay_method" id="pay_method" value="{{ old('pay_method', $member->pay_method) }}">
                            @if($errors->has('pay_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pay_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.pay_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_joined">{{ trans('cruds.member.fields.date_joined') }}</label>
                            <input class="form-control date" type="text" name="date_joined" id="date_joined" value="{{ old('date_joined', $member->date_joined) }}">
                            @if($errors->has('date_joined'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_joined') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.date_joined_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_renewed">{{ trans('cruds.member.fields.date_renewed') }}</label>
                            <input class="form-control date" type="text" name="date_renewed" id="date_renewed" value="{{ old('date_renewed', $member->date_renewed) }}">
                            @if($errors->has('date_renewed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_renewed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.date_renewed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_card_issued">{{ trans('cruds.member.fields.date_card_issued') }}</label>
                            <input class="form-control date" type="text" name="date_card_issued" id="date_card_issued" value="{{ old('date_card_issued', $member->date_card_issued) }}">
                            @if($errors->has('date_card_issued'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_card_issued') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.date_card_issued_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_dd_issued">{{ trans('cruds.member.fields.date_dd_issued') }}</label>
                            <input class="form-control date" type="text" name="date_dd_issued" id="date_dd_issued" value="{{ old('date_dd_issued', $member->date_dd_issued) }}">
                            @if($errors->has('date_dd_issued'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_dd_issued') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.date_dd_issued_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_cancelled">{{ trans('cruds.member.fields.date_cancelled') }}</label>
                            <input class="form-control" type="text" name="date_cancelled" id="date_cancelled" value="{{ old('date_cancelled', $member->date_cancelled) }}">
                            @if($errors->has('date_cancelled'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_cancelled') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.date_cancelled_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mem_notes">{{ trans('cruds.member.fields.mem_notes') }}</label>
                            <textarea class="form-control" name="mem_notes" id="mem_notes">{{ old('mem_notes', $member->mem_notes) }}</textarea>
                            @if($errors->has('mem_notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mem_notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.mem_notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="member_role_id">{{ trans('cruds.member.fields.member_role') }}</label>
                            <select class="form-control select2" name="member_role_id" id="member_role_id" required>
                                @foreach($member_roles as $id => $member_role)
                                    <option value="{{ $id }}" {{ (old('member_role_id') ? old('member_role_id') : $member->member_role->id ?? '') == $id ? 'selected' : '' }}>{{ $member_role }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('member_role'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('member_role') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.member_role_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="branches">{{ trans('cruds.member.fields.branch') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="branches[]" id="branches" multiple>
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ (in_array($id, old('branches', [])) || $member->branches->contains($id)) ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branches'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branches') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.branch_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="updated_by">{{ trans('cruds.member.fields.updated_by') }}</label>
                            <input class="form-control" type="text" name="updated_by" id="updated_by" value="{{ old('updated_by', $member->updated_by) }}">
                            @if($errors->has('updated_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('updated_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.updated_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mem_status_id">{{ trans('cruds.member.fields.mem_status') }}</label>
                            <select class="form-control select2" name="mem_status_id" id="mem_status_id" required>
                                @foreach($mem_statuses as $id => $mem_status)
                                    <option value="{{ $id }}" {{ (old('mem_status_id') ? old('mem_status_id') : $member->mem_status->id ?? '') == $id ? 'selected' : '' }}>{{ $mem_status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mem_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mem_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.member.fields.mem_status_helper') }}</span>
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