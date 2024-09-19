<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Task;
use App\Models\Event;
use App\Models\GoogleCalendar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\ContactRequestSubmitted;
use App\Mail\FamilyMemberAdded;
use App\Mail\FamilyAddedToEvent;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use LDAP\Result;
use Google;
class PageController extends Controller
{
    function index(Request $request){
        if(auth()->user() || auth()->viaRemember()){
            return redirect(route('appusergetstarted'));
        }
        return view('app.index',['header_footer'=>0]);
    }
    function register(Request $request){
        if(auth()->user() || auth()->viaRemember()){
            return redirect(route('appusergetstarted'));
        }
        return view('app.register',['header_footer'=>0]);
    }
    function getStarted(Request $request){
        return view('app.getstarted.index',['header_footer'=>1]);
    }

    function getStartedMenu(Request $request){
        return view('app.getstarted.menu',['header_footer'=>1]);
    }
    function getStartedProfile(Request $request){
        return view('app.getstarted.profile',['header_footer'=>1]);
    }
    function getStartedUpdateProfile(Request $request){
        $user=auth()->user();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => [
                'required',
                Rule::unique('users','phone')->ignore($user->id),
            ],
            'email' => [
                'required','email',
                Rule::unique('users','email')->ignore($user->id),
            ],


        ],[
            'first_name.required'=>'Please enter first name',
            'last_name.required'=>'Please enter last name',
            'phone.required'=>'Please enter mobile',
            'phone.unique'=>'Mobile already registered',
            'email.required'=>'Please enter a valid email',
            'email.email'=>'Valid email is required',
            'email.unique'=>'Email already registered'
        ]);

        if($validator->fails()){
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender'=>$request->gender,
            ]);
            return redirect(route('appusergetstarted.profilephoto'));
        }

    }
    function getStartedProfilePhoto(Request $request){
        return view('app.getstarted.profilephoto',['header_footer'=>1]);
    }
    function getStartedProfilePhotoUpload(Request $request){
        
        auth()->user()->addMediaFromRequest('avatar')->toMediaCollection('avatar');

    }
    function getGoogleClient(){
        
       // return $client;
    }
    function getStartedCalendar(Request $request){
        

        return view('app.getstarted.calendar',['header_footer'=>1]);
    }
    function getStartedFamily(Request $request){
        return view('app.getstarted.family',['header_footer'=>1]);
    }
    function getStartedFamilyMembers(Request $request){
        return view('app.getstarted.familymembers',['header_footer'=>1]);
    }
    function getStartedAddFamilyMember(Request $request){
        return view('app.getstarted.addfamilymember',['header_footer'=>1]);
    }
    function getStartedSubmitFamilyMember(Request $request){
        $user=auth()->user();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => [
                Rule::requiredIf($request->account!='FamilyUser'),
                Rule::unique('users','phone'),
            ],
            'email' => [
                'required','email',
                Rule::unique('users','email'),
            ],


        ],[
            'first_name.required'=>'Please enter first name',
            'last_name.required'=>'Please enter last name',
            'phone.required'=>'Please enter mobile',
            'phone.unique'=>'Mobile already registered',
            'email.required'=>'Please enter a valid email',
            'email.email'=>'Valid email is required',
            'email.unique'=>'Email already registered'
        ]);

        if($validator->fails()){
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $code=mt_rand(100000,999999);
            $user=User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender'=>$request->gender,
                'password'=>Hash::make(Str::password(8)),
                'active'=>1,
                'business_id'=>auth()->user()->id,
                'invite_code'=>$code
            ]);
            $user->assignRole($request->account);
            $user->role=$request->account;
            $user->save();
            Mail::to($request->email)->send(new FamilyMemberAdded($request->first_name,$request->email,$code));
            return redirect(route('appusergetstarted.addfamilymemberphoto',['user'=>$user->id]));
        }
    }
    function getStartedAddFamilyMemberPhoto(Request $request, User $user){
        return view('app.getstarted.familymemberphoto',['user'=>$user,'header_footer'=>1]);
    }
    function getStartedAddFamilyMemberPhotoUpload(Request $request, User $user){
        $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
    }
    function getStartedEditFamilyMember(Request $request, User $user){
        return view('app.getstarted.editfamilymember',['user'=>$user,'header_footer'=>1]);
    }
    function getStartedUpdateFamilyMember(Request $request, User $user){
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => [
                Rule::requiredIf($request->account!='FamilyUser'),
                Rule::unique('users','phone')->ignore($user->id),
            ],
            'email' => [
                'required','email',
                Rule::unique('users','email')->ignore($user->id),
            ],


        ],[
            'first_name.required'=>'Please enter first name',
            'last_name.required'=>'Please enter last name',
            'phone.required'=>'Please enter mobile',
            'phone.unique'=>'Mobile already registered',
            'email.required'=>'Please enter a valid email',
            'email.email'=>'Valid email is required',
            'email.unique'=>'Email already registered'
        ]);

        if($validator->fails()){
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender'=>$request->gender,
                
            ]);
            $user->syncRoles([$request->account]);
            $user->role=$request->account;
            $user->save();
            return redirect(route('appusergetstarted.addfamilymemberphoto',['user'=>$user->id]));
        }
    }
    function contactpost(Request $request){
        $validations=[
            'subject'=>'required',
            'name'=>'required',
            'email'=>'required|email'
        ];
        $request->validate($validations);
        Mail::to('hello@samepagepa.com')->send(new ContactRequestSubmitted($request->subject,$request->name,$request->email,$request->message));
        return redirect()->back()->with(['status'=>'Request submitted successfully. Thank You!']);

    }
    function userhome(Request $request){
        $user=auth()->user();
        if($request->has('uid') && !empty($request->uid)){
            $familymembers=auth()->user()->familymembers()->pluck('id')->toArray();
            //return auth()->user()->familymembers;
            $familymembers[]=$user->id;
            if(in_array($request->uid,$familymembers)===false){
                if($request->has('dt') && !empty($request->dt)){
                    return redirect(route('app.user.home',['dt'=>$request->dt]));
                }
                return redirect(route('app.user.home'));
            }else{
                $user=User::find($request->uid);
            }
        }
        $evnts=auth()->user()->events;
        $tsks=auth()->user()->tasks;
        $members=[];
        foreach($tsks as $tsk){
            $mems=$tsk->members;
            foreach($mems as $member)
            $members[$member->id]=$member;
        }
        foreach($evnts as $evnt){
            $mems=$evnt->members;
            foreach($mems as $member)
            $members[$member->id]=$member;
        }
        $now=CarbonImmutable::now();
        if($request->has('dt')){
            $now=CarbonImmutable::createFromFormat('Y-m-d',$request->dt);
        }
        //return $now->format('Y-m-d');
        $weekStartDate = $now->startOfWeek();
        $weekdays=[];
        $activedate='';
        $prevdate=$weekStartDate->addDays(-1);
        $nextdate=$weekStartDate->addDays(7);
        for($i=0;$i<=6;$i++){
            $ldt=$weekStartDate->addDays($i);
           
            $active=false;

            if($ldt->format('Y-m-d')==$now->format('Y-m-d')){
                $active=true;
                $activedate=$ldt->toObject();
                
            }
            $ldt=$ldt->toObject();
            if($active){
                $ldt->active=1;
            }else{
                $ldt->active=0;
            }
            $weekdays[]=$ldt;
        }
       
        $tasks=$user->tasks()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();
        $events=$user->events()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();
        $taskevents=[];
        $i=1;
        foreach($tasks as $task){
            $task->type="task";
            $taskevents[strtotime($task->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$task;
            $i++;
        }
        foreach($events as $event){
            $event->type="event";
            $taskevents[strtotime($event->date. ' '.$event->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$event;
            $i++;
        }
        ksort($taskevents);
        $upcomingtasks=$user->tasks()->with('wallet')->where('date','>',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->limit(3)->get();
        $upcomingevents=$user->events()->with('wallet')->where('date','>',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->limit(3)->get();

        $upcomingtaskevents=[];
        $i=1;
        foreach($upcomingtasks as $task){
            $task->type="task";
            $upcomingtaskevents[strtotime($task->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$task;
            $i++;
        }
        foreach($upcomingevents as $event){
            $event->type="event";
            $upcomingtaskevents[strtotime($event->date. ' '.$event->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$event;
            $i++;
        }
        ksort($upcomingtaskevents);
        return view('app.user.home',['members'=>$members,'weekdays'=>$weekdays,'activedate'=>$activedate,'prevdate'=>$prevdate,'nextdate'=>$nextdate,'tasks'=>$tasks,'events'=>$events,'taskevents'=>$taskevents,'upcomingtaskevents'=>$upcomingtaskevents,'header_footer'=>1]);
    }
    function calendar(Request $request){
        $user=auth()->user();
        if($request->has('uid') && !empty($request->uid)){
            $familymembers=auth()->user()->familymembers()->pluck('id')->toArray();
            $familymembers[]=$user->id;
            if(in_array($request->uid,$familymembers)===false){
                if($request->has('dt') && !empty($request->dt)){
                    return redirect(route('app.user.calendar',['dt'=>$request->dt]));
                }
                return redirect(route('app.user.calendar'));
            }else{
                $user=User::find($request->uid);
            }
        }
        $evnts=auth()->user()->events;
        $tsks=auth()->user()->tasks;
        $members=[];
        foreach($tsks as $tsk){
            $mems=$tsk->members;
            foreach($mems as $member)
            $members[$member->id]=$member;
        }
        foreach($evnts as $evnt){
            $mems=$evnt->members;
            foreach($mems as $member)
            $members[$member->id]=$member;
        }
        $now=CarbonImmutable::now();
        $currenthour=$now->format('G');
        if($request->has('dt')){
            $now=CarbonImmutable::createFromFormat('Y-m-d',$request->dt);
        }
        //return $now->format('Y-m-d');
        $weekStartDate = $now->startOfWeek();
        $activedate='';
        $prevdate=$weekStartDate->addDays(-1);
        $nextdate=$weekStartDate->addDays(7);
        $weekdays=[];
        for($i=0;$i<=6;$i++){
            $ldt=$weekStartDate->addDays($i);
           
            $active=false;

            if($ldt->format('Y-m-d')==$now->format('Y-m-d')){
                $active=true;
                $activedate=$ldt->toObject();
            }

            $ldt=$ldt->toObject();
            if($active){
                $ldt->active=1;
            }else{
                $ldt->active=0;
            }
            $weekdays[]=$ldt;
        }
       
        $tasks=$user->tasks()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();
        $events=$user->events()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();
        $taskevents=[];
        $i=1;
       // $members=[];
        foreach($tasks as $task){
            $task->type="task";
            $taskevents[date('H',strtotime($task->date. ' '.$task->time1))][]=$task;
            $i++;
            
        }
        foreach($events as $event){
            $event->type="event";
            $taskevents[date('H',strtotime($event->date. ' '.$event->time1))][]=$event;
            $i++;
            
        }
        ksort($taskevents);
        //return $members;
        return view('app.user.calendar',['currenthour'=>$currenthour,'members'=>$members,'weekdays'=>$weekdays,'activedate'=>$activedate,'prevdate'=>$prevdate,'nextdate'=>$nextdate,'tasks'=>$tasks,'events'=>$events,'taskevents'=>$taskevents,'header_footer'=>1]);
    }
    function calendarSync(Request $request){
        $googlecalendartoken='';
        if($request->has('calendar')){
            $googlecalendar=GoogleCalendar::find($request->calendar);
            if($googlecalendar)
            $googlecalendartoken=$googlecalendar->token;
        }
        
        $user=auth()->user();
        $client=new Google\Client();
       // return storage_path('gCalendar/gClientSecret.json');
        $client->setAuthConfig(storage_path('gCalendar/gClientSecret.json'));
        $redirect_uri=route('app.user.calendar.callback');
        $client->setRedirectUri($redirect_uri);
        $client->addScope("https://www.googleapis.com/auth/calendar.readonly");
        $client->addScope("https://www.googleapis.com/auth/calendar.events");
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        if(empty($googlecalendartoken)){
            $code_verifier=$client->getOAuth2Service()->generateCodeVerifier();
            $request->session()->put('code_verifier', $code_verifier);
           // return  $request->session()->get('code_verifier');
            $authUrl = $client->createAuthUrl();
            return redirect($authUrl);
        }else{
            $client->setAccessToken($googlecalendartoken);
            if ($client->isAccessTokenExpired()) {
                $request->session()->forget('g_access_token');
                $googlecalendar->token='';
                $googlecalendar->save();
                $request->session()->put('code_verifier',$client->getOAuth2Service()->generateCodeVerifier());
                $authUrl = $client->createAuthUrl();
                return redirect($authUrl);
            }
        }
        $service = new Google\Service\Calendar($client);
        $events = $service->events->listEvents('primary');
        $evs=[];
        while(true) {
            foreach ($events->getItems() as $event) {
                $eventid=$event->getId();
                if(!empty($eventid)){
                    $name=$event->getSummary();
                    
                    $startdatetime='';
                    $startdate='';
                    $starttime='';
                    $stdate=$event->getStart();
                    if(!empty($stdate)){
                        $startdatetime=$event->getStart()->dateTime;
                        $startdate=date('Y-m-d',strtotime($startdatetime));
                        $starttime=date('H:i',strtotime($startdatetime));
                    }
                    $enddatetime='';
                    $enddate='';
                    $endtime='';
                    $endate=$event->getEnd();
                    if(!empty($endate)){
                        $enddatetime=$event->getEnd()->dateTime;
                        $enddate=date('Y-m-d',strtotime($enddatetime));
                        $endtime=date('H:i',strtotime($enddatetime));
                    }
                    
                    $location=$event->getLocation();
                    $description=$event->getDescription();
                    $eventtype=$event->getEventType();
                    $evs[]=['id'=>$eventid,'kind'=>$event->getKind(),'title'=>$name,'startdate'=>$startdate,'starttime'=>$starttime,'enddate'=>$enddate,'endtime'=>$endtime,'location'=>$location,'description'=>$description,'eventtype'=>$eventtype];
                }
            }
            $pageToken = $events->getNextPageToken();
            if ($pageToken) {
              $optParams = array('pageToken' => $pageToken);
              $events = $service->events->listEvents('primary', $optParams);
            } else {
              break;
            }
          }
        foreach($evs as $ev){
            $eventdata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>0,
                'title'=>$ev['title'],
                'date'=>$ev['startdate'],
                'date2'=>$ev['enddate'],
                'repeat'=>'No Repeat',
                'time1'=>$ev['starttime'],
                'time2'=>$ev['endtime'],
                'location'=>$ev['location'],
                'description'=>$ev['description'],
                'google_event_id'=>$ev['id'],
                'google_calendar_id'=>$googlecalendar->id,
                'active'=>1
            ];
            $evnt=Event::where('google_event_id',$ev['id'])->first();
            if($evnt){
                $evnt->update($eventdata);
            }else{
                $evnt=Event::create($eventdata);
                $evnt->members()->attach(auth()->user()->id);
            }
        }
        return redirect(route('app.user.calendar'));
    }
    function calendarCallback(Request $request){
        $user=auth()->user();
        $client=new Google\Client();
       // return storage_path('gCalendar/gClientSecret.json');
        $client->setAuthConfig(storage_path('gCalendar/gClientSecret.json'));
        $redirect_uri=route('app.user.calendar.callback');
        $client->setRedirectUri($redirect_uri);
        $client->addScope("https://www.googleapis.com/auth/calendar.readonly");
        $client->addScope("https://www.googleapis.com/auth/calendar.events");
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        if(empty($request->session()->get('code_verifier'))){
            $request->session()->put('code_verifier',$client->getOAuth2Service()->generateCodeVerifier());
            $authUrl = $client->createAuthUrl();
            return redirect($authUrl);
        }
        $token = $client->fetchAccessTokenWithAuthCode($request->code, $request->session()->get('code_verifier'));
        
        $authscopes=explode(' ',$token['scope']);
        $scopesallowed=true;
        if(in_array('https://www.googleapis.com/auth/calendar.readonly',$authscopes)===false || in_array('https://www.googleapis.com/auth/calendar.events',$authscopes)===false){
            $scopesallowed=false;
        }
        if($scopesallowed){
            $client->setAccessToken($token);

            $id_token=$client->verifyIdToken();
            //return $id_token['email'];
            $googlecalendar=GoogleCalendar::where('email',$id_token['email'])->first();
            if($googlecalendar){
                $googlecalendar->token=$token;
                $googlecalendar->save();
            }else{
                $googlecalendar=GoogleCalendar::create([
                    'user_id'=>auth()->user()->id,
                    'email'=>$id_token['email'],
                    
                ]);
                $googlecalendar->token=$token;
                $googlecalendar->save();
            }
            $request->session()->put('g_access_token',$token);
            
            return redirect(route('app.user.calendar.sync',['calendar'=>$googlecalendar->id]));
        }else{
            return back();
        }
        
    }
    function addCalendar(Request $request){
        $user=auth()->user();
        $client=new Google\Client();
       // return storage_path('gCalendar/gClientSecret.json');
        $client->setAuthConfig(storage_path('gCalendar/gClientSecret.json'));
        $redirect_uri=route('app.user.calendar.callback');
        $client->setRedirectUri($redirect_uri);
        $client->addScope("https://www.googleapis.com/auth/calendar.readonly");
        $client->addScope("https://www.googleapis.com/auth/calendar.events");
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $request->session()->put('code_verifier',$client->getOAuth2Service()->generateCodeVerifier());
        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }
    function calendarTablet(Request $request){
        $now=CarbonImmutable::now();
        $currenthour=$now->format('G');
        if($request->has('dt')){
            $now=CarbonImmutable::createFromFormat('Y-m-d',$request->dt);
        }
        //return $now->format('Y-m-d');
        $weekStartDate = $now->startOfWeek();
        $activedate='';
        $prevdate=$weekStartDate->addDays(-1);
        $nextdate=$weekStartDate->addDays(7);
        $weekdays=[];
        for($i=0;$i<=6;$i++){
            $ldt=$weekStartDate->addDays($i);
           
            $active=false;

            if($ldt->format('Y-m-d')==$now->format('Y-m-d')){
                $active=true;
                $activedate=$ldt->toObject();
            }
            $ldt=$ldt->toObject();
            if($active){
                $ldt->active=1;
            }else{
                $ldt->active=0;
            }
            $weekdays[]=$ldt;
        }
       
        $tasks=auth()->user()->tasks()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();
        $events=auth()->user()->events()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();

        $taskevents=[];
        $i=1;
        foreach($tasks as $task){
            $task->type="task";
            $taskevents[strtotime($task->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$task;
            $i++;
        }
        foreach($events as $event){
            $event->type="event";
            $taskevents[strtotime($event->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$event;
            $i++;
        }
        ksort($taskevents);
        $upcomingtasks=auth()->user()->tasks()->with('wallet')->where('date','>',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->limit(3)->get();
        $upcomingevents=auth()->user()->events()->with('wallet')->where('date','>',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->limit(3)->get();

        $upcomingtaskevents=[];
        $i=1;
        foreach($upcomingtasks as $task){
            $task->type="task";
            $upcomingtaskevents[strtotime($task->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$task;
            $i++;
        }
        foreach($upcomingevents as $event){
            $event->type="event";
            $upcomingtaskevents[strtotime($event->date. ' '.$event->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$event;
            $i++;
        }
        ksort($upcomingtaskevents);

        $hourlytaskevents=[];
        foreach($tasks as $task){
            $task->type="task";
            $hourlytaskevents[date('H',strtotime($task->date. ' '.$task->time1))][]=$task;
        }
        foreach($events as $event){
            $event->type="event";
            $hourlytaskevents[date('H',strtotime($event->date. ' '.$event->time1))][]=$event;
        }
        ksort($hourlytaskevents);
       // return $now;
        return view('app.user.tabletcalendar',['now'=>$now,'currenthour'=>$currenthour,'weekdays'=>$weekdays,'activedate'=>$activedate,'prevdate'=>$prevdate,'nextdate'=>$nextdate,'tasks'=>$tasks,'events'=>$events,'taskevents'=>$taskevents,'upcomingtaskevents'=>$upcomingtaskevents,'hourlytaskevents'=>$hourlytaskevents]);
    }
    function calendarTabletWeek(Request $request){
        $now=CarbonImmutable::now();
        $currenthour=$now->format('G');
        if($request->has('dt')){
            $now=CarbonImmutable::createFromFormat('Y-m-d',$request->dt);
        }
        //return $now->format('Y-m-d');
        $weekStartDate = $now->startOfWeek();
        $weekEndDate = $now->endOfWeek();
        $activedate='';
        $prevdate=$weekStartDate->addDays(-1);
        $nextdate=$weekStartDate->addDays(7);
        $weekdays=[];
        for($i=0;$i<=6;$i++){
            $ldt=$weekStartDate->addDays($i);
           
            $active=false;

            if($ldt->format('Y-m-d')==$now->format('Y-m-d')){
                $active=true;
                $activedate=$ldt->toObject();
            }
            $ldt=$ldt->toObject();
            if($active){
                $ldt->active=1;
            }else{
                $ldt->active=0;
            }
            $weekdays[]=$ldt;
        }
       
        $tasks=auth()->user()->tasks()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();
        $events=auth()->user()->events()->with('wallet')->where('date',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->get();

        $taskevents=[];
        $i=1;
        foreach($tasks as $task){
            $task->type="task";
            $taskevents[strtotime($task->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$task;
            $i++;
        }
        foreach($events as $event){
            $event->type="event";
            $taskevents[strtotime($event->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$event;
            $i++;
        }
        ksort($taskevents);
        $upcomingtasks=auth()->user()->tasks()->with('wallet')->where('date','>',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->limit(3)->get();
        $upcomingevents=auth()->user()->events()->with('wallet')->where('date','>',$now->format('Y-m-d'))->where('active',1)->orderBy('time1')->limit(3)->get();

        $upcomingtaskevents=[];
        $i=1;
        foreach($upcomingtasks as $task){
            $task->type="task";
            $upcomingtaskevents[strtotime($task->date. ' '.$task->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$task;
            $i++;
        }
        foreach($upcomingevents as $event){
            $event->type="event";
            $upcomingtaskevents[strtotime($event->date. ' '.$event->time1).str_pad($i,3,'0',STR_PAD_LEFT)]=$event;
            $i++;
        }
        ksort($upcomingtaskevents);
        //return $weekEndDate;
        $hourlytasks=auth()->user()->tasks()->with('wallet')->where('date','>=',$weekStartDate)->where('date','<=',$weekEndDate)->where('active',1)->orderBy('date')->orderBy('time1')->get();
        $hourlyevents=auth()->user()->events()->with('wallet')->where('date','>=',$weekStartDate)->where('date','<=',$weekEndDate)->where('active',1)->orderBy('date')->orderBy('time1')->get();
        $hourlytaskevents=[];
        foreach($hourlytasks as $task){
            $task->type="task";
            $hourlytaskevents[date('H',strtotime($task->date. ' '.$task->time1))][date('N',strtotime($task->date. ' '.$task->time1))][]=$task;
        }
        foreach($hourlyevents as $event){
            $event->type="event";
            $hourlytaskevents[date('H',strtotime($event->date. ' '.$event->time1))][date('N',strtotime($event->date. ' '.$event->time1))][]=$event;
        }
        ksort($hourlytaskevents);
        
        return view('app.user.tabletcalendarweek',['now'=>$now,'currenthour'=>$currenthour,'weekdays'=>$weekdays,'activedate'=>$activedate,'prevdate'=>$prevdate,'nextdate'=>$nextdate,'tasks'=>$tasks,'events'=>$events,'taskevents'=>$taskevents,'upcomingtaskevents'=>$upcomingtaskevents,'hourlytaskevents'=>$hourlytaskevents]);
    }
    function getTask(Request $request,Task $task){
        return view('partials.eventpopup',['event'=>$task,'type'=>'task']);
    }
    function getEvent(Request $request,Event $event){
        return view('partials.eventpopup',['event'=>$event,'type'=>'task']);
    }

    function tasks(Request $request){
        $wallet='';
        if($request->has('wallet') && !empty($request->wallet)){
            $wallet=$request->wallet;
        }
        $type='todo';
        if($request->has('type') && !empty($request->type)){
            $type=$request->type;
        }
        
        $todos=Task::where('iscomplete',0);
        if(!empty($wallet)){
            $todos=$todos->where('wallet_id',$wallet);
        }
        $todos=$todos->orderBy('date')->orderBy('time1')->get();

        $completedtodos=Task::where('iscomplete',1);
        if(!empty($wallet)){
            $completedtodos=$completedtodos->where('wallet_id',$wallet);
        }
        $completedtodos=$completedtodos->orderBy('date')->orderBy('time1')->get();
        
        return view('app.user.todos',['todos'=>$todos,'completedtodos'=>$completedtodos,'header_footer'=>1,'cwallet'=>$wallet,'type'=>$type]);

    }
    function completeTask(Request $request,Task $task){
        $task->iscomplete=1;
        $task->save();
        return redirect(route('app.user.tasks',['wallet'=>$request->wallet,'type'=>$request->type]));
    }
    function unmarkTask(Request $request,Task $task){
        
        $task->iscomplete=0;
        $task->save();
        return redirect(route('app.user.tasks',['wallet'=>$request->wallet,'type'=>$request->type]));
    }
    function settings(Request $request){
        return view('app.user.settings',['header_footer'=>1]);
    }


    function editProfile(Request $request){
        return view('app.user.profile',['header_footer'=>1]);
    }
    function updateProfile(Request $request){
        $user=auth()->user();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => [
                'required',
                Rule::unique('users','phone')->ignore($user->id),
            ],
            'email' => [
                'required','email',
                Rule::unique('users','email')->ignore($user->id),
            ],


        ],[
            'first_name.required'=>'Please enter first name',
            'last_name.required'=>'Please enter last name',
            'phone.required'=>'Please enter mobile',
            'phone.unique'=>'Mobile already registered',
            'email.required'=>'Please enter a valid email',
            'email.email'=>'Valid email is required',
            'email.unique'=>'Email already registered'
        ]);

        if($validator->fails()){
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'gender'=>$request->gender,
            ]);
            return redirect(route('app.user.profilephoto'));
        }

    }
    function profilePhoto(Request $request){
        return view('app.user.profilephoto',['header_footer'=>1]);
    }
    function profilePhotoUpload(Request $request){
        
        auth()->user()->addMediaFromRequest('avatar')->toMediaCollection('avatar');

    }
    function notifications(Request $request){
        $type='unread';
        if($request->has('type') && !empty($request->type)){
            $type=$request->type;
        }
        return view('app.user.notifications',['type'=>$type,'header_footer'=>1,'cwallet'=>'']);
    }
    function eventaddremovemember(Request $request, Event $event,User $member){
        $mem=$event->members()->where('users.id',$member->id)->first();
       // return $event->members();
        $attached=0;
        if($mem){
            $event->members()->detach($mem->id);
        }else{
            $event->members()->attach($member->id);
            $attached=1;
            Mail::to($member->email)->send(new FamilyAddedToEvent($event,$member));
        }
        return response()->json(['success'=>1,'attached'=>$attached,'msg'=>'Event members Updated']);
    }
    function acceptinvite(Request $request){
        if(auth()->check()){
            return redirect(route('app.user.home'));
        }else{
            return view('app.acceptinvite',['header_footer'=>0]);
        }
    }
    function acceptinviteverify(Request $request){
        $email=$request->email;
       $invite_code=$request->invitecode;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'invitecode' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>1,'msg'=>'Email or Invite Code is invalid','data'=>['email'=>$email,'invitecode'=>$invite_code]]);
        }
        $user=User::where('email',$email)->where('invite_code',$invite_code)->first();
        if($user){
            return response()->json(['error'=>0,'msg'=>'','data'=>['email'=>$email,'invitecode'=>$invite_code,'user'=>$user->id]]);
        }else{
            return response()->json(['error'=>1,'msg'=>'Email or Invite Code is invalid','data'=>['email'=>$email,'invitecode'=>$invite_code]]);
        }
    }
    function acceptinvitesetpassword(Request $request){
        $email=$request->email;
        $invite_code=$request->invitecode;
        $password=$request->password;
        $validator = Validator::make($request->all(), [
            'password' => 'min:8',
        ]);
        if ($validator->fails()) {
            $msg=$validator->errors()->first('password');
            return response()->json(['error'=>1,'msg'=>$msg,'data'=>['email'=>$email,'invitecode'=>$invite_code,'password'=>$password]]);
        }
        $user=User::where('email',$email)->where('invite_code',$invite_code)->first();
        $user->invite_accepted=1;
        $user->password=Hash::make($password);
        $user->save();
        auth()->login($user);
        return response()->json(['error'=>0,'msg'=>'','data'=>['email'=>$email,'invitecode'=>$invite_code,'password'=>$password]]);
     }
     function activateCalendar(Request $request, GoogleCalendar $calendar){
        $active=1;
        if($calendar->active){
            $active=0;
        }else{
            $active=1;
        }
        $events=$calendar->events;
        foreach($events as $event){
            $event->active=$active;
            $event->save();
        }
        $calendar->active=$active;
        $calendar->save();
        return redirect()->back();
     }
}
