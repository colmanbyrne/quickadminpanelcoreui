<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_create');
    }

    public function rules()
    {
        return [
            'member_no'              => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:members,member_no',
            ],
            'membership_category_id' => [
                'required',
                'integer',
            ],
            'surname'                => [
                'string',
                'required',
            ],
            'firstname'              => [
                'string',
                'required',
            ],
            'prefix'                 => [
                'string',
                'nullable',
            ],
            'partner'                => [
                'string',
                'nullable',
            ],
            'organisation_name'      => [
                'string',
                'nullable',
            ],
            'address_1'              => [
                'string',
                'required',
            ],
            'address_2'              => [
                'string',
                'nullable',
            ],
            'town'                   => [
                'string',
                'required',
            ],
            'county'                 => [
                'string',
                'nullable',
            ],
            'post_code'              => [
                'string',
                'required',
            ],
            'country'                => [
                'string',
                'required',
            ],
            'tel_no'                 => [
                'string',
                'nullable',
            ],
            'mob_no'                 => [
                'string',
                'required',
            ],
            'email_status'           => [
                'string',
                'required',
            ],
            'sms_status'             => [
                'string',
                'required',
            ],
            'mem_year'               => [
                'string',
                'required',
            ],
            'mem_fee'                => [
                'string',
                'nullable',
            ],
            'mem_fee_currency'       => [
                'string',
                'nullable',
            ],
            'pay_method'             => [
                'string',
                'nullable',
            ],
            'date_joined'            => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_renewed'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_card_issued'       => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_dd_issued'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_cancelled'         => [
                'string',
                'nullable',
            ],
            'member_role_id'         => [
                'required',
                'integer',
            ],
            'branches.*'             => [
                'integer',
            ],
            'branches'               => [
                'array',
            ],
            'updated_by'             => [
                'string',
                'nullable',
            ],
            'mem_status_id'          => [
                'required',
                'integer',
            ],
        ];
    }
}
