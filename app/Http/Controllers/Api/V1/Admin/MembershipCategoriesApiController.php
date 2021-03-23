<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipCategoryRequest;
use App\Http\Requests\UpdateMembershipCategoryRequest;
use App\Http\Resources\Admin\MembershipCategoryResource;
use App\Models\MembershipCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembershipCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipCategoryResource(MembershipCategory::all());
    }

    public function store(StoreMembershipCategoryRequest $request)
    {
        $membershipCategory = MembershipCategory::create($request->all());

        return (new MembershipCategoryResource($membershipCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembershipCategory $membershipCategory)
    {
        abort_if(Gate::denies('membership_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipCategoryResource($membershipCategory);
    }

    public function update(UpdateMembershipCategoryRequest $request, MembershipCategory $membershipCategory)
    {
        $membershipCategory->update($request->all());

        return (new MembershipCategoryResource($membershipCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembershipCategory $membershipCategory)
    {
        abort_if(Gate::denies('membership_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
