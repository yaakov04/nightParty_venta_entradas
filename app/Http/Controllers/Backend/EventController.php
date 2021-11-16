<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(9);
        return view('admin-event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-event-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $datetime = $request->date .' '. $request->time;
        $event = Event::create($request->all()+[
            'datetime'=>$datetime
        ]);
        $event->save();
        return back()->with('status', 'Evento creado con éxito');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin-event-edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $datetime = $request->date .' '. $request->time;
        //dd($request->active);
        if ($request->active) {
            $event->update($request->all()+[
                'datetime'=>$datetime
            ]);
        }else{
            $event->update($request->all()+[
                'datetime'=>$datetime,
                'active'=>0
            ]);
        }
        
        return back()->with('status', 'Evento actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {   
        if(!$event->getAttendees()){
            $event->delete();
            return back()->with('status', 'Evento eliminado con éxito');
        }
        return back()->with('error', 'No puede eliminarse un evento con asistentes');
    }
}
