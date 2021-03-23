<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipStatusRequest;
use App\Http\Requests\UpdateMembershipStatusRequest;
use App\Http\Resources\Admin\MembershipStatusResource;
use App\Models\MembershipStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembershipStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipStatusResource(MembershipStatus::all());
    }

    public function store(StoreMembershipStatusRequest $request)
    {
        $membershipStatus = MembershipStatus::create($request->all());

        return (new MembershipStatusResource($membershipStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembershipStatus $membershipStatus)
    {
        abort_if(Gate::denies('membership_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipStatusResource($membershipStatus);
    }

    public function update(UpdateMembershipStatusRequest $request, MembershipStatus $membershipStatus)
    {
        $membershipStatus->update($request->all());

        return (new MembershipStatusResource($membershipStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembershipStatus $membershipStatus)
    {
        abort_if(Gate::denies('membership_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
