<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\RallyEvent',
            'date_field' => 'date_start',
            'field'      => 'event_name',
            'prefix'     => 'Rally',
            'suffix'     => 'starts',
            'route'      => 'admin.rally-events.edit',
        ],
        [
            'model'      => '\App\Models\RallyEvent',
            'date_field' => 'date_end',
            'field'      => 'event_name',
            'prefix'     => 'Rally',
            'suffix'     => 'ends',
            'route'      => 'admin.rally-events.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
