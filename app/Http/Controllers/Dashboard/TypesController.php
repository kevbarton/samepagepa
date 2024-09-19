<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LoanType;
use App\Models\HomeOtherType;
use App\Models\PersonalOtherType;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Datatables;

class TypesController extends Controller
{
    //Loan Types
    function loanTypeIndex(Request $request){
        return view('admin.loantypes.index');
    }
    function loanTypeCreate(Request $request){
        return view('admin.loantypes.create');
    }
    function loanTypeSave(){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $loantypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        LoanType::create($loantypedata);

        return redirect(route('dashboard.loantypes.index'));
    }
    function loanTypeEdit(Request $request, LoanType $loantype){
        return view('admin.loantypes.edit',['type'=>$loantype]);
    }
    function loanTypeupdate(Request $request, LoanType $loantype){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $loantypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $loantype->update($loantypedata);
        return redirect(route('dashboard.loantypes.index'));
    }
    function loanTypeDelete(Request $request, LoanType $loantype){
        $loantype->delete();
        return redirect(route('dashboard.loantypes.index'));
    }
    function loanTypeList(){
        $loantypes = LoanType::select(['id','name']);

        return Datatables::of($loantypes)
            ->addColumn('actions', 'admin.loantypes.actions')
            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make(true);
    }



    //Home Other Types
    function homeOtherTypeIndex(Request $request){
        return view('admin.homeothertypes.index');
    }
    function homeOtherTypeCreate(Request $request){
        return view('admin.homeothertypes.create');
    }
    function homeOtherTypeSave(){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $homeothertypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        HomeOtherType::create($homeothertypedata);

        return redirect(route('dashboard.homeothertypes.index'));
    }
    function homeOtherTypeEdit(Request $request, HomeOtherType $homeothertype){
        return view('admin.homeothertypes.edit',['type'=>$homeothertype]);
    }
    function homeOtherTypeupdate(Request $request, HomeOtherType $homeothertype){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $homeothertypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $homeothertype->update($homeothertypedata);
        return redirect(route('dashboard.homeothertypes.index'));
    }
    function homeOtherTypeDelete(Request $request, HomeOtherType $homeothertype){
        $homeothertype->delete();
        return redirect(route('dashboard.homeothertypes.index'));
    }
    function homeOtherTypeList(){
        $homeothertypes = HomeOtherType::select(['id','name']);

        return Datatables::of($homeothertypes)
            ->addColumn('actions', 'admin.homeothertypes.actions')

            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make(true);
    }

    //Personal Other Types
    function personalOtherTypeIndex(Request $request){
        return view('admin.personalothertypes.index');
    }
    function personalOtherTypeCreate(Request $request){
        return view('admin.personalothertypes.create');
    }
    function personalOtherTypeSave(){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $personalothertypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        PersonalOtherType::create($personalothertypedata);

        return redirect(route('dashboard.personalothertypes.index'));
    }
    function personalOtherTypeEdit(Request $request, PersonalOtherType $personalothertype){
        return view('admin.personalothertypes.edit',['type'=>$personalothertype]);
    }
    function personalOtherTypeupdate(Request $request, PersonalOtherType $personalothertype){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $personalothertypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $personalothertype->update($personalothertypedata);
        return redirect(route('dashboard.personalothertypes.index'));
    }
    function personalOtherTypeDelete(Request $request, PersonalOtherType $personalothertype){
        $personalothertype->delete();
        return redirect(route('dashboard.personalothertypes.index'));
    }
    function personalOtherTypeList(){
        $personalothertypes = PersonalOtherType::select(['id','name']);

        return Datatables::of($personalothertypes)
            ->addColumn('actions', 'admin.personalothertypes.actions')

            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make(true);
    }

    //Vehicle Types
    function vehicleTypeIndex(Request $request){
        return view('admin.vehicletypes.index');
    }
    function vehicleTypeCreate(Request $request){
        return view('admin.vehicletypes.create');
    }
    function vehicleTypeSave(){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $vehicletypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        VehicleType::create($vehicletypedata);

        return redirect(route('dashboard.vehicletypes.index'));
    }
    function vehicleTypeEdit(Request $request, VehicleType $vehicletype){
        return view('admin.vehicletypes.edit',['type'=>$vehicletype]);
    }
    function vehicleTypeupdate(Request $request, VehicleType $vehicletype){
        $validations=[
            'name'=>['min:3','required'],
        ];
        $request->validate($validations);
        $vehicletypedata=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $vehicletype->update($vehicletypedata);
        return redirect(route('dashboard.vehicletypes.index'));
    }
    function vehicleTypeDelete(Request $request, VehicleType $vehicletype){
        $vehicletype->delete();
        return redirect(route('dashboard.vehicletypes.index'));
    }
    function vehicleTypeList(){
        $vehicletypes = VehicleType::select(['id','name']);

        return Datatables::of($vehicletypes)
            ->addColumn('actions', 'admin.vehicletypes.actions')
            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make(true);
    }
}
