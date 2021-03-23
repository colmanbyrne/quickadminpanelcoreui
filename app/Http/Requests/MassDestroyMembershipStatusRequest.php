<?php

namespace App\Http\Requests;

use App\Models\MembershipStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMembershipStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('membership_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:membership_statuses,id',
        ];
    }
}
