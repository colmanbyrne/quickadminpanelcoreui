<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Branch;
use App\Models\Member;
use App\Models\MembershipCategory;
use App\Models\MembershipStatus;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembersController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $members = Member::with(['member_username', 'membership_category', 'member_role', 'branches', 'mem_status', 'created_by'])->get();

        $users = User::get();

        $membership_categories = MembershipCategory::get();

        $roles = Role::get();

        $branches = Branch::get();

        $membership_statuses = MembershipStatus::get();

        return view('frontend.members.index', compact('members', 'users', 'membership_categories', 'roles', 'branches', 'membership_statuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_usernames = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $membership_categories = MembershipCategory::all()->pluck('category_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branches = Branch::all()->pluck('shortname', 'id');

        $mem_statuses = MembershipStatus::all()->pluck('statusname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.members.create', compact('member_usernames', 'membership_categories', 'member_roles', 'branches', 'mem_statuses'));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());
        $member->branches()->sync($request->input('branches', []));

        return redirect()->route('frontend.members.index');
    }

    public function edit(Member $member)
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_usernames = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $membership_categories = MembershipCategory::all()->pluck('category_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branches = Branch::all()->pluck('shortname', 'id');

        $mem_statuses = MembershipStatus::all()->pluck('statusname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member->load('member_username', 'membership_category', 'member_role', 'branches', 'mem_status', 'created_by');

        return view('frontend.members.edit', compact('member_usernames', 'membership_categories', 'member_roles', 'branches', 'mem_statuses', 'member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());
        $member->branches()->sync($request->input('branches', []));

        return redirect()->route('frontend.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->load('member_username', 'membership_category', 'member_role', 'branches', 'mem_status', 'created_by');

        return view('frontend.members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberRequest $request)
    {
        Member::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
