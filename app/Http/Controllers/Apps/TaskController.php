<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function add(Request $request){
        return view('app.tasks.addtask',['header_footer'=>1]);
    }
    function save(Request $request){
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
            'description'=>$request->description
        ];

        $task=Task::create($taskdata);
        if($request->has('familymember')){
            foreach($request->familymember as $fam){
                $task->members()->attach($fam);
            }
        }
        return redirect(route('app.user.home'));
    }
    function edit(Request $request,Task $task){
        return view('app.tasks.edittask',['task'=>$task,'header_footer'=>1]);
    }
    function update(Request $request,Task $task){
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
            'description'=>$request->description
        ];

        $task->update($taskdata);
        $task->members()->detach();
        if($request->has('familymember')){
            foreach($request->familymember as $fam){
                $task->members()->attach($fam);
            }
        }
        return redirect(route('app.user.home'));
    }
}
