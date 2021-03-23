<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetTypeRequest;
use App\Http\Requests\StoreAssetTypeRequest;
use App\Http\Requests\UpdateAssetTypeRequest;
use App\Models\AssetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetTypes = AssetType::all();

        return view('admin.assetTypes.index', compact('assetTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetTypes.create');
    }

    public function store(StoreAssetTypeRequest $request)
    {
        $assetType = AssetType::create($request->all());

        return redirect()->route('admin.asset-types.index');
    }

    public function edit(AssetType $assetType)
    {
        abort_if(Gate::denies('asset_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetTypes.edit', compact('assetType'));
    }

    public function update(UpdateAssetTypeRequest $request, AssetType $assetType)
    {
        $assetType->update($request->all());

        return redirect()->route('admin.asset-types.index');
    }

    public function show(AssetType $assetType)
    {
        abort_if(Gate::denies('asset_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetTypes.show', compact('assetType'));
    }

    public function destroy(AssetType $assetType)
    {
        abort_if(Gate::denies('asset_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetType->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetTypeRequest $request)
    {
        AssetType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
