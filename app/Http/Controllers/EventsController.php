<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\MasterClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EventClass;
use App\Models\EventClassPackage;
use App\Models\EventAdditionalDetails;
use App\Models\EventTransportDetail;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_list = MasterClass::all();
        return view('events.add', compact('class_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //return $request->all();

       $input = $request->all();

       // store event data
       $event_title	 = $input['title'];
       $button_title = $input['button_title'];
       $start_date = $input['start_date'] ? date('Y-m-d', strtotime($input['start_date'])) : null;
       $start_time = $input['start_time'] ? date('H:i:s', strtotime($input['start_time'])) : null;
       $end_date = $input['end_date'] ? date('Y-m-d', strtotime($input['end_date'])) : null;
       $end_time = $input['end_time'] ? date('H:i:s', strtotime($input['end_time'])) : null;
       $status = $input['status'];
       $transport_status = $input['transport_status'];
       $file_name = "";

       $file = $request->file('flyer');
       if ($file) {
           $file_name = time() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('flyer'), $file_name);
       }

       $event = Events::create([
           'title' => $event_title,
           'button_title' => $button_title,
           'start_date' => $start_date,
           'start_time' => $start_time,
           'end_date' => $end_date,
           'end_time' => $end_time,
           'status' => $status,
           'transport_status' => $transport_status,
           'flyer' => $file_name,
       ]);

       // Store Class Data
       $total_classes = $input['total_classes_name'];
       for ($i = 1; $i <= $total_classes; $i++) {
           $class_name = $input['classes_name_'.$i];
           $class_status = $input['class_status_'.$i];
           $event_class = EventClass::create([
               'event_id' => $event->id,
               'master_class_id' => $class_name,
               'status' => $class_status,
           ]);

            // Store Package Data
            $total_packages = $input['class_'.$i.'_total_packages'];
           // $total_packages = 1;
            for ($j = 1; $j <= $total_packages; $j++) {
                $package_name = $input['class_'.$i.'_package_name_'.$j];
                $package_price = $input['class_'.$i.'_package_price_'.$j] ?? 0;
                $package_status = $input['class_'.$i.'_package_status_'.$j];
                $package = EventClassPackage::create([
                    'event_class_id' => $event_class->id,
                    'title' => $package_name,
                    'price' => $package_price ? (int)$package_price : 0,
                    'status' => $package_status,
                ]);
            }
       }
    
       // Store Additional Data
       $total_additional = $request->total_additional;
       for ($k = 1; $k <= $total_additional; $k++) {
           $additional_title = $input['additional_title_'.$k];
           $additional_price = $input['additional_price_'.$k] ?? 0;
           $additional_index = $input['additional_index_'.$k] ?? 1;
           $additional_status = $input['additional_status_'.$k];
           $additional = EventAdditionalDetails::create([
               'event_id' => $event->id,
               'title' => $additional_title,
               'price' => $additional_price,
               'order_by' => $additional_index,
               'status' => $additional_status,
           ]);
       }

       if($transport_status == 'active'){
         $total_route = $input['total_route'];
         for ($l = 1; $l <= $total_route; $l++) {
           $route_name = $input['route_name_'.$l];
           $route_price = $input['route_price_'.$l] ?? 0;
           $route_status = $input['route_status_'.$l];
           $route = EventTransportDetail::create([
               'event_id' => $event->id,
               'title' => $route_name,
               'price' => $route_price,
               'status' => $route_status,
           ]);
         }
       }
       return redirect()->route('events.index')->with('success', 'Event created successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        //
    }
}
