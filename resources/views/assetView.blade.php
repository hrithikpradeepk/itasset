@extends('theme')

@section('content')

<div>
    <div class="container">
        <div class="col-md-8 offset-2 mt-5">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white text-center">Assets</h5>
                    </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table  class="table align-items-center mb-0" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asset Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Box Number</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">category</th>
                     
                    </tr>
                  </thead>
                  <tbody>
         
         @foreach($assets as $a)
         <tr>
         <td> <h6 class="resume-title">{{$a->id }}</h6></td>
         <td> <h6 class="resume-title"><a href="/addasset/{{$a->sl_num }}">{{$a->box_num }}</a></h6></td>
         <td> <h6 class="resume-title">{{$a->category }}</h6></td>
         
         </tr>
          @endforeach 
</tbody>     
</table>
              
            </div>
  </div>
  
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add an asset
</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-label="Close" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title" id="exampleModalLabel">Add a New asset - Add assets</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                   
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <form class="image-upload" method="post" action="/addasset1" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="box_num" value="{{$id}}">
                        <input type="hidden" name="vendor" value="{{$vendor->vendor}}">
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Model Number</label>
                            <input type="text" class="form-control" name="m_num">
                         </div> 
                         <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="sl_num">
                        </div>

                        <div class="input-group input-group-outline mb-3">
                             <label class="form-label">Category</label>
                        </div>

                        <div class="input-group input-group-outline mb-3">
                    <select name="category" id="category" class="form-control" >
                        @foreach($category as $category)
                        <option>{{$category->category_name }}</option>
                        @endforeach 
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Floor</label>
                    </div>


                    <div class="input-group input-group-outline mb-3">
                    <select name="floor" id="floor" class="form-control" >
                        @foreach($location as $floor)
                        <option>{{$floor->floor }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Tower</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="tower" id="tower" class="form-control" >
                        @foreach($location as $tower)
                        <option>{{$tower->tower }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Department</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="department" id="department" class="form-control" >
                        @foreach($location as $department)
                        <option>{{$department->department }}</option>
                        @endforeach 
                        </select>
                    </div>

                    <div>
                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">User</label>
                </div>

                    <div class="input-group input-group-outline mb-3">
                     
                      <input readonly type="text" class="form-control" name="user" value="{{ $user['name'] }}">
                    </div>


                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Manufacturer</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="manufacturer" id="maufacturer" class="form-control" >
                        @foreach($manufacturer as $manufacturer)
                        <option>{{$manufacturer->manufacturer_name }}</option>
                        @endforeach 
                        </select>
                    </div>

                    

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="formSubmit">Save</button>
                </div>
            </div>
            </form>
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

