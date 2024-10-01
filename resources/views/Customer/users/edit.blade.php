@extends('CustomerHome')
@section('content')
        

            <div class="page-content">
                <div class="container-fluid">

                    <div class="position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg profile-setting-img">
                            <img src="{{asset('assets/images/cover.jpg')}}" class="profile-wid-img" alt="">
                            <div class="overlay-content">
                                <div class="text-end p-3">
                                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input" name="ProfilePic">
                                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                            <a href="{{route('customer.home')}} "  style="color: black;"><i class="ri-image-edit-line align-bottom me-1"></i> @lang('messages.Go Back')</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     

                    <div class="row">


                    <form form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; gap:20px;">
                        @csrf
                        @method('PUT')
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

                                            @if ($errors->has('old_password'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif

                                            @if ($errors->has('new_password'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $errors->first('new_password') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif

                                            @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                            @if($user->name == (Auth::user()->name))
                                            <button type="button" class="btn btn-info btn-label waves-effect waves-light"data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-key-2-fill label-icon align-middle fs-16 me-2"></i> @lang('messages.Change Password')</button>
                                            @else
                                            @endif
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
                                                @lang('messages.Personal Details')
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            @if(session('EditUser'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('EditUser') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                            
                                               
                                                <div class="row">
                                                    
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                     <label for="lastnameInput" class="form-label">
                                                                     @lang('messages.Name')</label>
                                                                    <input type="text" name="name" class="form-control" id="lastnameInput" placeholder="Enter your Name" value="{{$user->name}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">@lang('messages.Role')</label>
                                                                    <select class="form-control" data-trigger name="type" required id="">
                                                                        
                                                                        <option value="customer" {{($user->gender ==='customer') ? 'selected' : ''}}> @lang('messages.Customer') </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                       

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="amount-field" class="form-label">@lang('messages.Address')</label>
                                                                    <input type="text" name="address" class="form-control" placeholder="@lang('messages.Address')" value="{{$user->address}}" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">@lang('messages.Phone')</label>
                                                                    <input type="number" name="phone" value="{{$user->phone}}"class="form-control" placeholder="@lang('messages.Phone')" required />
                                                                </div>
                                                            </div>
                                                       


                                                        
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">@lang('messages.Gender')</label>
                                                                    <select class="form-control" data-trigger name="gender" name="gender" required id="">
                                                                        <option value="Male" {{($user->gender ==='Male') ? 'selected' : ''}}> @lang('messages.Male') </option>
                                                                        <option value="Female" {{($user->gender ==='Female') ? 'selected' : ''}}> @lang('messages.Female') </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                <label for="birthDate" class="form-label">@lang('messages.Birth Date')</label>
                                                                <input type="date" name="birthDate"value="{{$user->birthDate}}" class="form-control">
                                                                </div>
                                                            </div>

                                                        
                                                        

                                                        
                                                            
                                                              <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">@lang('messages.Email')</label>
                                                                    <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="User@User.com" required />
                                                                </div>
                                                            </div>
                                                            
                                                        



                                                        
                                                            
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">@lang('messages.ID License')</label>
                                                                    <input type="text" name="IDLicense" value="{{$user->IDLicense}}" class="form-control" placeholder="@lang('messages.ID License')"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">@lang('messages.ID License Date')</label>
                                                                    <input type="date" name="IDLicenseDate" value="{{$user->IDLicenseDate}}"placeholder="@lang('messages.ID License Date')" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label  class="form-label">@lang('messages.ID License Expiry')</label>
                                                                    <input type="date" name="IDLicenseExpiry" value="{{$user->IDLicenseExpiry}}" placeholder="@lang('messages.ID License Expiry')" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                              <!-- Default File Input Example -->
                                                                    <div class="mb-3">
                                                                        <label for="formFile" class="form-label">@lang('messages.ID License Document')</label>
                                                                        <input class="form-control" type="file" name="LicenseDoc" value="{{$user->LicenseDoc}}">
                                                                    </div>
                                                            </div>
                                                        


                                                            
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Status</label>
                                                                    @if($user->status == 'Confirmed')
                                                                    <input class="form-control text-success" type="text" name="status" value="{{$user->status}}" style="font-weight: bold;" readonly>
                                                                    @else
                                                                    <input class="form-control text-danger" style="font-weight: bold;" type="text" name="status" value="{{$user->status}}" readonly>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                    
                                                    
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" class="btn btn-primary">@lang('messages.Edit')</button>
                                                            <button type="button" class="btn btn-soft-success">@lang('messages.Cancel')</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="changePassword" role="tabpanel">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    




                                
                                
                    
                
                </div>
                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-info" id="exampleModalgridLabel">@lang('messages.Change Password')</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            
                                                    <div class="row g-3">
                                                        
                                                        <div class="col-xxl-12">
                                                            <div>
                                                                <label for="passwordInput" class="form-label">@lang('messages.Old Password')</label>
                                                                <input type="password" class="form-control" name="old_password" id="passwordInput" placeholder="@lang('messages.Old Password')">

                                                            </div>
                                                        </div><!--end col-->

                                                        <div class="col-xxl-12">
                                                            <div>
                                                                <label for="passwordInput" class="form-label">@lang('messages.New Password')</label>
                                                                <input type="password" class="form-control" name="new_password" id="passwordInput" placeholder="@lang('messages.New Password')">
                                                            </div>
                                                        </div><!--end col-->

                                                        <div class="col-xxl-12">
                                                            <div>
                                                                <label for="passwordInput" class="form-label">@lang('messages.Confirm Password')</label>
                                                                <input type="password" class="form-control" name="new_password_confirmation" id="passwordInput" placeholder="@lang('messages.Confirm Password')">
                                                            </div>
                                                        </div><!--end col-->


                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('messages.Close')</button>
                                                                <button type="submit" class="btn btn-info">@lang('messages.Submit')</button>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>

            
        </div>
@endsection
