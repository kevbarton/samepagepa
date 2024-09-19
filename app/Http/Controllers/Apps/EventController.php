<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Event as AppEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function add(Request $request){
        return view('app.events.addevent',['header_footer'=>1]);
    }
    function save(Request $request){
        $validated=$request->validate([
            "title"=>"required",
            "date"=>"required",
            "timeStart"=>"required",
            "timeEnd"=>"required",
            "location"=>"required"
        ]);
        $eventdata=[
            'user_id'=>auth()->user()->id,
            'wallet_id'=>0,
            'title'=>$request->title,
            'date'=>$request->date,
            'repeat'=>$request->repeat,
            'time1'=>$request->timeStart,
            'time2'=>$request->timeEnd,
            'location'=>$request->location,
            'place_id'=>$request->place_id,
            'lat'=>$request->lat,
            'long'=>$request->long,
            'description'=>$request->description
        ];

        $event=AppEvent::create($eventdata);
        if($request->has('familymember')){
            foreach($request->familymember as $fam){
                $event->members()->attach($fam);
            }
        }
        return redirect(route('app.user.home'));
    }
    function edit(Request $request,AppEvent $appevent){
        return view('app.events.editevent',['event'=>$appevent,'header_footer'=>1]);
    }
    function update(Request $request,AppEvent $appevent){
        $validated=$request->validate([
            "title"=>"required",
            "date"=>"required",
            "timeStart"=>"required",
            "timeEnd"=>"required",
            "location"=>"required"
        ]);
        $taskdata=[
            'user_id'=>auth()->user()->id,
            'wallet_id'=>0,
            'title'=>$request->title,
            'date'=>$request->date,
            'repeat'=>$request->repeat,
            'time1'=>$request->timeStart,
            'time2'=>$request->timeEnd,
            'location'=>$request->location,
            'place_id'=>$request->place_id,
            'lat'=>$request->lat,
            'long'=>$request->long,
            'description'=>$request->description
        ];

        $appevent->update($taskdata);
        $appevent->members()->detach();
        if($request->has('familymember')){
            foreach($request->familymember as $fam){
                $appevent->members()->attach($fam);
            }
        }
        return redirect(route('app.user.home'));
    }
}
