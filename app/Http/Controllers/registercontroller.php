<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\registercontroller;
use App\Models\login;
use App\Models\location;
use App\Models\category;


class registercontroller extends Controller
{
    //
    public function create()
    {
        return view('register');
        return view('login');
    }

    public function store(Request $request)
    {
        $name=request("name");
        $id=request("id");
        $email=request("email");
        $passw=request("password");
        $cpass=request("cpassword");


        if($passw == $cpass)
        {
        //$pass=Hash::make($passw);
        $pass = Crypt::encryptString($passw);
        $login= new login();
        $login->name=$name;
        $login->staff_id=$id;
        $login->email=$email;
        $login->password=$pass;
        $login->save();

        

        if($login)
             {
               
                echo "<script>alert('Success! Customer Added!');window.location='/';</script>"; 
             }
             else{
                echo "<script>alert('Something went Wrong!');window.location='/register';</script>"; 
             }


            
        }

        else{

            echo "<script>alert('Passwords Doesnt match!');window.location='/register';</script>"; 
        }
       
    }
    
    
    public function view()
    {
        $category=category::all();
        $floor=location::all();
        $tower=location::all();
        $department=location::all();
        $windows=location::all();
        $ms_office=location::all();
        $user=login::where('staff_id','=', session('sid'))->first();
        return view('addasset',compact('category','floor','tower','department','windows','ms_office','user'));
    }




    public function check(Request $request)
    {
        $id=request('id');
        $pass=request('password');
       
        //$name=$request->input();
        // $request->session()->put('sname',$getuser);
        // echo session('sname');
        $u=login::select('staff_id')->where('staff_id','like',"$id")->first();
        
        if(!$u)
        {
            echo "<script>alert('No User found');window.location='/';</script>"; 
         
        }
        else
        {
            $p=login::select('password')->where('staff_id','like',"$id")->first();
            //echo $p->password;
            
            if($p->password != $pass)
                {
                    $pass1 = Crypt::decryptString($p->password);
                }
                if($pass1 == $pass)
                {
                    
                        $i=login::where('staff_id','like',"$id")->first();
                        $request->session()->put('sid',$i->staff_id);
                      
                        return redirect('/viewassets');
                }
                else
                {
                    echo "<script>alert('Invalid Credentials');window.location='/';</script>";
                    // return redirect('/');
            }
        }

    }
    public function profile()
    {
        $user=login::where('staff_id','=', session('sid'))->first();
        return view ('profile',compact('user'));
    }


}
