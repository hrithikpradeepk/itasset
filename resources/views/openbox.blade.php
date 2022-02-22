@extends('theme')

@section('content')

<div>
    <div class="container">
        <div class="col-md-8 offset-2 mt-5">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white text-center">Boxes</h5>
                    </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Box Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Box Number</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vendor</th>
                     
                    </tr>
                  </thead>
                  <tbody>
         @foreach($box as $box)
         <tr>
         <td> <h6 class="resume-title">{{$box->sl_num }}</h6></td>
         <td> <h6 class="resume-title"><a href="/addasset?id={{$box->sl_num}}">{{$box->box_num }}</a></h6></td>
         <td> <h6 class="resume-title">{{$box->vendor }}</h6></td>
         
         </tr>
          @endforeach 
</tbody>     
</table>
              
            </div>
  </div>
  
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add Box
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
                    
                    <h5 class="modal-title" id="exampleModalLabel">Add a New box - Add assets</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                   
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <form class="row contact_form" method="post" action="/addbox1 " enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Box Number</label>
                    </div>
                        <div class="input-group input-group-outline mb-3">
                           
                            <input readonly type="text" class="form-control" name="box_num" value="{{$x}}">
                         </div> 

                         <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Vendor</label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="vendor" id="vendor" class="form-control" >
                        @foreach($vendor as $vendor)
                        <option>{{$vendor->vendor_name }}</option>
                        @endforeach 
                        </select>
                    </div>

                         
                         
                    <div>

                   
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-success" id="formSubmit">Save</button>
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
