@extends('theme')

@section('content')

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
              <div class="card card-header" style="margin-left:300px; margin-height:100px" >
                <div class="card">
                  <h4 style="margin-left:320px" class="font-weight-bolder">Add location</h4>
                  <p style="margin-left:325px" class="mb-0">Enter location</p>
                </div>
                <div class="card card">
                <form class="row contact_form" action="/addlocation1" method="post" novalidate="novalidate">
                {{csrf_field()}}
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Floor  </label>
                      <input type="text" class="form-control" name="floor">
                    </div>
                  

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Tower</label>
                      <input type="text" class="form-control" name="tower">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Department</label>
                      <input type="text" class="form-control" name="dept">
                    </div>

                   
                    <div class="text-center">
                      <button type="submit"  value="addlocation" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add</button>
                    </div>
                  </form>
                  <div class="card card">
               
                </div>
               
            </div>

            <div class="card card">
                <form class="row contact_form" action="/viewlocation1" method="post" novalidate="novalidate">
                {{csrf_field()}}
                  <div class="text-center">
                      <button type="submit"  value="viewlocation" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">View location</button>
                    </div>
                  </form>
                </div>