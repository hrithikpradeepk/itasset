<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\asset;
use App\Models\location;
use App\Models\manufacturer;
use App\Models\vendor;
use App\Models\box;
use App\Models\login;
use DB; 

class admincontroller extends Controller
{
    //
    public function storecat(Request $request)
    {
        
        $catname=request("name");
        
        $this->validate($request,[
            'name'=>'required',
        ]);


        $category = new category();

        $category->category_name=$catname;
        

        $category->save();
        echo "<script>alert('Successfully Added Category');window.location='/addcategory';</script>";
    }

    public function viewcat()
    {
        $category=category::all();

        return view('viewcategory',compact('category'));
    }

    public function viewcategory()
    {
        $category=categorymodel::all();
        return view('transfer',compact('category'));
    }

    public function editcat($id)
    {
        $category=category::find($id);
        return view('editcategory',compact('category'));
    }

    public function updatecat(Request $request, $id)
    {
        $category=category::find($id); 

        $name=request("name");
        
        $category->category_name=$name;
    
        
        $category->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewcategory';</script>"; 
       
    }


    public function storevendor(Request $request)
    {
        
        $name=request("name");
        
        $this->validate($request,[
            'name'=>'required',
        ]);


        $vendor = new vendor();

        $vendor->vendor_name=$name;
        

        $vendor->save();
        echo "<script>alert('Successfully Added Vendor');window.location='/addvendor';</script>";
    }


    public function viewvendor()
    {
        $vendor=vendor::all();

        return view('viewvendor',compact('vendor'));
    }

    public function storeman(Request $request)
    {
        
        $name=request("name");
        
        $this->validate($request,[
            'name'=>'required',
        ]);


        $manufacturer = new manufacturer();

        $manufacturer->manufacturer_name=$name;
        

        $manufacturer->save();
        echo "<script>alert('Successfully Added Manufacturer');window.location='/addmanufacturer';</script>";
    }


    public function storebox(Request $request)
    {
        
        $num=request("box_num");
        $vendor=request("vendor");
       
        $box = new box();
        
        $box->box_num=$num;
        $box->vendor=$vendor;

        $box->save();
        echo "<script>alert('Successfully Added box');window.location='/openbox';</script>";
    }


    public function viewman()
    {
        $manufacturer=manufacturer::all();

        return view('viewmanufacturer',compact('manufacturer'));
    }

    
    public function viewmanu()
    {
        $manufacturer=manufacturer::all();

        return view('viewmanufacturer',compact('manufacturer'));
    }

    public function viewvend()
    {
        $vendor=vendor::all();

        return view('viewvendor',compact('vendor'));
    }


    public function viewlocation()
    {  
        $location=location::all();
        return view('viewlocation',compact('location'));
    }
  

    public function transferasset()
    {
        $category=categorymodel::all();
        $categorycount=categorymodel::all()->count();
        $asset=asset::all();
        return view('transfer',compact('category','categorycount','asset'));
    }

    public function editmanu($id)
    {
        $manufacturer=manufacturer::find($id);
        return view('editmanufacturer',compact('manufacturer'));
    }

    public function editvendor($id)
    {
        $vendor=vendor::find($id);
        return view('editvendor',compact('vendor'));
    }

    public function editlocation($id)
    {
        $location=location::find($id);
        return view('editlocation',compact('location'));
    }

    public function editasset($id)
    {
        $dataasset=asset::find($id);
        $category=categorymodel::all();
        $details=detailsmodel::all();
        return view('editasset',compact('dataasset','category','details'));
    }

    

    public function updatemanu(Request $request, $id)
    {
        $manufacturer=manufacturer::find($id); 

        $name=request("name");
        
        $manufacturer->manufacturer_name=$name;
    
        
        $manufacturer->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewmanufacturer';</script>"; 
       
    }

    public function updatevendor(Request $request, $id)
    {
        $vendor=vendor::find($id); 

        $name=request("name");
        
        $vendor->vendor_name=$name;
    
        
        $vendor->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewvendor';</script>"; 
       
    }




    public function updatelocation(Request $request, $id)
    {
        $location=location::find($id); 

      
        $floor=request("floor");
        $tower=request("tower");
        $department=request("dept");

        $location->floor=$floor;
        $location->tower=$tower;   
        $location->department=$department;
        
        $location->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewlocation';</script>"; 
       
    }

    public function updateasset(Request $request, $id)
    {

        $asset=asset::find($id);
        
        $m_num=request("m_num");
        $sl_num=request("sl_num");
        $category=request("category");
        $floor=request("floor");
        $tower=request("tower");
        $department=request("department");
        $windows=request("windows");
        $license=request("license");
        $ms_office=request("ms_office");
        $keyboard_ct=request("keyboard_ct");
        $mouse_ct=request("mouse_ct");
        
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();

        $asset->category=$userInfo->Categoryname;

        $asset->model_num=$m_num;
        $asset->sl_num=$sl_num;   
        $asset->floor=$floor;
        $asset->tower=$tower;   
        $asset->department=$department;
        $asset->windows=$windows;   
        $asset->license=$license;
        $asset->ms_office=$ms_office;  
        $asset->keyboard_ct=$keyboard_ct ;  
        $asset->ms_office=$ms_office;   
       

        $asset->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewasset';</script>"; 
       
    }




    public function view()
    {
         $vendor=vendor::all();

         $box=box::all();
      
        $sl_num = DB::table('boxes')->latest('sl_num')->first();
        //dd($sl_num);
        if($sl_num ==NUll)
             $newSl=1;
        else    
            $newSl = $sl_num->sl_num +1;
         //dd($newSl);
         $year = Carbon::now()->year;
         $month = Carbon::now()->month;

         if(strlen($month)==1)
             $month="0".$month;


            
         if(strlen($newSl)==1)
             $newSl="0".$newSl;

         $date = Carbon::now()->day;
         $box->box_num="B".$year.$month.$date.$newSl;
         //dd($box->box_num);
        
        $x=$box->box_num;
        return view('openbox',compact('box','vendor','x'));
    }

    public function indexAsset(Request $request){
        $id = $request->query('id');
        //dd($id);
        $category=category::all();
        $location=location::all();
        $manufacturer=manufacturer::all();
        $vendor=box::where('sl_num',$id)->first();
        $assets=asset::where('box_num',$id)->get();
        $user=login::where('staff_id','=', session('sid'))->first();
        
        return view('assetView',compact('id','assets','category','location','manufacturer', 'vendor','user'));
    }

   /* public function get()
    {
        $category=category::all();
        $location=location::all();
        $manufacturer=manufacturer::all();
        $vendor=vendor::all();
        $user=login::where('staff_id','=', session('sid'))->first();

        return view('assetView',compact('category', 'location', 'manufacturer','vendor','user'));
    }*/

    public function storeasset(Request $request)
    {
        $box_num=request("box_num");
        $vendor=request("vendor");
        $m_num=request("m_num");
        $sl_num=request("sl_num");
        $category=request("category");
        $floor=request("floor");
        $tower=request("tower");
        $department=request("department");
        $manufacturer=request("manufacturer");
        $user=request("user");

        $asset = new asset();

        $asset->box_num=$box_num;
        $asset->vendor=$vendor;
        $asset->model_num=$m_num;
        $asset->sl_num=$sl_num;  
        $asset->category=$category;
        $asset->manufacturer=$manufacturer; 
        $asset->floor=$floor;
        $asset->tower=$tower;   
        $asset->department=$department;

        $asset->user=$user;
        
        $asset->save();
        echo "<script>alert('Successfully Added asset');window.location='/addasset  ?id=$box_num';</script>";
        

    }

    public function storeloc(Request $request)
    {
        $floor=request("floor");
        $tower=request("tower");
        $department=request("dept");
        
        
        $location = new location();

        $location->floor=$floor;
        $location->tower=$tower;   
        $location->department=$department;
    
        $location->save();
        echo "<script>alert('Successfully Added location');window.location='/location';</script>";
        

    }


    public function viewloc()
    {
        $location=location::all();
        return view('location',compact('location'));
    }


    public function viewasset(Request $request)
    {
        
        $search_text = $request->get('asset');
      //  dd($search_text);
        $asset = ($search_text != null ) ? asset::where('sl_num','LIKE','%'.$search_text.'%')->paginate(10) : asset::paginate(10);
       // $patient= patient::where('patientname','LIKE','%'.$search_text.'%')->get();
       // $data=patient::paginate(10);
        //$patientdob= Carbon::parse('patientdob');
        //$age = Carbon::parse($patientdob)->diff(Carbon::now())->y;
        //$age = $patientdob->age;

        return view('viewasset',compact('asset','search_text'));
    }
    public function viewassett()
    {
        
        $asset=asset::all();
        return view('viewasset',compact('asset'));
    }

    public function detail()
    {
        $data = ['LoggedUserInfo'=>registermodel::where('Name','=', session('sname'))->first()];
        return view ('dashboard',$data);
    }

    public function deletecategory($id)
    {
        $category=categorymodel::find($id);
        $category->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewcategory';</script>"; 
        
    }

    public function deletemanufacturer($id)
    {
        $manufacturer=manufacturer::find($id);
        $manufacturer->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewmanufacturer';</script>"; 
        
    }

    public function deletevendor($id)
    {
        $vendor=vendor::find($id);
        $vendor->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewvendor';</script>"; 
        
    }

    public function deletedetails($id)
    {
        $details=detailsmodel::find($id);
        $details->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewdetails';</script>"; 
        
    }
    public function deleteasset($id)
    {
        $asset=asset::find($id);
        $asset->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewasset';</script>"; 
        
    }

}


