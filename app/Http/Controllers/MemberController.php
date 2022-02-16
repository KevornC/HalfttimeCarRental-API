<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
class MemberController extends Controller
{
    public function memberGet(){
        $member = member::all();
        return $member;
    }
    public function memberProfile($id){
        $memberP= member::find($id);
        return $memberP;
    }
    public function UpdateMemberProfile(Request $request,$id){
        // return $request;
        member::find($id)->update([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'gender'=> $request->gender,
            'phone'=>$request->tel,
            'email'=>$request->email,
            'photo'=> $request->photo,
            'address'=>$request->add,
            'trn'=>$request->trn,
            'country'=>$request->coun,
        ]);
        // return $request->fname;
    }

    public function userSignup(Request $request){
        member::create([
            'fname' => $request->firstnm,
            'lname' => $request->lastnm,
            'gender'=> $request->gender,
            'address'=> $request->addr,
            'country'=> $request->coun,
            'photo'=> $request->phot,
            'trn'=> $request->trn,
            'phone'=> $request->tel,
            'email'=> $request->email,
            'password'=> $request->pass
        ]);
        return 1;
        // $request->pass;
    }
}
