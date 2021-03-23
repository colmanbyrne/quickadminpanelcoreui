<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMembershipCategoryRequest;
use App\Http\Requests\StoreMembershipCategoryRequest;
use App\Http\Requests\UpdateMembershipCategoryRequest;
use App\Models\MembershipCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembershipCategoriesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('membership_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipCategories = MembershipCategory::all();

        return view('frontend.membershipCategories.index', compact('membershipCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('membership_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.membershipCategories.create');
    }

    public function store(StoreMembershipCategoryRequest $request)
    {
        $membershipCategory = MembershipCategory::create($request->all());

        return redirect()->route('frontend.membership-categories.index');
    }

    public function edit(MembershipCategory $membershipCategory)
    {
        abort_if(Gate::denies('membership_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.membershipCategories.edit', compact('membershipCategory'));
    }

    public function update(UpdateMembershipCategoryRequest $request, MembershipCategory $membershipCategory)
    {
        $membershipCategory->update($request->all());

        return redirect()->route('frontend.membership-categories.index');
    }

    public function show(MembershipCategory $membershipCategory)
    {
        abort_if(Gate::denies('membership_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipCategory->load('membershipCategoryMembers');

        return view('frontend.membershipCategories.show', compact('membershipCategory'));
    }

    public function destroy(MembershipCategory $membershipCategory)
    {
        abort_if(Gate::denies('membership_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMembershipCategoryRequest $request)
    {
        MembershipCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
