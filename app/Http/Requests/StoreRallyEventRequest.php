<?php

namespace App\Http\Requests;

use App\Models\RallyEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRallyEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rally_event_create');
    }

    public function rules()
    {
        return [
            'event_name'      => [
                'string',
                'required',
            ],
            'event_organiser' => [
                'string',
                'required',
            ],
            'event_type'      => [
                'string',
                'required',
            ],
            'date_start'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_end'        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'event_status'    => [
                'string',
                'required',
            ],
            'max_entries'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_early_fee'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fee_currency'    => [
                'string',
                'required',
            ],
            'fee_normal'      => [
                'required',
            ],
            'mem_only'        => [
                'string',
                'required',
            ],
            'email_from_name' => [
                'string',
                'required',
            ],
            'email_from'      => [
                'required',
            ],
        ];
    }
}
