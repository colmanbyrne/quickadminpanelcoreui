<?php

namespace App\Http\Requests;

use App\Models\MembershipStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMembershipStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('membership_status_create');
    }

    public function rules()
    {
        return [
            'statusname' => [
                'string',
                'required',
            ],
        ];
    }
}
