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

            
            <div class="col-md-5 "> 
            <form type="get" action="\viewasset" class="search-container">
              <table>
              <tr>
                <td><input style="margin-left:50px"  type="search"  class="form-control border-0 bg-light" name="asset" placeholder=" Enter serial number"></td>
                 <td><button style="margin-left:110px" class="btn btn-primary my-2 my-sm-0" type="submit">Search</button></td>
</tr>
</table>
            </form>
            </div>


            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="dataTable">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asset Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Box Number
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vendor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Model Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Serial Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Floor</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tower</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transfer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                  


                      
                    </tr>
                  </thead>
                  <tbody>
         @foreach($asset as $asset)
         <tr>
           <td><input type="checkbox" class="form-check"></td>
         <td> <h6 class="resume-title">{{$asset->id }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->box_num }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->vendor }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->model_num }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->sl_num }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->category }}</h6></td>
         <!-- <td> <h6 class="resume-title">{{$asset->floor }}</h6></td>
         <td> <h6 class="resume-title">{{$asset->tower }}</h6></td> -->
         <td> <h6 class="resume-title">{{$asset->department }}</h6></td>
         <td> <button type="submit" data-bs-toggle="modal" data-bs-target="#transfermodal" style="padding: 8px 10px;"class="btn bg-gradient-primary btn-sm  "> Transfer </button></td>
        
        
         </tr>
        
          @endforeach 
</tbody>     
</table>
<button type="button"  style="margin-left:450px; padding: 8px 10px;"class="btn bg-gradient-primary btn-lg  "> Transfer </button>
              
            </div>
  </div>
  <div class="modal fade" id="transfermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-label="Close" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title" id="exampleModalLabel">Transfer the asset</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                   
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <form class="row contact_form" method="post" action="/transfer1 " enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Select Department</label>
                    </div>
                        <div class="input-group input-group-outline mb-3">
                        <select name="department" id="dept" class="form-control" >
                        
                        </select>
                            <input readonly type="text" class="form-control" name="box_num" value="">
                         </div> 

                         <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Vendor</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    


                    </div>
   
                    <div>
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary" id="formSubmit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('#formSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/books') }}",
                    method: 'post',
                    data: {
                        name: $('#name').val(),
                        auther_name: $('#auther_name').val(),
                        description: $('#description').val(),
                    },
                    success: function(result){
                        if(result.errors)
                        {
                            $('.alert-danger').html('');

                            $.each(result.errors, function(key, value){
                                $('.alert-danger').show();
                                $('.alert-danger').append('<li>'+value+'</li>');
                            });
                        }
                        else
                        {
                            $('.alert-danger').hide();
                            $('#exampleModal').modal('hide');
                        }
                    }
                });
            });
        });
    </script>

  
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
