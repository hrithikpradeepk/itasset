@extends('theme')

@section('content')



<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

<div class="card card-header" style="margin-left:300px; margin-height:100px" >
    
                <div class="card">
                  <h4 class="font-weight-bolder">Edit Category</h4>
                  <p class="mb-0">Enter Details of existing Category</p>
                </div>
                <div class="card card">
                <form class="row contact_form" action="/editcat/{{$category->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                {{csrf_field()}}
                                
                                                                
                                <div class=" input-group-outline mb-3">
                                        </div>
                                        <div class="input-group-outline mb-3">
                                            <input type="text" class="form-control" id="name" name="name" value="{{$category->category_name }}">
                                        </div>
                                    </div>
        
                                    <div class="col-md-12 form-group">
                                      
                                        <button onclick="return confirm('Are you sure?')" type="submit" value="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                            EDIT
                                        </button>
                                       
                                    </div>
                                </form>
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
