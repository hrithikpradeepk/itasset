@extends('theme')

@section('content')


<div class="card card-header" style="margin-left:300px; margin-height:100px" >
                <div class="card">
                  <h4 class="font-weight-bolder" style="margin-left:350px">Edit Assets</h4>
                  <p class="mb-0" style="margin-left:320px">Enter Details of existing assets</p>
                </div>
                <div class="card card">
                <form class="row contact_form" action="/assetedit1/{{$dataasset->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Model Number</label>
                    </div>     

                                <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="m_num" value="{{$dataasset->model_num}}">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Serial Number</label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      
                      <input type="text" class="form-control" name="sl_num" value="{{$dataasset->sl_num}}">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Category</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="category" id="category" class="form-control" > 
                        @foreach($category as $category)
                        <option value="{{$dataasset->category}}" selected>{{$category->Categoryname }}</option>
                        @endforeach 
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Floor</label>
                    </div>


                    <div class="input-group input-group-outline mb-3">
                    <select name="floor" id="floor" class="form-control" value="{{$dataasset->floor}}" >
                        @foreach($details as $floor)
                        <option>{{$floor->floor }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Tower</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="tower" id="tower" class="form-control" value="{{$dataasset->tower}}">
                        @foreach($details as $tower)
                        <option>{{$tower->tower }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Department</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="department" id="department" class="form-control" value="{{$dataasset->department}}">
                        @foreach($details as $department)
                        <option>{{$department->department }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Windows</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="windows" id="windows" class="form-control" value="{{$dataasset->windows}}">
                        @foreach($details as $windows)
                        <option>{{$windows->windows }}</option>
                        @endforeach 
                        </select>
                    </div>
                    <div>
                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">License</label>
                </div>
                <div>
                    <div class="input-group input-group-outline mb-3">
                    <select name="license" id="license" class="form-control" value="{{$dataasset->license}}">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                </div>

                <div class="input-group input-group-outline mb-3">
                      <label class="form-label">MS Office version</label>
                    </div>

                <div class="input-group input-group-outline mb-3">
                    <select name="ms_office" id="ms_office" class="form-control" value="{{$dataasset->ms_office}}">
                      <option value="No">No</option>
                        @foreach($details as $details)
                        <option>{{$details  ->ms_office }}</option>
                        @endforeach 
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Keyboard CT(For CPU)</label>
                      <input type="text" class="form-control" name="keyboard_ct" value="{{$dataasset->keyboard_ct}}">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Mouse CT(For CPU)</label>
                      <input type="text" class="form-control" name="mouse_ct" value="{{$dataasset->mouse_ct}}">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Adaptor CT(For CPU)</label>
                      <input type="text" class="form-control" name="adaptor_ct" value="{{$dataasset->adaptor_ct}}">
                    </div>
                              
                </div>
               
          
            <div class="input-group input-group-outline mb-3">
                     
                      <input type="text" class="form-control" name="msoffice" value="{{$details->ms_office }}">
                    </div>

                    <div class="text-center">
                      <button type="submit"  value="editasset" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Edit</button>
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
