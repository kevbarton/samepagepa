<?php

use App\Http\Controllers\Apps\TaskController;
use App\Http\Controllers\Apps\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apps\PageController;
use App\Http\Controllers\Apps\WalletController;
use App\Http\Controllers\Apps\AuthController;
use App\Http\Controllers\Dashboard\AuthController as DashBoardAuthController;
use App\Http\Controllers\Dashboard\TypesController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/storagelink', function () {
    $exitCode = Artisan::call('storage:link');
});

//Front Routes
Route::get('/', function () {
    return view('front.index');
})->name('front.index');

Route::get('/features', function () {
    return view('front.features');
})->name('front.features');

Route::get('/faqs', function () {
    return view('front.faqs');
})->name('front.faqs');

Route::get('/integrations', function () {
    return view('front.integrations');
})->name('front.integrations');

Route::get('/testimonials', function () {
    return view('front.testimonials');
})->name('front.testimonials');


Route::get('/ourstory', function () {
    return view('front.ourstory');
})->name('front.ourstory');

Route::get('/pricing', function () {
    return view('front.pricing');
})->name('front.pricing');

Route::get('/login', function () {
    if(auth()->user() || auth()->viaRemember()){
        return redirect(route('appusergetstarted'));
    }
    return view('front.login');
})->name('front.login');
Route::post('/login',[AuthController::class,'frontLogin'])->name('front.loginpost');

Route::get('/contactus', function () {
    return view('front.contactus');
})->name('front.contactus');
Route::post('/contactus', [PageController::class,'contactpost'])->name('front.contactpost');
Route::get('/terms', function () {
    return view('front.terms');
})->name('front.terms');

Route::get('/privacy', function () {
    return view('front.privacy');
})->name('front.privacy');

Route::get('/cookies', function () {
    return view('front.cookies');
})->name('front.cookies');

//App Routes
Route::get('/app', [PageController::class,'index'])->name('appindex');
Route::get('/app/register',[PageController::class,'register'])->name('appregister');
Route::post('/app/register/checkphone',[AuthController::class,'checkPhone'])->name('appregistercheckphone');
Route::post('/app/register/checkverificationcode',[AuthController::class,'checkVerificationCode'])->name('appregistercheckverificationcode');
Route::post('/app/register/checkemail',[AuthController::class,'checkEmail'])->name('appregistercheckemail');
Route::post('/app/register/checkpassword',[AuthController::class,'checkPassword'])->name('appregistercheckpassword');
Route::get('/app/acceptinvite',[PageController::class,'acceptinvite'])->name('app.acceptinvite');
Route::post('/app/acceptinvite',[PageController::class,'acceptinviteverify'])->name('app.acceptinviteverify');
Route::post('/app/acceptinvitesetpassword',[PageController::class,'acceptinvitesetpassword'])->name('app.acceptinvitesetpassword');
Route::get('/app/login',[AuthController::class,'login'])->name('applogin');
Route::post('/app/login/checkemail',[AuthController::class,'loginCheckEmail'])->name('applogincheckemail');
Route::post('/app/login/checkpassword',[AuthController::class,'loginCheckPassword'])->name('applogincheckpassword');
Route::get('/app/forgotpassword', [AuthController::class,'forgotpassword'])->name('app.forgotpassword');
Route::post('/app/forgotpassword', [AuthController::class,'forgotpasswordpost'])->name('app.passwordrequest');
Route::get('/app/reset-password/{token}', [AuthController::class,'forgotpasswordemail'])->name('app.passwordreset');
Route::post('/app/reset-password', [AuthController::class,'forgotpasswordupdate'])->name('app.passwordupdate');

Route::group(['middleware' => ['auth','role:User|FamilyAdmin|FamilyUserEdit|FamilyUser']], function () {
    Route::get('/app/user/home', [PageController::class,'userhome'])->name('app.user.home');
    Route::get('/app/user/getstarted',[PageController::class,'getStarted'])->name('appusergetstarted');
    Route::get('/app/user/getstarted/menu',[PageController::class,'getStartedMenu'])->name('appusergetstarted.menu');
    Route::get('/app/user/getstarted/profile',[PageController::class,'getStartedProfile'])->name('appusergetstarted.profile');
    Route::post('/app/user/getstarted/updateprofile',[PageController::class,'getStartedUpdateProfile'])->name('appusergetstarted.updateprofile');
    Route::get('/app/user/getstarted/profile/photo',[PageController::class,'getStartedProfilePhoto'])->name('appusergetstarted.profilephoto');
    Route::post('/app/user/getstarted/profile/photoupload',[PageController::class,'getStartedProfilePhotoUpload'])->name('appusergetstarted.profilephotoupload');
    Route::get('/app/user/getstarted/calendar',[PageController::class,'getStartedCalendar'])->name('appusergetstarted.calendar');
    Route::get('/app/user/getstarted/family',[PageController::class,'getStartedFamily'])->name('appusergetstarted.family');
    Route::get('/app/user/getstarted/family/members',[PageController::class,'getStartedFamilyMembers'])->name('appusergetstarted.familymembers');
    Route::get('/app/user/getstarted/family/members/add',[PageController::class,'getStartedAddFamilyMember'])->name('appusergetstarted.addfamilymember');
    Route::post('/app/user/getstarted/family/members/save',[PageController::class,'getStartedSubmitFamilyMember'])->name('appusergetstarted.submitfamilymember');
    Route::get('/app/user/getstarted/family/members/{user}/addphoto',[PageController::class,'getStartedAddFamilyMemberPhoto'])->name('appusergetstarted.addfamilymemberphoto');
    Route::post('/app/user/getstarted/family/members/{user}/uploadphoto',[PageController::class,'getStartedAddFamilyMemberPhotoUpload'])->name('appusergetstarted.addfamilymemberphotoupload');
    Route::get('/app/user/getstarted/family/members/{user}/edit',[PageController::class,'getStartedEditFamilyMember'])->name('appusergetstarted.editfamilymember');
    Route::post('/app/user/getstarted/family/members/{user}/update',[PageController::class,'getStartedUpdateFamilyMember'])->name('appusergetstarted.updatefamilymember');
    Route::get('/app/user/gettask/{task}', [PageController::class,'getTask'])->name('app.user.gettask');
    Route::get('/app/user/getevent/{event}', [PageController::class,'getEvent'])->name('app.user.getevent');
    Route::get('/app/user/calendar', [PageController::class,'calendar'])->name('app.user.calendar');
    Route::get('/app/user/calendar/callback', [PageController::class,'calendarCallback'])->name('app.user.calendar.callback');
    Route::get('/app/user/calendar/sync', [PageController::class,'calendarSync'])->name('app.user.calendar.sync');
    Route::get('/app/user/calendar/add', [PageController::class,'addCalendar'])->name('app.user.calendar.add');
    Route::get('/app/user/calendar/{calendar}/activate', [PageController::class,'activateCalendar'])->name('app.user.calendar.activate');
    Route::get('/app/user/calendar-tablet', [PageController::class,'calendarTablet'])->name('app.user.calendartablet');
    Route::get('/app/user/calendar-tablet-week', [PageController::class,'calendarTabletWeek'])->name('app.user.calendartabletweek');
    Route::get('/app/user/tasks', [PageController::class,'tasks'])->name('app.user.tasks');
    Route::get('/app/user/tasks/{task}/complete', [PageController::class,'completeTask'])->name('app.user.completetask');
    Route::get('/app/user/tasks/{task}/unmark', [PageController::class,'unmarkTask'])->name('app.user.unmarktask');
    Route::get('/app/user/settings', [PageController::class,'settings'])->name('app.user.settings');
    Route::get('/app/user/editprofile', [PageController::class,'editProfile'])->name('app.user.editprofile');
    Route::post('/app/user/updateprofile', [PageController::class,'updateProfile'])->name('app.user.updateprofile');
    Route::get('/app/user/profilephoto', [PageController::class,'profilePhoto'])->name('app.user.profilephoto');
    Route::post('/app/user/profilephotoupload', [PageController::class,'profilePhotoUpload'])->name('app.user.profilephotoupload');
    Route::get('/app/user/notifications', [PageController::class,'notifications'])->name('app.user.notifications');
    Route::get('/app/user/event/{event}/addremovemember/{member}', [PageController::class,'eventaddremovemember'])->name('app.user.eventaddremovemember');

    //wallets
    Route::get('/app/user/wallets',[WalletController::class,'getWallets'])->name('app.getuserwallets');
    Route::get('/app/user/wallets/addwallet/{wallet}',[WalletController::class,'addUserWallet'])->name('app.adduserwallet');
    Route::get('/app/user/wallets/editwallet/{wallet}',[WalletController::class,'editWallet'])->name('app.editwallet');
    Route::post('/app/user/wallets/updatewallet/{wallet}',[WalletController::class,'updateWallet'])->name('app.updatewallet');
    Route::get('/app/user/wallets/{wallet}/delete',[WalletController::class,'deleteWallet'])->name('app.deletewallet');
    
    //Partials
    Route::get('/app/user/wallets/getloanpartial',[WalletController::class,'getLoanPartial'])->name('app.getloanpartial');
    Route::get('/app/user/wallets/getotherpartial/{type}',[WalletController::class,'getOtherPartial'])->name('app.getotherpartial');

    //lifeadmin
    Route::get('/app/user/wallets/life-admin',[WalletController::class,'lifeAdmin'])->name('app.wallets.lifeadmin');
    Route::get('/app/user/wallets/life-admin/add',[WalletController::class,'addLifeAdmin'])->name('app.wallets.addlifeadmin');
    Route::post('/app/user/wallets/life-admin',[WalletController::class,'saveLifeAdmin'])->name('app.wallets.savelifeadmin');
    Route::get('/app/user/wallets/life-admin/{personal}/edit',[WalletController::class,'editLifeAdmin'])->name('app.wallets.editlifeadmin');
    Route::post('/app/user/wallets/life-admin/{personal}/update',[WalletController::class,'updateLifeAdmin'])->name('app.wallets.updatelifeadmin');
    
    //homes
    Route::get('/app/user/wallets/homes',[WalletController::class,'homes'])->name('app.wallets.homes');
    Route::get('/app/user/wallets/homes/add',[WalletController::class,'addHome'])->name('app.wallets.addhome');
    Route::post('/app/user/wallets/homes',[WalletController::class,'saveHome'])->name('app.wallets.savehome');
    Route::get('/app/user/wallets/homes/{home}/edit',[WalletController::class,'editHome'])->name('app.wallets.edithome');
    Route::post('/app/user/wallets/homes/{home}/update',[WalletController::class,'updateHome'])->name('app.wallets.updatehome');

    //vehicles
    Route::get('/app/user/wallets/vehicles',[WalletController::class,'vehicles'])->name('app.wallets.vehicles');
    Route::get('/app/user/wallets/vehicles/add',[WalletController::class,'addVehicle'])->name('app.wallets.addvehicle');
    Route::post('/app/user/wallets/vehicles',[WalletController::class,'saveVehicle'])->name('app.wallets.savevehicle');
    Route::get('/app/user/wallets/vehicles/{vehicle}/edit',[WalletController::class,'editVehicle'])->name('app.wallets.editvehicle');
    Route::post('/app/user/wallets/vehicles/{vehicle}/update',[WalletController::class,'updateVehicle'])->name('app.wallets.updatevehicle');

    //pets
    Route::get('/app/user/wallets/pets',[WalletController::class,'pets'])->name('app.wallets.pets');
    Route::get('/app/user/wallets/pets/add',[WalletController::class,'addPet'])->name('app.wallets.addpet');
    Route::post('/app/user/wallets/pets',[WalletController::class,'savePet'])->name('app.wallets.savepet');
    Route::get('/app/user/wallets/pets/{pet}/edit',[WalletController::class,'editPet'])->name('app.wallets.editpet');
    Route::post('/app/user/wallets/pets/{pet}/update',[WalletController::class,'updatePet'])->name('app.wallets.updatepet');

    //Insurances
    Route::get('/app/user/wallets/insurances',[WalletController::class,'insurances'])->name('app.wallets.insurances');
    Route::get('/app/user/wallets/insurances/add',[WalletController::class,'addInsurance'])->name('app.wallets.addinsurance');
    Route::post('/app/user/wallets/insurances',[WalletController::class,'saveInsurance'])->name('app.wallets.saveinsurance');
    Route::get('/app/user/wallets/insurances/{insurance}/edit',[WalletController::class,'editInsurance'])->name('app.wallets.editinsurance');
    Route::post('/app/user/wallets/insurances/{insurance}/update',[WalletController::class,'updateInsurance'])->name('app.wallets.updateinsurance');

    //Tasks
    Route::get('/app/user/tasks/add',[TaskController::class,'add'])->name('app.tasks.add');
    Route::post('/app/user/tasks/add',[TaskController::class,'save'])->name('app.tasks.save');
    Route::get('/app/user/tasks/{task}/edit',[TaskController::class,'edit'])->name('app.tasks.edit');
    Route::post('/app/user/tasks/{task}/update',[TaskController::class,'update'])->name('app.tasks.update');
    //Events
    Route::get('/app/user/events/add',[EventController::class,'add'])->name('app.events.add');
    Route::post('/app/user/events/add',[EventController::class,'save'])->name('app.events.save');
    Route::get('/app/user/events/{appevent}/edit',[EventController::class,'edit'])->name('app.events.edit');
    Route::post('/app/user/events/{appevent}/update',[EventController::class,'update'])->name('app.events.update');

    //logout
    Route::get('/app/user/logout',[AuthController::class,'logout'])->name('applogout');
});

//Dashboard Routes
Route::get('/dashboard/login', [DashBoardAuthController::class,'login'])->name('dashboard.login');
Route::post('/dashboard/login', [DashBoardAuthController::class,'authenticate'])->name('dashboard.authenticate');
Route::group(['middleware' => ['admin.auth','role:Administrator']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard.index');

    Route::get('/dashboard/logout', [DashBoardAuthController::class,'logout'])->name('dashboard.logout');

    //loantypes
    Route::get('/dashboard/loantypes/',[TypesController::class,'loanTypeIndex'])->name('dashboard.loantypes.index');
     Route::post('/dashboard/loantypes/',[TypesController::class,'loanTypeSave'])->name('dashboard.loantypes.save');
     Route::get('/dashboard/loantypes/add', [TypesController::class,'loanTypeCreate'])->name('dashboard.loantypes.add');
     Route::get('/dashboard/loantypes/list',[TypesController::class,'loanTypeList'])->name('dashboard.loantypes.list');
     Route::get('/dashboard/loantypes/{loantype}/edit', [TypesController::class,'loanTypeEdit'])->name('dashboard.loantypes.edit');
     Route::post('/dashboard/loantypes/{loantype}/update', [TypesController::class,'loanTypeUpdate'])->name('dashboard.loantypes.update');
     Route::get('/dashboard/loantypes/{loantype}/delete', [TypesController::class,'loanTypeDelete'])->name('dashboard.loantypes.delete');

     //homeothertypes 
    Route::get('/dashboard/homeothertypes/',[TypesController::class,'homeOtherTypeIndex'])->name('dashboard.homeothertypes.index');
    Route::post('/dashboard/homeothertypes/',[TypesController::class,'homeOtherTypeSave'])->name('dashboard.homeothertypes.save');
    Route::get('/dashboard/homeothertypes/add', [TypesController::class,'homeOtherTypeCreate'])->name('dashboard.homeothertypes.add');
    Route::get('/dashboard/homeothertypes/list',[TypesController::class,'homeOtherTypeList'])->name('dashboard.homeothertypes.list');
    Route::get('/dashboard/homeothertypes/{homeothertype}/edit', [TypesController::class,'homeOtherTypeEdit'])->name('dashboard.homeothertypes.edit');
    Route::post('/dashboard/homeothertypes/{homeothertype}/update', [TypesController::class,'homeOtherTypeUpdate'])->name('dashboard.homeothertypes.update');
    Route::get('/dashboard/homeothertypes/{homeothertype}/delete', [TypesController::class,'homeOtherTypeDelete'])->name('dashboard.homeothertypes.delete');

     //personalothertypes 
     Route::get('/dashboard/personalothertypes/',[TypesController::class,'personalOtherTypeIndex'])->name('dashboard.personalothertypes.index');
     Route::post('/dashboard/personalothertypes/',[TypesController::class,'personalOtherTypeSave'])->name('dashboard.personalothertypes.save');
     Route::get('/dashboard/personalothertypes/add', [TypesController::class,'personalOtherTypeCreate'])->name('dashboard.personalothertypes.add');
     Route::get('/dashboard/personalothertypes/list',[TypesController::class,'personalOtherTypeList'])->name('dashboard.personalothertypes.list');
     Route::get('/dashboard/personalothertypes/{personalothertype}/edit', [TypesController::class,'personalOtherTypeEdit'])->name('dashboard.personalothertypes.edit');
     Route::post('/dashboard/personalothertypes/{personalothertype}/update', [TypesController::class,'personalOtherTypeUpdate'])->name('dashboard.personalothertypes.update');
     Route::get('/dashboard/personalothertypes/{personalothertype}/delete', [TypesController::class,'personalOtherTypeDelete'])->name('dashboard.personalothertypes.delete');

     //vehicletypes 
     Route::get('/dashboard/vehicletypes/',[TypesController::class,'vehicleTypeIndex'])->name('dashboard.vehicletypes.index');
     Route::post('/dashboard/vehicletypes/',[TypesController::class,'vehicleTypeSave'])->name('dashboard.vehicletypes.save');
     Route::get('/dashboard/vehicletypes/add', [TypesController::class,'vehicleTypeCreate'])->name('dashboard.vehicletypes.add');
     Route::get('/dashboard/vehicletypes/list',[TypesController::class,'vehicleTypeList'])->name('dashboard.vehicletypes.list');
     Route::get('/dashboard/vehicletypes/{vehicletype}/edit', [TypesController::class,'vehicleTypeEdit'])->name('dashboard.vehicletypes.edit');
     Route::post('/dashboard/vehicletypes/{vehicletype}/update', [TypesController::class,'vehicleTypeUpdate'])->name('dashboard.vehicletypes.update');
     Route::get('/dashboard/vehicletypes/{vehicletype}/delete', [TypesController::class,'vehicleTypeDelete'])->name('dashboard.vehicletypes.delete');

     //users 
     Route::get('/dashboard/users/',[TypesController::class,'index'])->name('dashboard.users.index');
     Route::post('/dashboard/users/',[TypesController::class,'save'])->name('dashboard.users.save');
     Route::get('/dashboard/users/add', [TypesController::class,'create'])->name('dashboard.users.add');
     Route::get('/dashboard/users/list',[TypesController::class,'list'])->name('dashboard.users.list');
     Route::get('/dashboard/users/{user}/edit', [TypesController::class,'edit'])->name('dashboard.users.edit');
     Route::post('/dashboard/users/{user}/update', [TypesController::class,'update'])->name('dashboard.users.update');
     Route::get('/dashboard/users/{user}/delete', [TypesController::class,'delete'])->name('dashboard.users.delete');
});