<div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Open a Box
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
                    <h5 class="modal-title" id="exampleModalLabel">Laravel Bootstrap Modal Form Validation Example - NiceSnippets.com</h5>
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
                           
                            <input readonly type="text" class="form-control" name="box_num" value="{{$box->box_num}}">
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

                         <div style="margin-left:350px" class="input-group input-group-outline mb-3">
                            
                         <button type="button" value="addbox" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">Add Asset</button>
                         </div> 
                         
                    <div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="formSubmit">Save</button>
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
