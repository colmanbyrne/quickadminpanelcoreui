<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRallyEventRequest;
use App\Http\Requests\StoreRallyEventRequest;
use App\Http\Requests\UpdateRallyEventRequest;
use App\Models\RallyEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RallyEventsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('rally_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RallyEvent::query()->select(sprintf('%s.*', (new RallyEvent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'rally_event_show';
                $editGate      = 'rally_event_edit';
                $deleteGate    = 'rally_event_delete';
                $crudRoutePart = 'rally-events';

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
            $table->editColumn('event_name', function ($row) {
                return $row->event_name ? $row->event_name : "";
            });
            $table->editColumn('event_organiser', function ($row) {
                return $row->event_organiser ? $row->event_organiser : "";
            });
            $table->editColumn('event_type', function ($row) {
                return $row->event_type ? $row->event_type : "";
            });

            $table->editColumn('event_status', function ($row) {
                return $row->event_status ? $row->event_status : "";
            });
            $table->editColumn('max_entries', function ($row) {
                return $row->max_entries ? $row->max_entries : "";
            });

            $table->editColumn('fee_currency', function ($row) {
                return $row->fee_currency ? $row->fee_currency : "";
            });
            $table->editColumn('fee_normal', function ($row) {
                return $row->fee_normal ? $row->fee_normal : "";
            });
            $table->editColumn('fee_early', function ($row) {
                return $row->fee_early ? $row->fee_early : "";
            });
            $table->editColumn('fee_open', function ($row) {
                return $row->fee_open ? $row->fee_open : "";
            });
            $table->editColumn('fee_solo', function ($row) {
                return $row->fee_solo ? $row->fee_solo : "";
            });
            $table->editColumn('fee_new_member', function ($row) {
                return $row->fee_new_member ? $row->fee_new_member : "";
            });
            $table->editColumn('fee_dinner_adult', function ($row) {
                return $row->fee_dinner_adult ? $row->fee_dinner_adult : "";
            });
            $table->editColumn('fee_adult_teen', function ($row) {
                return $row->fee_adult_teen ? $row->fee_adult_teen : "";
            });
            $table->editColumn('fee_dinner_child', function ($row) {
                return $row->fee_dinner_child ? $row->fee_dinner_child : "";
            });
            $table->editColumn('mem_only', function ($row) {
                return $row->mem_only ? $row->mem_only : "";
            });
            $table->editColumn('email_from_name', function ($row) {
                return $row->email_from_name ? $row->email_from_name : "";
            });
            $table->editColumn('email_from', function ($row) {
                return $row->email_from ? $row->email_from : "";
            });
            $table->editColumn('email_copy', function ($row) {
                return $row->email_copy ? $row->email_copy : "";
            });
            $table->editColumn('event_comment', function ($row) {
                return $row->event_comment ? $row->event_comment : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.rallyEvents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rally_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rallyEvents.create');
    }

    public function store(StoreRallyEventRequest $request)
    {
        $rallyEvent = RallyEvent::create($request->all());

        return redirect()->route('admin.rally-events.index');
    }

    public function edit(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rallyEvents.edit', compact('rallyEvent'));
    }

    public function update(UpdateRallyEventRequest $request, RallyEvent $rallyEvent)
    {
        $rallyEvent->update($request->all());

        return redirect()->route('admin.rally-events.index');
    }

    public function show(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rallyEvents.show', compact('rallyEvent'));
    }

    public function destroy(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyEvent->delete();

        return back();
    }

    public function massDestroy(MassDestroyRallyEventRequest $request)
    {
        RallyEvent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
