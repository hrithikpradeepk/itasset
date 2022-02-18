<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\asset;
use App\Models\location;
use App\Models\manufacturer;
use App\Models\vendor;

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

    public function viewlocation()
    {  
        $location=location::all();
        return view('viewlocation',compact('location'));
    }

    public function viewasset()
    {
        $asset=assetsmodel::all();
        return view('viewasset',compact('asset'));
    }

    

    public function transferasset()
    {
        $category=categorymodel::all();
        $categorycount=categorymodel::all()->count();
        $asset=assetsmodel::all();
        return view('transfer',compact('category','categorycount','asset'));
    }

    public function editmanu($id)
    {
        $manufacturer=manufacturer::find($id);
        return view('editmanufacturer',compact('manufacturer'));
    }

    public function editlocation($id)
    {
        $location=location::find($id);
        return view('editlocation',compact('location'));
    }

    public function editasset($id)
    {
        $dataasset=assetsmodel::find($id);
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

        $asset=assetsmodel::find($id);
        
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


    public function viewbox()
    {
        $box=new asset();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        if(strlen($month)==1)
            $month="0".$month;

        $sl_num=00;
        ++$sl_num;

        if(strlen($sl_num)==1)
            $sl_num="0".$sl_num;

        $date = Carbon::now()->day;
        $box=$box->box_num="B".$year.$month.$date.$sl_num;
        return view('addasset',compact('box'));
        
    }


    public function store1(Request $request)
    {
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
        $user=request("user");
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();

        $asset = new assetsmodel();

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
        $asset->user=$user;
        
        $asset->save();
        echo "<script>alert('Successfully Added asset');window.location='/dashboard';</script>";
        

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





    public function update1(Request $request, $id)
    {
        $bname=request("name");
        $category=request("cat");
        $bimage=$request->file('bimage');
        $name=$bimage->getClientOriginalName();
        $userInfo = categorymodel::where('Categoryname','=', $category)->first();
        $bimage->move(public_path('assets/images'),$name);

        $this->validate($request,[
            'name'=>'required',
        ]);

        $brand = new brandmodel();

        $brand->Brandname=$bname;
        $brand->brandimage=$name;
        $brand->categoryid=$userInfo->id;
        
        $brand->save();
        echo "<script>alert('Succesfully edited......');window.location='/viewbrand';</script>"; 
       
    }





    public function viewloc()
    {
        $location=location::all();
        return view('location',compact('location'));
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

    public function deletedetails($id)
    {
        $details=detailsmodel::find($id);
        $details->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewdetails';</script>"; 
        
    }
    public function deleteasset($id)
    {
        $asset=assetsmodel::find($id);
        $asset->delete();
        echo "<script>alert('Succesfully deleted......');window.location='/viewasset';</script>"; 
        
    }

}


