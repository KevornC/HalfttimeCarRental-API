<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\vehicle;
use App\Models\User;
class OrderController extends Controller
{
    public function orderGet(){
        $order=order::all();
        return $order;
    }
 
//     public function vehicleFeaturedGet(){
//         $featured=order::where('approvedBy','!=',null)->get('vehicleID');
//         $o=order::count();
//         $vCount=vehicle::count();
//         $v=vehicle::get('id');
//         $a=array();
  
//     foreach($featured as $feat){
//             array_push($a,$feat->vehicleID);
//         }
//         // return $a;
       
//         $vals = array_count_values($a);

//         $b=array();
  
//         foreach($vals as $value){
//             // $n=$key;
//             if($value>=2){
//                 array_push($b,$vals);
//                 $n=$vals[11];
//             }
//         }
//             // $bvals = array_count_values($b);
//         return $n;
// }

    public function vehicleRent(Request $request, $id){
        $rentRequest = order::create([
        'memberID' => $request->userID,
        'vehicleID' => $id,
        'startDate' => $request->start,
        'endDate' => $request->end,
        'quantity' => $request->quantity,
        'status' => 'sent for approval',
        'approvedBy' => 'not assigned'
        ]);

      
        return 1;
    }
    public function RentOrderView(){
        $orderList= order::with('member','vehicle')->where('status','=','sent for approval')->get();
        return $orderList;
    }

    public function approveOrder($id,$uID){
        $order=order::find($id);
        $vehID=$order->vehicleID;
        $vehicle=vehicle::find($vehID);
// return $vehicle;
        if($order->quantity<=$vehicle->quantity){
            $quan=$vehicle->quantity-$order->quantity;
        }else{
            //throw a error and say nothing else nuh deh yah said by shaneika aka gods gift aka shani aka my boo aka best sister to her brother aka best daughter in the owkldmd
        return 0;
        }
        $vehicle->quantity=$quan;
        $vehicle->Save();
        $user=user::find($uID);
        $admin = $user->fname." ".$user->lname;
        order::find($id)->update([
            'status' => 'Approved',
            'approvedBy' => $admin
        ]);

        return 1;
    }
    public function denyOrder($id,$uID){
        $user=user::find($uID);
        $admin = $user->fname." ".$user->lname;
        order::find($id)->update([
            'status' => 'Denied',
            'approvedBy' => $admin
        ]);

        return 1;
    }

    public function memberOrders($id){
        $mO=order::with('vehicle')->where('memberID','=',$id)->get();
        return $mO;
    }
}
