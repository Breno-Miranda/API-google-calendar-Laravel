<?php

namespace App\Http\Controllers;

use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Schedule;

class SchedulesController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Schedule::with('Schedule')->get());
        } catch (\Throwable $th) {
            return response()->json(['Error list event my calendar'], 401);
        }
    }


    public function store(Request $request)
    {

        $_requestData = $request->only('title', 'date_start', 'date_finish');

        try {
            $_event = new Event;
            $_event->name = $_requestData->title;
            $_event->startDateTime = $_requestData->date_start;
            $_event->endDateTime = $_requestData->date_finish;

            $_schedule = new Schedule();
            $_schedule->fill($request->all());
            $_schedule->save();

            if( $_event->save() ):
                return response()->json($_schedule, 201);
            else:
                return response()->json(['Error! Do not create event. try again!'], 401);
            endif;
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['Error the for store the event of google calendar'], 401);
        }
        
    }
}
