@extends('AdminHome')
@section('content')
        

            <div class="page-content">
                <div class="container-fluid">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="{{asset('assets/images/cover.jpg')}}" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="{{ Storage::url($user->ProfilePic) }}" alt="user-img" class="img-thumbnail rounded-circle" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1">{{$user->name}}</h3>
                                    <p class="text-white-75">{{$user->type}}</p>
                                    <div class="hstack text-white-50 gap-1">
                                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{$user->address}}</div>
                                        
                                    </div>
                                </div>
                            </div>
                          </div>
                        <!--end row-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex profile-wrapper">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Personal Informations</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                                <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Activities</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Projects</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Documents</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <a href="{{route('Users.edit',$user->id)}}" class="btn btn-light"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xxl-3">
                                                

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Personal Info</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted">{{$user->email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                                        <td class="text-muted">{{$user->phone}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Birth date  :</th>
                                                                        <td class="text-muted">{{$user->birthDate}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Gender :</th>
                                                                        <td class="text-muted">{{$user->gender}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Status :</th>
                                                                        
                                                                        <td class="text-muted"><span class="badge bg-soft-success text-success align-middle">{{$user->status}}</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3">
                                                
                                            	<div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">License Information</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">ID License :</th>
                                                                        <td class="text-muted">{{$user->IDLicense}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">ID License Date :</th>
                                                                        <td class="text-muted">{{$user->IDLicenseDate}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">ID License Expiry :</th>
                                                                        <td class="text-muted">{{$user->IDLicenseDate}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row"></th>
                                                                        <td class="text-muted">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row"></th>
                                                                        <td class="text-muted">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div>
                                                
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            @if( $user->type == "customer" )
                                            <div class="col-xxl-3">
                                                <div class="card" style="height:292px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">License Document</h5>
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="" title="">
                                                                <img class="gallery-img img-fluid mx-auto" src="{{ Storage::url($user->LicenseDoc) }}" alt="">
                                                                <div class="gallery-overlay">
                                                                    <h5 class="overlay-caption"></h5>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div>
                                            @else
                                            
                                            @endif 
                                                <!-- end card -->
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>

                                    <div class="tab-pane fade" id="activities" role="tabpanel">
                                    <div class="card">
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane fade" id="projects" role="tabpanel">
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane fade" id="documents" role="tabpanel">
                                    </div>
                                </div>
                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->

            
        <!-- end main content-->
@endsection