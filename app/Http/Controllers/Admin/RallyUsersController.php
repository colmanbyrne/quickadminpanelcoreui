<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class RallyUsersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('rally_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RallyUser::with(['event', 'rally_entry_name', 'member_no'])->select(sprintf('%s.*', (new RallyUser)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'rally_user_show';
                $editGate      = 'rally_user_edit';
                $deleteGate    = 'rally_user_delete';
                $crudRoutePart = 'rally-users';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('event_event_name', function ($row) {
                return $row->event ? $row->event->event_name : '';
            });

            $table->addColumn('rally_entry_name_name', function ($row) {
                return $row->rally_entry_name ? $row->rally_entry_name->name : '';
            });

            $table->editColumn('rally_entry_name.email', function ($row) {
                return $row->rally_entry_name ? (is_string($row->rally_entry_name) ? $row->rally_entry_name : $row->rally_entry_name->email) : '';
            });
            $table->addColumn('member_no_member_no', function ($row) {
                return $row->member_no ? $row->member_no->member_no : '';
            });

            $table->editColumn('member_no.surname', function ($row) {
                return $row->member_no ? (is_string($row->member_no) ? $row->member_no : $row->member_no->surname) : '';
            });
            $table->editColumn('member_no.firstname', function ($row) {
                return $row->member_no ? (is_string($row->member_no) ? $row->member_no : $row->member_no->firstname) : '';
            });
            $table->editColumn('entry_type', function ($row) {
                return $row->entry_type ? $row->entry_type : "";
            });
            $table->editColumn('entry_status', function ($row) {
                return $row->entry_status ? $row->entry_status : "";
            });

            $table->editColumn('fee_due', function ($row) {
                return $row->fee_due ? $row->fee_due : "";
            });
            $table->editColumn('fee_paid', function ($row) {
                return $row->fee_paid ? $row->fee_paid : "";
            });
            $table->editColumn('fee_currency', function ($row) {
                return $row->fee_currency ? $row->fee_currency : "";
            });
            $table->editColumn('entry_notes', function ($row) {
                return $row->entry_notes ? $row->entry_notes : "";
            });
            $table->editColumn('entry_comment', function ($row) {
                return $row->entry_comment ? $row->entry_comment : "";
            });
            $table->editColumn('num_adults', function ($row) {
                return $row->num_adults ? $row->num_adults : "";
            });
            $table->editColumn('num_child_18', function ($row) {
                return $row->num_child_18 ? $row->num_child_18 : "";
            });
            $table->editColumn('num_child_12', function ($row) {
                return $row->num_child_12 ? $row->num_child_12 : "";
            });
            $table->editColumn('opt_dinner_adult', function ($row) {
                return $row->opt_dinner_adult ? $row->opt_dinner_adult : "";
            });
            $table->editColumn('opt_dinner_teen', function ($row) {
                return $row->opt_dinner_teen ? $row->opt_dinner_teen : "";
            });
            $table->editColumn('opt_dinner_child', function ($row) {
                return $row->opt_dinner_child ? $row->opt_dinner_child : "";
            });
            $table->editColumn('vessel_name', function ($row) {
                return $row->vessel_name ? $row->vessel_name : "";
            });
            $table->editColumn('vessel_length', function ($row) {
                return $row->vessel_length ? $row->vessel_length : "";
            });
            $table->editColumn('vessel_draft', function ($row) {
                return $row->vessel_draft ? $row->vessel_draft : "";
            });
            $table->editColumn('vessel_air_draft', function ($row) {
                return $row->vessel_air_draft ? $row->vessel_air_draft : "";
            });
            $table->editColumn('vcruise_normal', function ($row) {
                return $row->vcruise_normal ? $row->vcruise_normal : "";
            });
            $table->editColumn('vcruise_max', function ($row) {
                return $row->vcruise_max ? $row->vcruise_max : "";
            });
            $table->editColumn('own_vessel', function ($row) {
                return $row->own_vessel ? $row->own_vessel : "";
            });
            $table->editColumn('boat_number', function ($row) {
                return $row->boat_number ? $row->boat_number : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'event', 'rally_entry_name', 'member_no']);

            return $table->make(true);
        }

        return view('admin.rallyUsers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rally_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = RallyEvent::all()->pluck('event_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rally_entry_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_nos = Member::all()->pluck('member_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rallyUsers.create', compact('events', 'rally_entry_names', 'member_nos'));
    }

    public function store(StoreRallyUserRequest $request)
    {
        $rallyUser = RallyUser::create($request->all());

        return redirect()->route('admin.rally-users.index');
    }

    public function edit(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = RallyEvent::all()->pluck('event_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rally_entry_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_nos = Member::all()->pluck('member_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rallyUser->load('event', 'rally_entry_name', 'member_no');

        return view('admin.rallyUsers.edit', compact('events', 'rally_entry_names', 'member_nos', 'rallyUser'));
    }

    public function update(UpdateRallyUserRequest $request, RallyUser $rallyUser)
    {
        $rallyUser->update($request->all());

        return redirect()->route('admin.rally-users.index');
    }

    public function show(RallyUser $rallyUser)
    {
        abort_if(Gate::denies('rally_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyUser->load('event', 'rally_entry_name', 'member_no');

        return view('admin.rallyUsers.show', compact('rallyUser'));
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
