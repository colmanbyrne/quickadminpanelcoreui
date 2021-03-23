<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMembershipStatusRequest;
use App\Http\Requests\StoreMembershipStatusRequest;
use App\Http\Requests\UpdateMembershipStatusRequest;
use App\Models\MembershipStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembershipStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipStatuses = MembershipStatus::all();

        return view('admin.membershipStatuses.index', compact('membershipStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('membership_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershipStatuses.create');
    }

    public function store(StoreMembershipStatusRequest $request)
    {
        $membershipStatus = MembershipStatus::create($request->all());

        return redirect()->route('admin.membership-statuses.index');
    }

    public function edit(MembershipStatus $membershipStatus)
    {
        abort_if(Gate::denies('membership_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershipStatuses.edit', compact('membershipStatus'));
    }

    public function update(UpdateMembershipStatusRequest $request, MembershipStatus $membershipStatus)
    {
        $membershipStatus->update($request->all());

        return redirect()->route('admin.membership-statuses.index');
    }

    public function show(MembershipStatus $membershipStatus)
    {
        abort_if(Gate::denies('membership_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershipStatuses.show', compact('membershipStatus'));
    }

    public function destroy(MembershipStatus $membershipStatus)
    {
        abort_if(Gate::denies('membership_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyMembershipStatusRequest $request)
    {
        MembershipStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
