<?php

namespace App\Http\Requests;

use App\Models\RallyUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRallyUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rally_user_create');
    }

    public function rules()
    {
        return [
            'event_id'            => [
                'required',
                'integer',
            ],
            'rally_entry_name_id' => [
                'required',
                'integer',
            ],
            'member_no_id'        => [
                'required',
                'integer',
            ],
            'entry_type'          => [
                'string',
                'required',
            ],
            'entry_status'        => [
                'string',
                'required',
            ],
            'entry_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'entry_paid'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fee_due'             => [
                'required',
            ],
            'fee_currency'        => [
                'string',
                'required',
            ],
            'num_adults'          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'num_child_18'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'num_child_12'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'opt_dinner_adult'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'opt_dinner_teen'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'opt_dinner_child'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'vessel_name'         => [
                'string',
                'required',
            ],
            'vessel_length'       => [
                'numeric',
                'required',
            ],
            'vessel_draft'        => [
                'numeric',
            ],
            'vessel_air_draft'    => [
                'numeric',
            ],
            'vcruise_normal'      => [
                'numeric',
            ],
            'vcruise_max'         => [
                'numeric',
            ],
            'own_vessel'          => [
                'string',
                'nullable',
            ],
            'boat_number'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
