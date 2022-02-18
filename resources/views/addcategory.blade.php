@extends('theme')

@section('content')

<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

<div class="card card-header" style="margin-left:300px; margin-height:100px" >
                <div class="card">
                  <h4 class="font-weight-bolder"  style="margin-left:350px">Add Category</h4>
                  <p class="mb-0"  style="margin-left:320px">Enter Details of new Category</p>
                </div>
                <div class="card card">
                <form class="row contact_form" action="/addcategory1" method="post" novalidate="novalidate">
                {{csrf_field()}}

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Category Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    
                
                    <div class="text-center">
                      <button type="submit"  value="addcategory" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add</button>
                    </div>
                  </form>
                  <div class="card card">
                <form class="row contact_form" action="/viewcategory1" method="post" novalidate="novalidate">
                {{csrf_field()}}
                  <div class="text-center">
                      <button type="submit"  value="viewcategory" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">View Categories</button>
                    </div>
                  </form>
                </div>
               
            </div>