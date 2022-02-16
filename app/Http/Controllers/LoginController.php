<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function userLogin(Request $request){

        $email=$request->email;
        $mem=member::where('email',$email)->get();
        foreach ($mem as $key) {
            # code...
            $hashedPassword=$key->password;
            $memID=$key->id;
        }
    //    return $hashedPassword;
        // $hashpassword=Hash::make($request->password);
        // $password=$request->password;

        $plaintext_password=$request->password;
        $verify = password_verify($plaintext_password, $hashedPassword);
  
        // Print the result depending if they match
        if ($verify) {
            // echo 'Password Verified!';
            return $memID;
        } else {
            // echo 'Incorrect Password!';
            return 202;
        }

        // if (Hash::check($password, $hashedPassword)) {
        //     // The passwords match...
        //     return $memID;
        // }else{
        //     return 202;
        // }
    }
    public function adminLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $authID=Auth()->user()->id;
            return $authID;
        }else{
            return 202;
        }
    }

  
}
