<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicle;
use App\Models\member;
use App\Models\order;


class VehicleController extends Controller
{
    public function vehicleAdd(Request $request){
        $veh=vehicle::create([
            'image' => $request->image,
            'name' => $request->name,
            'model' => $request->model,
            'rentalCost' => $request->rentalCost,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'seatingCap' => $request->seatingCap,
            'driverType' => $request->driverType
        ])->id;
        return 1;
    }

    public function vehicleGet(){

        // $vehicles=vehicle::all();
        $vehicles=vehicle::where('bin','!=',1)->get();

        return $vehicles;
    }

    public function vehicleEditGet($id){

        $vehicleEdit=vehicle::find($id);

        return $vehicleEdit;
        // return $id;
    }

    public function vehicleDelete($id){
        // $vehicleDelete=vehicle::destroy($id);
        $vehicleDelete=vehicle::find($id)->update([
            'bin' => 1
        ]);
        
        return $vehicleDelete;
    }

    public function vehicleUpdate(Request $request,$id){
        vehicle::find($id)->update([
            'image' => $request->image,
            'name' => $request->name,
            'model' => $request->model,
            'rentalCost' => $request->rentalCost,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'seatingCap' => $request->seatingCap,
            'driverType' => $request->driverType
        ]);
        $vehicleEdit=vehicle::find($id);

        return $vehicleEdit;
        // return $id;
    }

    public function Stats(){
        $totalVehicle = vehicle::where('bin','!=',1)->count();
        $totalOrder = order::count();
        $totalMember = member::count();
        $totalApproved = order::where('status','=','Approved')->count();
        $totalDenied = order::where('status','=','Denied')->count();
        $totalPending = order::where('status','=','sent for approval')->count();
        
        $stats=array(
            'tV' =>$totalVehicle,
            'tO' =>$totalOrder,
            'tM' =>$totalMember,
            'tP' =>$totalPending,
            'tA' =>$totalApproved,
            'tD' =>$totalDenied,
        );
        return $stats; 
    }

    public function homepageVehicles(){
        $veh=vehicle::where('bin','!=',1)->get();
        return $veh;
    }
   
}
