<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBranchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('branch_create');
    }

    public function rules()
    {
        return [
            'branch_no'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'shortname'           => [
                'string',
                'required',
                'unique:branches',
            ],
            'longname'            => [
                'string',
                'required',
                'unique:branches',
            ],
            'branch_country'      => [
                'string',
                'required',
            ],
            'branch_currency'     => [
                'string',
                'required',
            ],
            'branch_secretary_id' => [
                'required',
                'integer',
            ],
            'branch_treasurer_id' => [
                'required',
                'integer',
            ],
            'branch_chair_id'     => [
                'required',
                'integer',
            ],
        ];
    }
}
