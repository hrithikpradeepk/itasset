@extends('theme')

@section('content')



<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

<div class="card card-header" style="margin-left:300px; margin-height:100px" >
    
                <div class="card">
                  <h4 class="font-weight-bolder">Edit location</h4>
                  <p class="mb-0">Edit location of existing Fields</p>
                </div>
                <div class="card card">
                <form class="row contact_form" action="/editlocation1/{{$location->id}}" method="post" novalidate="novalidate">
                {{csrf_field()}}
                <div>
                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Floor</label>
                </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="floor" value="{{$location->floor}}">
                    </div>
                    <div>
                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Tower</label>
                </div>

                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="tower" value="{{$location->tower }}">
                    </div>
                    <div>
                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Department</label>
                </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="dept" value="{{$location->department }}">
                    </div>
                   

                    <div class="text-center">
                      <button type="submit"  value="addlocation" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Edit</button>
                    </div>
                  </form>
                  <div class="card card">
               
                </div>
               
            </div>

            <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
