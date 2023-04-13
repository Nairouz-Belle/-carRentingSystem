@extends('AdminHome')
@section('content')


        

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Datatables</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Datatables</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    





                    <!-- table -->







                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" style="">
                                    <span style="font-size: 24px;font-weight: bold;color: #5ea3cb;">Basic Datatables</span>
                                    
                                            
                                                <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="float:right;"><i class="ri-add-line align-bottom me-1"></i> Create Order</button>
                                        
                                        
                                </div>

                                <div class="card-body">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                      <div class="row"><div class="col-sm-12">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                                        <thead>
                                            <tr><th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                    
                                                        
                                                    
                                                : activate to sort column descending">
                                                    <div class="form-check">
                                                        
                                                    </div>
                                                </th>

                                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="SR No.: activate to sort column ascending">Name</th>

                                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Email</th>

                                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 87.6px;" aria-label="Purchase ID: activate to sort column ascending">Address</th>

                                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.6px;" aria-label="Title: activate to sort column ascending">Gender</th>

                                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.6px;" aria-label="Title: activate to sort column ascending">Date Of Birth</th>

                                                <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 69.6px; display: none;" aria-label="User: activate to sort column ascending">Phone</th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 78.6px; display: none;" aria-label="Assigned To: activate to sort column ascending">Status</th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 71.6px; display: none;" aria-label="Created By: activate to sort column ascending">Created At</th>

                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 71.6px; display: none;" aria-label="Created By: activate to sort column ascending">Action</th>

                                              </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        @foreach($users as $usr)    
                                        <tr class="odd">
                                                <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                    <div class="form-check">
                                                        
                                                    </div>
                                                </th>
                                                <input type="hidden" class="userdelete_val_id" value="{{$usr->id}}">
                                                <td><div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                          @if($usr->ProfilePic == NULL)
                                                                            <img class="rounded-circle" src="{{asset('assets/images/users/noProfilePicture.png')}}" height="45" width="45"alt="">
                                                                          @else
                                                                            <img class="rounded-circle" src="{{ Storage::url($usr->ProfilePic) }}" height="45" width="45"alt="">

                                                                          @endif
                                                                        </div>
                                                                        <div class="flex-grow-1">{{$usr->name}}</div>
                                                                    </div>

                                                                    </td>
                                                <td>{{$usr->email}}</td>
                                                <td>{{$usr->address}}</td>
                                                <td>{{$usr->gender}}</td>
                                                <td>{{$usr->birthDate}}</td>
                                                <td>{{$usr->phone}}</td>

                                                
                                                <td style="display: none;"><span class="badge bg-success">{{$usr->status}}</span></td>
                                                <td>{{$usr->created_at}}</td>
                                                <td style="display: none;">
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                              <a class="dropdown-item show-item-btn" href="{{route('Users.show',$usr->id)}}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Show
                                                                </a>
                                                            </li>
                                                            
                                                            <li>
                                                                <a class="dropdown-item edit-item-btn" href="{{route('Users.edit',$usr->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                                                </a>
                                                            </li>
                                                            
                                                            <li>
                                                            <a class="dropdown-item">
                                                                <form method="POST" action="{{route('Users.destroy',$usr->id)}}">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</button>
                                                                </form>
                                                            </a>
                                                            </li>
                                                                        
                                                            
                                                            </li>
                                                        </ul>
                                     
                                    
                                                    </div>
                                                </td>
                                            </tr>@endforeach
                                    </tbody>
                                    </table>
                                     </div>
                                  </div>
                                </div>
                                   






                                  <!-- ************* Creation model ************** -->

                                    <div class="modal fade" id="showModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <form  action="{{route('Users.store')}}" method="POST" class="tablelist-form" enctype="multipart/form-data"  autocomplete="off">
                                                  @csrf
                                                    <div class="modal-body">
                                                            <div class="mb-3">
                          <div class="row dz-clickable" data-dropzone="data-dropzone" data-options="{&quot;maxFiles&quot;:1,&quot;data&quot;:[{&quot;name&quot;:&quot;avatar.png&quot;,&quot;size&quot;:&quot;54kb&quot;,&quot;url&quot;:&quot;../../assets/img/team&quot;}]}">
                            
                            <div class="col-md-auto">
                              <div class="dz-preview dz-preview-single">

                                <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0 dz-image-preview">                                  
                                <div class="avatar avatar-4xl">
                                    <img class="rounded-circle" src="{{asset('assets/images/users/noProfilePicture.png')}}" width="25" alt="">
                                </div>                                  
                                <div class="dz-progress">
                                    <span class="dz-upload" data-dz-uploadprogress=""></span>
                                </div>                                
                                </div>
                            </div>
                            </div>
                            <div class="col-md">
                              <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                                <div class="text-center">
                                    <img class="me-2" src="{{asset('assets/images/users/noProfilePicture.png')}}" width="25" alt="">Upload your profile picture
                                    <p class="mb-0 fs--1 text-400">Upload a 300x300 jpg image with 
                                        <br>a maximum size of 400KB</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                                                             







                                                        <div class="row gy-4 mb-3">
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label for="amount-field" class="form-label">Name</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label for="" class="form-label">Role</label>
                                                                    <select class="form-control" data-trigger name="type" required id="">
                                                                        <option value="">--- Select Role ---</option>
                                                                        <option value="customer">Customer</option>
                                                                        <option value=manager>Manager</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gy-4 mb-3">
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label for="amount-field" class="form-label">Address</label>
                                                                    <input type="text" name="address" class="form-control" placeholder="Address" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">Phone</label>
                                                                    <input type="number" name="phone" class="form-control" placeholder="Phone" required />
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gy-4 mb-3">
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label for="" class="form-label">Gender</label>
                                                                    <select class="form-control" data-trigger name="gender" name="gender" required id="">
                                                                        <option value="">--- Gender ---</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value=Female>Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">Birth Date</label>
                                                                    <input type="date" name="birthDate" class="form-control"required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row gy-4 mb-3">
                                                            
                                                              <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">Email</label>
                                                                    <input type="email" name="email" class="form-control" placeholder="User@User.com" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">Password</label>
                                                                    <input type="password" name="password" placeholder="**** ****" class="form-control" required />
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="row gy-4 mb-3">
                                                            
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">ID License</label>
                                                                    <input type="text" name="IDLicense" class="form-control" placeholder="0123456789"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">ID License Date</label>
                                                                    <input type="date" name="IDLicenseDate" placeholder="" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">ID License Expiry</label>
                                                                    <input type="date" name="IDLicenseExpiry" placeholder="**** ****" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <!-- Default File Input Example -->
                                                                    <div>
                                                                        <label for="formFile" class="form-label">ID License Document</label>
                                                                        <input class="form-control" type="file" name="LicenseDoc">
                                                                    </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gy-4 mb-3"style="display: none;">
                                                            
                                                              <div class="col-md-6">
                                                                <div>
                                                                    <label  class="form-label">Status</label>
                                                                    <input type="text" name="status" class="form-control" placeholder="" value="Confirmed" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                                                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- ************* Edit model ************** -->

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script>2023 © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design &amp; Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");

        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes delete it !"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>

  
</html>
@endsection