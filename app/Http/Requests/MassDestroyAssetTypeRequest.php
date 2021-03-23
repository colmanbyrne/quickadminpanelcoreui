<?php

namespace App\Http\Requests;

use App\Models\AssetType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_types,id',
        ];
    }
}
