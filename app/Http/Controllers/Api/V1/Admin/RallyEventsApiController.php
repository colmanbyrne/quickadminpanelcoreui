<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRallyEventRequest;
use App\Http\Requests\UpdateRallyEventRequest;
use App\Http\Resources\Admin\RallyEventResource;
use App\Models\RallyEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RallyEventsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rally_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RallyEventResource(RallyEvent::all());
    }

    public function store(StoreRallyEventRequest $request)
    {
        $rallyEvent = RallyEvent::create($request->all());

        return (new RallyEventResource($rallyEvent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RallyEventResource($rallyEvent);
    }

    public function update(UpdateRallyEventRequest $request, RallyEvent $rallyEvent)
    {
        $rallyEvent->update($request->all());

        return (new RallyEventResource($rallyEvent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RallyEvent $rallyEvent)
    {
        abort_if(Gate::denies('rally_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rallyEvent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
