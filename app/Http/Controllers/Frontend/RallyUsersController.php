<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRallyUserRequest;
use App\Http\Requests\StoreRallyUserRequest;
use App\Http\Requests\UpdateRallyUserRequest;
use App\Models\Member;
use App\Models\RallyEvent;
use App\Models\RallyUser;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RallyUsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rally_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyUsers = RallyUser::with(['event', 'rally_entry_name', 'member_no'])->get();

        return view('frontend.rallyUsers.index', compact('rallyUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('rally_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = RallyEvent::all()->pluck('event_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rally_entry_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_nos = Member::all()->pluck('member_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.rallyUsers.create', compact('events', 'rally_entry_names', 'member_nos'));
    }

    public function store(StoreRallyUserRequest $request)
    {
        $rallyUser = RallyUser::create($request->all());

        return redirect()->route('frontend.rally-users.index');
    }

    public function edit(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = RallyEvent::all()->pluck('event_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rally_entry_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_nos = Member::all()->pluck('member_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rallyUser->load('event', 'rally_entry_name', 'member_no');

        return view('frontend.rallyUsers.edit', compact('events', 'rally_entry_names', 'member_nos', 'rallyUser'));
    }

    public function update(UpdateRallyUserRequest $request, RallyUser $rallyUser)
    {
        $rallyUser->update($request->all());

        return redirect()->route('frontend.rally-users.index');
    }

    public function show(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyUser->load('event', 'rally_entry_name', 'member_no');

        return view('frontend.rallyUsers.show', compact('rallyUser'));
    }

    public function destroy(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyRallyUserRequest $request)
    {
        RallyUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
