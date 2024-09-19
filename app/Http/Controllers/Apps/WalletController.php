<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\LoanType;
use App\Models\PersonalOtherType;
use App\Models\PersonalWallet;
use App\Models\InsuranceWallet;
use App\Models\LoanWallet;
use App\Models\HomeWallet;
use App\Models\VehicleWallet;
use App\Models\PetWallet;
use App\Models\PersonalOtherWallet;
use App\Models\HomeOtherWallet;
use App\Models\HomeOtherType;
use App\Models\VehicleType;
use App\Models\InsuranceType;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    function getWallets(Request $request){
        return view('app.wallets.wallets',['header_footer'=>1]);
    }
    function editWallet(Request $request, UserWallet $wallet){
        return view('app.wallets.editwallet',['wallet'=>$wallet]);
    }
    function deleteWallet(Request $request, UserWallet $wallet){
        $wallet->delete();

        return redirect()->back();
    }
    function updateWallet(Request $request, UserWallet $wallet){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()){
            $msg=$validator->errors()->first('name');
            return response()->json(['error'=>1,'msg'=>$msg,'data'=>['name'=>$request->name,'colour'=>$request->colour,'icon'=>$request->icon]]);
        }
        $wallet->update(['name'=>$request->name,'colour'=>$request->colour,'icon'=>$request->icon]);

        return response()->json(['error'=>0,'msg'=>'success']);
    }
    function addUserWallet(Request $request, $wallet){
        $walletname='';
        $walletslug='';
        $walletcolour='';
        if($wallet=='vehicle'){
            $walletname='Vehicle';
            $walletslug='vehicle';
            $walletcolour='#DBFF4F';
        }
        if($wallet=='pets'){
            $walletname='Pets';
            $walletslug='pets';
            $walletcolour='#37A0A6';
        }
        if($wallet=='insurance'){
            $walletname='Insurance';
            $walletslug='insurance';
            $walletcolour='#DBFF4F';
        }
        if($wallet=='holidays'){
            $walletname='Holidays';
            $walletslug='holidays';
            $walletcolour='#DBFF4F';
        }
        $user=auth()->user();
        $user->wallets()->create(['name'=>$walletname,'slug'=>$walletslug,'colour'=>$walletcolour]);
        return redirect()->back();
    }
    function lifeAdmin(Request $request){
        //$loantypes=LoanType::all();
        return view('app.wallets.lifeadminlist',['header_footer'=>1]);
    }
    function addLifeAdmin(Request $request){
        //$loantypes=LoanType::all();
        return view('app.wallets.lifeadminwallet',['header_footer'=>1]);
    }
    function editLifeAdmin(Request $request,PersonalWallet $personal){
        $loantypes=LoanType::all();
        $othertypes=PersonalOtherType::all();
        return view('app.wallets.lifeadminwalletedit',['header_footer'=>1,'personal'=>$personal,'loantypes'=>$loantypes,'othertypes'=>$othertypes]);
    }
    function getLoanPartial(Request $request){
        $loantypes=LoanType::all();
        return view('app.wallets.partials.loan',['loantypes'=>$loantypes]);
    }
    function getOtherPartial(Request $request,$type){
        
        if($type=='personal'){
            $othertypes=PersonalOtherType::all();
        }elseif($type=='home'){
            $othertypes=HomeOtherType::all();
        }
        
        return view('app.wallets.partials.other',['othertypes'=>$othertypes]);
    }
    function saveLifeAdmin(Request $request){
        $lifeadmindata=[
            'user_id'=>auth()->user()->id,
            'passport_number'=>$request->passport_number, 
            'passport_expire_date'=>$request->passport_expire_date, 
            'passport_start_date'=>$request->passport_start_date, 
            'passport_issued_location'=>$request->passport_issued_location, 
            'passport_reminder_date'=>$request->passport_reminder_date, 
            'driving_license_number'=>$request->driving_license_number, 
            'driving_license_start_date'=>$request->driving_license_start_date, 
            'driving_license_expire_date'=>$request->driving_license_expire_date
        ];
        $wallet=PersonalWallet::create($lifeadmindata);
        if(!empty($request->insurance_company_name)){
            $lifeinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$wallet->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $insurancewallet=InsuranceWallet::create($lifeinsurancedata);
        }
        
        if($request->has('loan_type')){
            $i=0;
            foreach($request->loan_type as $loantype){
                if(!empty($loantype)){
                    $ltype=LoanType::find($loantype);
                    $loandata=[
                        'user_id'=>auth()->user()->id, 
                        'wallet_id'=>$wallet->id, 
                        'loan_type_id'=>$ltype->id, 
                        'loan_type_name'=>$ltype->name, 
                        'company_name'=>$request->loan_company_name[$i], 
                        'amount'=>$request->loan_amount[$i], 
                        'policy_number'=>$request->loan_policy_number[$i], 
                        'telephone_number'=>$request->loan_telephone_number[$i], 
                        'renewal_date'=>$request->loan_renewal_date[$i], 
                        'reminder_date'=>$request->loan_reminder_date[$i]
                    ];
                    $loanwallet=LoanWallet::create($loandata);
                }
                $i++;
            }
        }
        if($request->has('other_type')){
            $i=0;
            foreach($request->other_type as $othertype){
                if(!empty($othertype)){
                    $otype=PersonalOtherType::find($othertype);
                    $otherdata=[
                        'user_id'=>auth()->user()->id, 
                        'wallet_id'=>$wallet->id, 
                        'personalother_type_id'=>$otype->id, 
                        'personalother_type_name'=>$otype->name, 
                        'label'=>$request->other_label[$i],
                        'company_name'=>$request->other_company_name[$i], 
                        'telephone_number'=>$request->other_telephone_number[$i], 
                        'renewal_date'=>$request->other_renewal_date[$i], 
                        'reminder_date'=>$request->other_reminder_date[$i],
                        'contact'=>$request->other_contact[$i]
                    ];
                    $otherwallet=PersonalOtherWallet::create($otherdata);
                }
                $i++;
            }
        }
        return redirect()->route('app.wallets.lifeadmin');
    }
    function updateLifeAdmin(Request $request, PersonalWallet $personal){
        $lifeadmindata=[
            'user_id'=>auth()->user()->id,
            'passport_number'=>$request->passport_number, 
            'passport_expire_date'=>$request->passport_expire_date, 
            'passport_start_date'=>$request->passport_start_date, 
            'passport_issued_location'=>$request->passport_issued_location, 
            'passport_reminder_date'=>$request->passport_reminder_date, 
            'driving_license_number'=>$request->driving_license_number, 
            'driving_license_start_date'=>$request->driving_license_start_date, 
            'driving_license_expire_date'=>$request->driving_license_expire_date
        ];
        $personal->update($lifeadmindata);
        if(!empty($request->insurance_company_name)){
            $lifeinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$personal->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $personal->insurance()->update($lifeinsurancedata);
        }
        $personal->loans()->delete();
        if($request->has('loan_type')){
            $i=0;
            foreach($request->loan_type as $loantype){
                if(!empty($loantype)){
                    $ltype=LoanType::find($loantype);
                    $loandata=[
                        'user_id'=>auth()->user()->id, 
                        'wallet_id'=>$personal->id, 
                        'loan_type_id'=>$ltype->id, 
                        'loan_type_name'=>$ltype->name, 
                        'company_name'=>$request->loan_company_name[$i], 
                        'amount'=>$request->loan_amount[$i], 
                        'policy_number'=>$request->loan_policy_number[$i], 
                        'telephone_number'=>$request->loan_telephone_number[$i], 
                        'renewal_date'=>$request->loan_renewal_date[$i], 
                        'reminder_date'=>$request->loan_reminder_date[$i]
                    ];
                    $loanwallet=LoanWallet::create($loandata);
                }
                $i++;
            }
        }
        $personal->others()->delete();
        if($request->has('other_type')){
            $i=0;
            foreach($request->other_type as $othertype){
                if(!empty($othertype)){
                    $otype=PersonalOtherType::find($othertype);
                    $otherdata=[
                        'user_id'=>auth()->user()->id, 
                        'wallet_id'=>$personal->id, 
                        'personalother_type_id'=>$otype->id, 
                        'personalother_type_name'=>$otype->name, 
                        'label'=>$request->other_label[$i],
                        'company_name'=>$request->other_company_name[$i], 
                        'telephone_number'=>$request->other_telephone_number[$i], 
                        'renewal_date'=>$request->other_renewal_date[$i], 
                        'reminder_date'=>$request->other_reminder_date[$i],
                        'contact'=>$request->other_contact[$i]
                    ];
                    $otherwallet=PersonalOtherWallet::create($otherdata);
                }
                $i++;
            }
        }
        return redirect()->route('app.wallets.lifeadmin');
    }
    function homes(Request $request){
        //$loantypes=LoanType::all();
        return view('app.wallets.homewalletlist',['header_footer'=>1]);
    }
    function addHome(Request $request){
        //$loantypes=LoanType::all();
        return view('app.wallets.homewallet',['header_footer'=>1]);
    }
    function editHome(Request $request, HomeWallet $home){
        //$loantypes=LoanType::all();
        $othertypes=HomeOtherType::all();
        return view('app.wallets.homewalletedit',['header_footer'=>1,'home'=>$home,'othertypes'=>$othertypes]);
    }
    function saveHome(Request $request){
        $homedata=[
            'user_id'=>auth()->user()->id,
            'home_address_label'=>$request->home_address_label,
            'home_address_1'=>$request->home_address_1,
            'home_address_2'=>$request->home_address_2,
            'home_address_town'=>$request->home_address_town,
            'home_address_city'=>$request->home_address_city,
            'home_address_postcode'=>$request->home_address_postcode,
            'home_mortgage_company_name'=>$request->home_mortgage_company_name,
            'home_mortgage_amount'=>$request->home_mortgage_amount,
            'home_mortgage_policy_number'=>$request->home_mortgage_policy_number,
            'home_mortgage_telephone_number'=>$request->home_mortgage_telephone_number,
            'home_mortgage_renewal_date'=>$request->home_mortgage_renewal_date,
            'home_mortgage_reminder_date'=>$request->home_mortgage_reminder_date
        ];
        $wallet=HomeWallet::create($homedata);

        if(!empty($request->insurance_company_name)){
            $lifeinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$wallet->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $insurancewallet=InsuranceWallet::create($lifeinsurancedata);
        }
        
       
        if($request->has('other_type')){
            $i=0;
            foreach($request->other_type as $othertype){
                if(!empty($othertype)){
                    $otype=HomeOtherType::find($othertype);
                    $otherdata=[
                        'user_id'=>auth()->user()->id, 
                        'wallet_id'=>$wallet->id, 
                        'homeother_type_id'=>$otype->id, 
                        'homeother_type_name'=>$otype->name, 
                        'label'=>$request->other_label[$i],
                        'company_name'=>$request->other_company_name[$i], 
                        'telephone_number'=>$request->other_telephone_number[$i], 
                        'renewal_date'=>$request->other_renewal_date[$i], 
                        'reminder_date'=>$request->other_reminder_date[$i],
                        'contact'=>$request->other_contact[$i]
                    ];
                    $otherwallet=HomeOtherWallet::create($otherdata);
                }
                $i++;
            }
        }
        return redirect()->route('app.wallets.homes');
    }
    function updateHome(Request $request,HomeWallet $home){
        $homedata=[
            'user_id'=>auth()->user()->id,
            'home_address_label'=>$request->home_address_label,
            'home_address_1'=>$request->home_address_1,
            'home_address_2'=>$request->home_address_2,
            'home_address_town'=>$request->home_address_town,
            'home_address_city'=>$request->home_address_city,
            'home_address_postcode'=>$request->home_address_postcode,
            'home_mortgage_company_name'=>$request->home_mortgage_company_name,
            'home_mortgage_amount'=>$request->home_mortgage_amount,
            'home_mortgage_policy_number'=>$request->home_mortgage_policy_number,
            'home_mortgage_telephone_number'=>$request->home_mortgage_telephone_number,
            'home_mortgage_renewal_date'=>$request->home_mortgage_renewal_date,
            'home_mortgage_reminder_date'=>$request->home_mortgage_reminder_date
        ];
        $home->update($homedata);

        if(!empty($request->insurance_company_name)){
            $lifeinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$home->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $home->insurance()->update($lifeinsurancedata);
        }
        
        $home->others()->delete();
        if($request->has('other_type')){
            $i=0;
            foreach($request->other_type as $othertype){
                if(!empty($othertype)){
                    $otype=HomeOtherType::find($othertype);
                    $otherdata=[
                        'user_id'=>auth()->user()->id, 
                        'wallet_id'=>$home->id, 
                        'homeother_type_id'=>$otype->id, 
                        'homeother_type_name'=>$otype->name, 
                        'label'=>$request->other_label[$i],
                        'company_name'=>$request->other_company_name[$i], 
                        'telephone_number'=>$request->other_telephone_number[$i], 
                        'renewal_date'=>$request->other_renewal_date[$i], 
                        'reminder_date'=>$request->other_reminder_date[$i],
                        'contact'=>$request->other_contact[$i]
                    ];
                    $otherwallet=HomeOtherWallet::create($otherdata);
                }
                $i++;
            }
        }
        return redirect()->route('app.wallets.homes');
    }
    function vehicles(Request $request){
        //$loantypes=LoanType::all();
        return view('app.wallets.vehiclewalletlist',['header_footer'=>1]);
    }
    function addVehicle(Request $request){
        $vehicletypes=VehicleType::all();
        return view('app.wallets.vehiclewallet',['header_footer'=>1,'vehicletypes'=>$vehicletypes]);
    }
    function editVehicle(Request $request, VehicleWallet $vehicle){
        $vehicletypes=VehicleType::all();
        return view('app.wallets.vehiclewalletedit',['header_footer'=>1,'vehicletypes'=>$vehicletypes,'vehicle'=>$vehicle]);
    }
    function saveVehicle(Request $request){
        $vtypeid=1;
        $vtypename='Car';
        if(!empty($request->vehicle_type)){
            $vtype=VehicleType::find($request->vehicle_type);
            if($vtype){
                $vtypeid=$vtype->id;
                $vtypename=$vtype->name;
            }
        }
        

        $vehicledata=[
            'user_id'=>auth()->user()->id,
            'vehicle_type_id'=>$vtypeid, 
            'vehicle_type_name'=>$vtypename, 
            'vehicle_registration'=>$request->vehicle_registration, 
            'vehicle_make'=>$request->vehicle_make, 
            'vehicle_model'=>$request->vehicle_model, 
            'vehicle_photo'=>$request->vehicle_photo, 
            'mot_renewal_date'=>$request->mot_renewal_date, 
            'mot_reminder_date'=>$request->mot_reminder_date, 
            'service_garage'=>$request->service_garage, 
            'service_telephone_number'=>$request->service_telephone_number, 
            'service_last_date'=>$request->service_last_date, 
            'service_cost'=>$request->service_cost, 
            'service_next_Date'=>$request->service_next_date, 
            'service_reminder_date'=>$request->service_reminder_date, 
            'roadside_assistance_company_name'=>$request->roadside_assistance_company_name, 
            'roadside_assistance_amount'=>$request->roadside_assistance_amount, 
            'roadside_assistance_telephone_number'=>$request->roadside_assistance_telephone_number, 
            'roadside_assistance_policy_number'=>$request->roadside_assistance_policy_number, 
            'roadside_assistance_renewal_date'=>$request->roadside_assistance_renewal_date, 
            'roadside_assistance_reminder_date'=>$request->roadside_assistance_reminder_date
        ];
        $wallet=VehicleWallet::create($vehicledata);

        if(!empty($request->insurance_company_name)){
            $vehicleinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$wallet->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $insurancewallet=InsuranceWallet::create($vehicleinsurancedata);
        }
        if(!empty($request->loan_company_name)){
            
            $loandata=[
                'user_id'=>auth()->user()->id, 
                'wallet_id'=>$wallet->id, 
                'loan_type_id'=>$request->loan_type_id, 
                'loan_type_name'=>$request->loan_type_name, 
                'company_name'=>$request->loan_company_name, 
                'amount'=>$request->loan_amount, 
                'policy_number'=>$request->loan_policy_number, 
                'telephone_number'=>$request->loan_telephone_number, 
                'renewal_date'=>$request->loan_renewal_date, 
                'reminder_date'=>$request->loan_reminder_date
            ];
            $loanwallet=LoanWallet::create($loandata);
        }
        return redirect()->route('app.wallets.vehicles');
    }
    function updateVehicle(Request $request, VehicleWallet $vehicle){
        $vtype=VehicleType::find($request->vehicle_type);
        $vehicledata=[
            'user_id'=>auth()->user()->id,
            'vehicle_type_id'=>$vtype->id, 
            'vehicle_type_name'=>$vtype->name, 
            'vehicle_registration'=>$request->vehicle_registration, 
            'vehicle_make'=>$request->vehicle_make, 
            'vehicle_model'=>$request->vehicle_model, 
            'vehicle_photo'=>$request->vehicle_photo, 
            'mot_renewal_date'=>$request->mot_renewal_date, 
            'mot_reminder_date'=>$request->mot_reminder_date, 
            'service_garage'=>$request->service_garage, 
            'service_telephone_number'=>$request->service_telephone_number, 
            'service_last_date'=>$request->service_last_date, 
            'service_cost'=>$request->service_cost, 
            'service_next_Date'=>$request->service_next_date, 
            'service_reminder_date'=>$request->service_reminder_date, 
            'roadside_assistance_company_name'=>$request->roadside_assistance_company_name, 
            'roadside_assistance_amount'=>$request->roadside_assistance_amount, 
            'roadside_assistance_telephone_number'=>$request->roadside_assistance_telephone_number, 
            'roadside_assistance_policy_number'=>$request->roadside_assistance_policy_number, 
            'roadside_assistance_renewal_date'=>$request->roadside_assistance_renewal_date, 
            'roadside_assistance_reminder_date'=>$request->roadside_assistance_reminder_date
        ];
        $vehicle->update($vehicledata);

        if(!empty($request->insurance_company_name)){
            $vehicleinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$vehicle->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $vehicle->insurance()->update($vehicleinsurancedata);
        }
        if(!empty($request->loan_company_name)){
            
            $loandata=[
                'user_id'=>auth()->user()->id, 
                'wallet_id'=>$vehicle->id, 
                'loan_type_id'=>$request->loan_type_id, 
                'loan_type_name'=>$request->loan_type_name, 
                'company_name'=>$request->loan_company_name, 
                'amount'=>$request->loan_amount, 
                'policy_number'=>$request->loan_policy_number, 
                'telephone_number'=>$request->loan_telephone_number, 
                'renewal_date'=>$request->loan_renewal_date, 
                'reminder_date'=>$request->loan_reminder_date
            ];
            $vehicle->loan()->update($loandata);
        }
        return redirect()->route('app.wallets.vehicles');
    }
    function pets(Request $request){
        //$loantypes=LoanType::all();
        return view('app.wallets.petwalletlist',['header_footer'=>1]);
    }
    function addPet(Request $request){
        $vehicletypes=VehicleType::all();
        return view('app.wallets.petwallet',['header_footer'=>1]);
    }
    function editPet(Request $request, PetWallet $pet){
        $vehicletypes=VehicleType::all();
        return view('app.wallets.petwalletedit',['header_footer'=>1,'pet'=>$pet]);
    }
    function savePet(Request $request){
        $petdata=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->pet_name,
            'date_of_birth'=>$request->date_of_birth,
            'checkup'=>$request->checkup,
            'chip_number'=>$request->chip_number,
            'pedigree_certificate'=>$request->pedigree_certificate,
            'vet_name'=>$request->vet_name,
            'vet_telephone_number'=>$request->vet_telephone_number,
            'medications'=>$request->has('medications')?implode('~~',$request->medications):''
        ];
        $wallet=PetWallet::create($petdata);

        if(!empty($request->insurance_company_name)){
            $petinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$wallet->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $insurancewallet=InsuranceWallet::create($petinsurancedata);
        }
        
        return redirect()->route('app.wallets.pets');
    }
    function updatePet(Request $request, PetWallet $pet){
        $petdata=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->pet_name,
            'date_of_birth'=>$request->date_of_birth,
            'checkup'=>$request->checkup,
            'chip_number'=>$request->chip_number,
            'pedigree_certificate'=>$request->pedigree_certificate,
            'vet_name'=>$request->vet_name,
            'vet_telephone_number'=>$request->vet_telephone_number,
            'medications'=>$request->has('medications')?implode('~~',$request->medications):''
        ];
        $pet->update($petdata);
        
        if(!empty($request->insurance_company_name)){
            $petinsurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>$pet->id, 
                'insurance_type_id'=>$request->insurance_type_id, 
                'insurance_type_name'=>$request->insurance_type_name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $pet->insurance()->update($petinsurancedata);
        }
        
        return redirect()->route('app.wallets.pets');
    }
    function insurances(Request $request){
        
        return view('app.wallets.insurancewalletlist',['header_footer'=>1]);
    }
    function addInsurance(Request $request){
        $insurancetypes=InsuranceType::all();
        return view('app.wallets.insurancewallet',['header_footer'=>1,'insurancetypes'=>$insurancetypes]);
    }
    function saveInsurance(Request $request){
       

        if(!empty($request->insurance_type)){
            $itype=InsuranceType::find($request->insurance_type);
            $insurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>0, 
                'insurance_type_id'=>$itype->id, 
                'insurance_type_name'=>$itype->name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $insurancewallet=InsuranceWallet::create($insurancedata);
        }
        
        return redirect()->route('app.wallets.insurances');
    }
    function editInsurance(Request $request, InsuranceWallet $insurance){
        $insurancetypes=InsuranceType::all();
        return view('app.wallets.insurancewalletedit',['header_footer'=>1,'insurancetypes'=>$insurancetypes,'insurance'=>$insurance]);
    }
    function updateInsurance(Request $request, InsuranceWallet $insurance){
       

        if(!empty($request->insurance_type)){
            $itype=InsuranceType::find($request->insurance_type);
            $insurancedata=[
                'user_id'=>auth()->user()->id,
                'wallet_id'=>0, 
                'insurance_type_id'=>$itype->id, 
                'insurance_type_name'=>$itype->name, 
                'company_name'=>$request->insurance_company_name, 
                'telephone_number'=>$request->insurance_telephone_number, 
                'policy_number'=>$request->insurance_policy_number, 
                'cost'=>$request->insurance_cost, 
                'renewable_date'=>$request->insurance_renewal_date, 
                'claim_number'=>$request->insurance_claim_number, 
                'reminder_date'=>$request->insurance_reminder_date
            ];
            $insurance->update($insurancedata);
        }
        
        return redirect()->route('app.wallets.insurances');
    }
}
