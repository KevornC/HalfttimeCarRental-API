<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicle;
class SearchController extends Controller
{
    public function rentFilterSearch(){
        $vehicle=vehicle::all();
        return $vehicle;
    }

    public function filter(){
        $vehicle=vehicle::query();

        if(!empty($this->mod)){
            $vehicle = $vehicle->where('mod','like','%'.$this->mod.'%');
        }
        $this->searchResults = $searchResults->get();
    }

    public function options(Request $request){
        $vehicle=vehicle::query();

        if(!empty($request->model)){
            $vehicle = $vehicle->where('model','like','%'.$request->model.'%');
        }
        if(!empty($request->seatingCap)){
            $vehicle = $vehicle->where('seatingCap','=',$request->seatingCap);
        }
        if(!empty($request->driverType)){
            $vehicle = $vehicle->where('driverType','like','%'.$request->driverType.'%');
        }
        if(!empty($request->color)){
            $vehicle = $vehicle->where('color','like','%'.$request->color.'%');
        }
        // $vehicle = $vehicle->where('model','like','%'.$request->model.'%')
        //                     ->orwhere('seatingCap','=',$request->seatingCap)
        //                     ->orwhere('driverType','like','%'.$request->driverType.'%')
        //                     ->orwhere('color','like','%'.$request->color.'%')
        //                     ->get();

        $allvehicle=$vehicle->get();
        return $allvehicle;
    }

    public function rentFilterSearchView($id){
            $vSResult = vehicle::find($id);
            return $vSResult;
    }

    public function homeSearch(Request $request){
        // $sResult = 1;
        $vehicle=vehicle::query();
        if(!empty($request->sQuery)){
            $vehicle = $vehicle->where('model','like','%'.$request->sQuery.'%');
        }
       
        $allvehicle=$vehicle->get();
       
        return $allvehicle;
    }

}
