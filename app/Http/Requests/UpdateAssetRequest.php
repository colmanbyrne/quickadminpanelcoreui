<?php

namespace App\Http\Requests;

use App\Models\Asset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_edit');
    }

    public function rules()
    {
        return [
            'asset_branch_id' => [
                'required',
                'integer',
            ],
            'category_id'     => [
                'required',
                'integer',
            ],
            'serial_number'   => [
                'string',
                'nullable',
            ],
            'name'            => [
                'string',
                'required',
            ],
            'status_id'       => [
                'required',
                'integer',
            ],
            'location_id'     => [
                'required',
                'integer',
            ],
            'asset_year'      => [
                'string',
                'required',
            ],
            'date_purchased'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_value'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'rep_value_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
