<?php

namespace App\Http\Requests;

use App\Models\AssetType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_type_edit');
    }

    public function rules()
    {
        return [
            'description' => [
                'string',
                'required',
                'unique:asset_types,description,' . request()->route('asset_type')->id,
            ],
        ];
    }
}
