@extends('theme')

@section('content')

<div class="col-xl-4 col-lg-5 col-md-7 " style="margin-left:450px" >
              <div class="card card-header" >
                <div class="card">
                  <h4 class="font-weight-bolder">Select Category</h4>
                
                </div>
                <div class="card card">
                <form class="row contact_form" action="/addcategory1" method="post" novalidate="novalidate">
                {{csrf_field()}}
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Category Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    
                
                    <div class="text-center">
                      <button type="submit"  value="addcategory" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Submit</button>
                    </div>
                  </form>
                </div>
               
            </div>