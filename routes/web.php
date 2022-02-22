<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\admincontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/master', function () {
    return view('master');
});


Route::get('/register', function () {
    return view('register');
});

Route::get('/openbox', function () {
    return view('openbox');
});

Route::get('/addcategory', function () {
    return view('addcategory');
});

Route::get('/addmanufacturer', function () {
    return view('addmanufacturer');
});

Route::get('/addvendor', function () {
    return view('addvendor');
});

Route::get('/viewmanufacturer', function () {
    return view('viewmanufacturer');
});

Route::get('/viewvendor', function () {
    return view('viewvendor');
});

Route::post('/addcategory1',[admincontroller::class,'storecat']);

Route::post('/addmanufacturer1',[admincontroller::class,'storeman']);

Route::post('/addvendor1',[admincontroller::class,'storevendor']);

Route::POST ('/viewcategory1',[admincontroller::class,'viewcat']);

Route::POST ('/viewmanufacturer1',[admincontroller::class,'viewman']);

Route::POST ('/viewvendor1',[admincontroller::class,'viewvendor']);

Route::get('/editcategory/{id}', [admincontroller::class,'editcat']);
Route::post('/editcat/{id}', [admincontroller::class,'updatecat']);

Route::get('/editmanufacturer/{id}', [admincontroller::class,'editmanu']);
Route::post('/editmanufacturer/{id}', [admincontroller::class,'updatemanu']);

Route::get('/editvendor/{id}', [admincontroller::class,'editvendor']);
Route::post('/editvendor/{id}', [admincontroller::class,'updatevendor']);

Route::get('/transfer', function () {
    return view('transfer');
});

Route::get('/track', function () {
    return view('track');
});

Route::get('/viewassets', function () {
    return view('viewassets');
});


Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile',[registercontroller::class,'profile']);

Route::get('/viewcategory', function () {
    return view('viewcategory');
});



Route::get('/editcategory', function () {
    return view('editcategory');
});

Route::get('/editasset', function () {
    return view('editasset');
});

Route::get('/editlocation', function () {
    return view('editlocation');
});


Route::get('/viewasset', function () {
    return view('viewasset');
});

Route::get('/editasset', function () {
    return view('editasset');
});

Route::get('/location', function () {
    return view('location');
});


Route::get('/assetmain', function () {
    return view('assetmain');
});




//Register and Login


Route::get('/login',[registercontroller :: class,'createlog']);
Route::post('/login1',[registercontroller :: class,'check']);




Route::get('/register',[registercontroller :: class,'create']);
Route::post('/register',[registercontroller::class,'store']);


Route::get('/sessiondelete',function(){
    if(session()->has('sid'))
    {
        session()->pull('sid');
    }
    return view('login');
});



Route::POST ('/viewlocation1',[admincontroller::class,'viewlocation']);

Route::post('/openbox1',[admincontroller::class,'store1']);
Route::get('/openbox',[admincontroller::class,'view']);

Route::get('/addasset',[admincontroller::class,'indexAsset']);


Route::post('/addasset1',[admincontroller::class,'storeasset']);

Route::post('/openbox1',[admincontroller::class,'storebox']);


Route::get('/transfer',[admincontroller::class,'viewcategory']);
Route::post('/transfer1',[admincontroller::class,'transferasset']);



Route::get('/editlocation/{id}', [admincontroller::class,'editlocation']);
Route::post('/editlocation1/{id}', [admincontroller::class,'updatelocation']);

Route::get('/editasset/{id}', [admincontroller::class,'editasset']);
Route::post('/assetedit1/{id}', [admincontroller::class,'updateasset']);

Route::POST ('/viewasset2',[admincontroller::class,'viewasset']);


Route::get('/viewcategory',[admincontroller::class,'viewcat']);

Route::get('/viewmanufacturer',[admincontroller::class,'viewmanu']);

Route::get('/viewvendor',[admincontroller::class,'viewvendor']);

Route::get('/viewlocation',[admincontroller::class,'viewlocation']);

Route::get('/deletecategory/{id}', [admincontroller::class,'deletecategory']);

Route::get('/deletelocation/{id}', [admincontroller::class,'deletelocation']);

Route::get('/deletemanufacturer/{id}', [admincontroller::class,'deletemanufacturer']);

Route::get('/deletevendor/{id}', [admincontroller::class,'deletevendor']);

Route::get('/deleteasset/{id}', [admincontroller::class,'deleteasset']);

Route::get('/viewasset',[admincontroller::class,'viewasset']);

Route::post('/addbox1',[admincontroller::class,'storebox']);
Route::post('/addbox',[admincontroller::class,'addbox']);

Route::post('/addlocation1',[admincontroller::class,'storeloc']);
Route::get('/location',[admincontroller::class,'viewloc']);


