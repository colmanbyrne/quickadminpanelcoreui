<?php

namespace App\Http\Requests;

use App\Models\MembershipCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMembershipCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('membership_category_create');
    }

    public function rules()
    {
        return [
            'category_type' => [
                'string',
                'required',
            ],
            'category_name' => [
                'string',
                'required',
            ],
            'country_code'  => [
                'string',
                'nullable',
            ],
            'curr_symbol'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
