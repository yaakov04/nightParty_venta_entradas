<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendees = Attendee::paginate(9);
        return view('admin-attendee', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::where('active', 1)->take(5)->get();
        return view('admin-attendee-create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->paid) {
            $payerID=uniqid();
            $qr = getQr("public/qr", $payerID);
            $attendee = Attendee::create([
                'payerID'=>$payerID,
                'qr'=>$qr
            ]+ $request->all());
            
        }else{
            $attendee = Attendee::create($request->all());
        }
        $attendee->save();
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee $attendee)
    {
        $events = Event::where('active', 1)->take(5)->get();
        $eventToAttend = $attendee->eventToAttend()[0];
        return view('admin-attendee-edit', compact('attendee', 'events', 'eventToAttend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendee $attendee)
    {
        if ($request->paid  && $attendee->paid===0) {
            $payerID=uniqid();
            $qr = getQr("public/qr", $payerID);
            $attendee->update([
            'payerID'=>$payerID,
            'qr'=>$qr
            ]+$request->all());
        }else{
            Storage::disk('public')->delete('qr/'.$attendee->payerID.'.png');
            $attendee->update($request->all()+[
                'paid'=>0,
                'payerID'=>'',
                'qr'=>''
            ]);
            
        }
        $attendee->save();
        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $attendee)
    {
        Storage::disk('public')->delete('qr/'.$attendee->payerID.'.png');
        $attendee->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
}
