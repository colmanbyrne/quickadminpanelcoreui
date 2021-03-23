<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetTypeRequest;
use App\Http\Requests\UpdateAssetTypeRequest;
use App\Http\Resources\Admin\AssetTypeResource;
use App\Models\AssetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetTypeResource(AssetType::all());
    }

    public function store(StoreAssetTypeRequest $request)
    {
        $assetType = AssetType::create($request->all());

        return (new AssetTypeResource($assetType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssetType $assetType)
    {
        abort_if(Gate::denies('asset_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetTypeResource($assetType);
    }

    public function update(UpdateAssetTypeRequest $request, AssetType $assetType)
    {
        $assetType->update($request->all());

        return (new AssetTypeResource($assetType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssetType $assetType)
    {
        abort_if(Gate::denies('asset_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
