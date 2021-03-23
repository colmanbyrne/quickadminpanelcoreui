<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRallyUserRequest;
use App\Http\Requests\UpdateRallyUserRequest;
use App\Http\Resources\Admin\RallyUserResource;
use App\Models\RallyUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RallyUsersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rally_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RallyUserResource(RallyUser::with(['event', 'rally_entry_name', 'member_no'])->get());
    }

    public function store(StoreRallyUserRequest $request)
    {
        $rallyUser = RallyUser::create($request->all());

        return (new RallyUserResource($rallyUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RallyUserResource($rallyUser->load(['event', 'rally_entry_name', 'member_no']));
    }

    public function update(UpdateRallyUserRequest $request, RallyUser $rallyUser)
    {
        $rallyUser->update($request->all());

        return (new RallyUserResource($rallyUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
