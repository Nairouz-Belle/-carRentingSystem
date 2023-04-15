@extends('AdminHome')
@section('content')
        

            <div class="page-content">
                <div class="container-fluid">

                    <div class="position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg profile-setting-img">
                            <img src="{{asset('assets/images/cover.jpg')}}" class="profile-wid-img" alt="">
                            <div class="overlay-content">
                                <div class="text-end p-3">
                                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                            <a href="{{route('Users.index')}} "  style="color: black;"><i class="ri-image-edit-line align-bottom me-1"></i> Go Back</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <form action="{{ route('Users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card mt-n5">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        
                                            @if($user->ProfilePic == NULL)
                                                <img src="{{asset('assets/images/users/noProfilePicture.png')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                            @else
                                                <img src="{{ Storage::url($user->ProfilePic) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                            @endif
                                            
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input" name="ProfilePic" type="file" class="profile-img-file-input">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-17 mb-1">{{$user->name}}</h5>
                                        <p class="text-muted mb-0">{{$user->type}}</p>
                                    </div>
                                </div>
                        </div>
                        
                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                                <i class="fas fa-home"></i>
                                                Personal Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            <form action="javascript:void(0);">
                                                <div class="row">
                                                    
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                     <label for="lastnameInput" class="form-label">
                                                                     Name</label>
                                                                    <input type="text" name="name" class="form-control" id="lastnameInput" placeholder="Enter your Name" value="{{$user->name}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Role</label>
                                                                    <select class="form-control" data-trigger name="type" required id="">
                                                                        
                                                                        <option value="customer" {{($user->gender ==='customer') ? 'selected' : ''}}> customer </option>
                                                                        <option value="manager" {{($user->gender ==='manager') ? 'selected' : ''}}> manager </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                       

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="amount-field" class="form-label">Address</label>
                                                                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{$user->address}}" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">Phone</label>
                                                                    <input type="number" name="phone" value="{{$user->phone}}"class="form-control" placeholder="Phone" required />
                                                                </div>
                                                            </div>
                                                       


                                                        
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Gender</label>
                                                                    <select class="form-control" data-trigger name="gender" name="gender" required id="">
                                                                        <option value="Male" {{($user->gender ==='Male') ? 'selected' : ''}}> Male </option>
                                                                        <option value="Female" {{($user->gender ==='Female') ? 'selected' : ''}}> Female </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                <label for="birthDate" class="form-label">Birth Date</label>
                                                                <input type="date" name="birthDate"value="{{$user->birthDate}}" class="form-control" id="birthDate">
                                                                </div>
                                                            </div>

                                                        
                                                        

                                                        
                                                            
                                                              <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">Email</label>
                                                                    <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="User@User.com" required />
                                                                </div>
                                                            </div>
                                                            @php
                                                            $password = Hash::make($user->password);
                                                            @endphp
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">Password</label>
                                                                    <input type="password" name="password" value="{{$user->password}}" placeholder="**** ****" class="form-control" required />
                                                                </div>
                                                            </div>
                                                        



                                                        
                                                            
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">ID License</label>
                                                                    <input type="text" name="IDLicense" value="{{$user->IDLicense}}" class="form-control" placeholder="0123456789"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">ID License Date</label>
                                                                    <input type="date" name="IDLicenseDate" value="{{$user->IDLicenseDate}}"placeholder="" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">ID License Expiry</label>
                                                                    <input type="date" name="IDLicenseExpiry" value="{{$user->IDLicenseExpiry}}" placeholder="**** ****" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                              <!-- Default File Input Example -->
                                                                    <div class="mb-3">
                                                                        <label for="formFile" class="form-label">ID License Document</label>
                                                                        <input class="form-control" type="file" name="LicenseDoc" value="{{$user->LicenseDoc}}">
                                                                    </div>
                                                            </div>
                                                        


                                                        
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Status</label>
                                                                    <select class="form-control" name="status" id="">
                                                                        
                                                                        <option value="Pending" {{($user->status ==='Pending') ? 'selected' : ''}}>Pending</option>
                                                                        <option value="Confirmed" {{($user->status ==='Confirmed') ? 'selected' : ''}}>Confirmed</option>
                                                                        <option value="Canceled" {{($user->status ==='Canceled') ? 'selected' : ''}}>Canceled</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                    
                                                    
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-soft-success">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            
        </div>
@endsection
