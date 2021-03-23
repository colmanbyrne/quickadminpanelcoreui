<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRallyEventRequest;
use App\Http\Requests\StoreRallyEventRequest;
use App\Http\Requests\UpdateRallyEventRequest;
use App\Models\RallyEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RallyEventsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('rally_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyEvents = RallyEvent::all();

        return view('frontend.rallyEvents.index', compact('rallyEvents'));
    }

    public function create()
    {
        abort_if(Gate::denies('rally_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.rallyEvents.create');
    }

    public function store(StoreRallyEventRequest $request)
    {
        $rallyEvent = RallyEvent::create($request->all());

        return redirect()->route('frontend.rally-events.index');
    }

    public function edit(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.rallyEvents.edit', compact('rallyEvent'));
    }

    public function update(UpdateRallyEventRequest $request, RallyEvent $rallyEvent)
    {
        $rallyEvent->update($request->all());

        return redirect()->route('frontend.rally-events.index');
    }

    public function show(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.rallyEvents.show', compact('rallyEvent'));
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
