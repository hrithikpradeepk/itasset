@extends('theme')

@section('content')




<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
      
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Assets</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asset Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Model Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Serial Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Floor</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tower</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Windows Version</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">License</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ms Office</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keyboard CT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mouse CT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adaptor CT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transfer</th>


                      
                    </tr>
                  </thead>
                  <tbody>
         @foreach($asset as $asset)
         <tr>
         <td> <h6 class="resume-title">{{$asset->id }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->model_num }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->sl_num }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->category }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->floor }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->tower }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->department }}</h6></td>
         <td> <h6 style="margin-left:60px"class="resume-title">{{$asset->windows }}</h6></td>
         <td> <h6 style="margin-left:20px"class="resume-title">{{$asset->license }}</h6></td>
         <td> <h6 style="margin-left:30px"class="resume-title">{{$asset->ms_office }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->keyboard_ct }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->mouse_ct }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->adaptor_ct }}</h6></td>
         <td> <a href={{"/editasset/".$asset->id}}><i style="margin-left:30px" class="material-icons">&#xE254;</i></a>
      <td><a onclick="return confirm('Are you sure?')" href={{"/deleteasset/".$asset->id}}><i style="margin-left:30px" class="material-icons">&#xE872;</i></a></td>
      <td> <a href={{"/transferasset/".$asset->id}}><i style="margin-left:30px" class="material-icons">&#xE254;</i></a>
         </tr>
          @endforeach 
</tbody>     
</table>
              
            </div>
  </div>
  
  <!--   Core JS Files   -->
  
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/datatables-demo.js"></script>
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
