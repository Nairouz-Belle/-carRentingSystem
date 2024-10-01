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
    @if($user->ProfilePic == NULL)
    <img src="{{asset('assets/images/users/noProfilePicture.png')}}" alt="user-img" class="img-thumbnail rounded-circle" />
    @else
    <img src="{{ Storage::url($user->ProfilePic) }}" alt="user-img" class="img-thumbnail rounded-circle" />
    @endif

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
    @if( $user->type == "customer" )
    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
        <li class="nav-item">
        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">@lang('messages.Personal Informations')</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">@lang('messages.Booking List')</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">@lang('messages.Payments List')</span>
        </a>
        </li>
        
    </ul>
    @else

    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
        
        <li class="nav-item">
        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">@lang('messages.Personal Informations')</span>
        </a>
        </li>
        
    </ul>

    
    @endif
    <div class="flex-shrink-0">
    <a href="{{route('Users.edit',$user->id)}}" class="btn btn-light"><i class="ri-edit-box-line align-bottom"></i> @lang('messages.Edit Profile')</a>
    </div>
    </div>
    <!-- Tab panes -->
    @php
    $users = App\Models\User::all();
    $cars = App\Models\Vehicule::all();
    $reservations = App\Models\Reservation::orderBy('created_at', 'desc')->get();
    $payments = App\Models\Payment::orderBy('created_at', 'desc')->get();
    @endphp

    <div class="tab-content pt-4 text-muted">

    <div class="tab-pane active" id="overview-tab" role="tabpanel">
    <div class="row">
    <div class="col-xxl-3">


    <div class="card">
    <div class="card-body">
    <h5 class="card-title mb-3">@lang('messages.Personal Info')</h5>
    <div class="table-responsive">
    <table class="table table-borderless mb-0">
    <tbody>
    <tr>
    <th class="ps-0" scope="row">E-mail :</th>
    <td class="text-muted">{{$user->email}}</td>
    </tr>
    <tr>
    <th class="ps-0" scope="row">@lang('messages.Phone') :</th>
    <td class="text-muted">{{$user->phone}}</td>
    </tr>
    <tr>
    <th class="ps-0" scope="row">@lang('messages.Birth Date')  :</th>
    <td class="text-muted">{{$user->birthDate}}</td>
    </tr>
    <tr>
    <th class="ps-0" scope="row">@lang('messages.Gender') :</th>
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
    <h5 class="card-title mb-3">@lang('messages.License Information')</h5>
    <div class="table-responsive">
    <table class="table table-borderless mb-0">
    <tbody>
    <tr>
    <th class="ps-0" scope="row">@lang('messages.ID License') :</th>
    <td class="text-muted">{{$user->IDLicense}}</td>
    </tr>
    <tr>
    <th class="ps-0" scope="row">@lang('messages.ID License Date') :</th>
    <td class="text-muted">{{$user->IDLicenseDate}}</td>
    </tr>
    <tr>
    <th class="ps-0" scope="row">@lang('messages.ID License Expiry') :</th>
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
    <h5 class="card-title mb-3">@lang('messages.License Document')</h5>
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


    <div class="tab-pane fade" id="activities" role="tabpanel">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">
    <h5 class="card-title mb-0">@lang('messages.Booking List')</h5>
    </div>
    <div class="card-body">
    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12"><table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
    <thead>
    <tr>
    <th scope="col" style="width: 16.8px;" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="



    : activate to sort column ascending">
    <div class="form-check">
    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
    </div>
    </th>

    <th data-ordering="false" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="SR No.: activate to sort column descending" aria-sort="ascending">@lang('messages.Reservation No.')</th>

    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="user: activate to sort column ascending">@lang('messages.User')</th>

    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="vehicule: activate to sort column ascending">@lang('messages.Vehicle')</th>

    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">@lang('messages.Borrow')</th>

    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 87.6px;" aria-label="Purchase ID: activate to sort column ascending">@lang('messages.Return')</th>

    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.6px;" aria-label="Title: activate to sort column ascending">@lang('messages.Price')</th>

    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 69.6px;" aria-label="User: activate to sort column ascending">@lang('messages.Fine Per Day')</th>

    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 78.6px;" aria-label="Assigned To: activate to sort column ascending">@lang('messages.Returned')</th>

    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 71.6px; display: none;" aria-label="Created By: activate to sort column ascending">@lang('messages.Penalty')</th>

    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 77.6px; display: none;" aria-label="Created By: activate to sort column ascending">@lang('messages.Created By')</th>



    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 46.6px; display: none;" aria-label="Status: activate to sort column ascending">Status</th>

    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 46.6px; display: none;" aria-label="Status: activate to sort column ascending">@lang('messages.Payment Status')</th>

    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 42.6px; display: none;" aria-label="Action: activate to sort column ascending">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reservations as $res)
    @if($user->id == $res->user_id)
    <tr class="odd">
    <th scope="row" class="dtr-control" tabindex="0">
    <div class="form-check">
    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
    </div>
    </th>
    <td class="sorting_1">{{$res->id}}</td>
    <td>{{$res->user->name ?? 'Null'}}</td>
    <td>{{$res->vehicule->id ?? 'Null'}}</td>
    <td>{{$res->borrow}}</td>
    <td>{{$res->return}}</td>
    <td>$ {{$res->price}} </td>
    <td>$ {{$res->fine}} </td>
    <td>{{$res->returned}}</td>
    <td>$ {{$res->penalty}} </td>
    <td>{{$res->added_by->name ?? 'Null'}}</td>

    <td>@if($res->status =='Confirmed')
    <span class="badge bg-info">
    {{$res->status}}
    </span>
    @elseif( $res->status == 'Pending')
    <span class="badge bg-warning">
    {{$res->status}}
    </span>
    @elseif( $res->status == 'On Rent')
    <span class="badge bg-secondary">
    {{$res->status}}
    </span>
    @elseif( $res->status == 'Cancelled')
    <span class="badge bg-danger">
    {{$res->status}}
    </span>
    @elseif( $res->status == 'Completed')
    <span class="badge bg-success">
    {{$res->status}}
    </span>
    @endif
    </td>

    <td>
    @if($res->Paiementstatus =='Paid')
    <span class="badge bg-success">
    {{$res->Paiementstatus}}
    </span>
    @elseif( $res->Paiementstatus == 'Unpaid')
    <span class="badge bg-danger">
    {{$res->Paiementstatus}}
    </span>
    @endif
    </td>

    <td>
    <div class="dropdown d-inline-block">
    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="ri-more-fill align-middle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
    <li><a href="{{route('Reservations.show',$res->id)}}" class="dropdown-item"><i class="ri-printer-line align-bottom me-2 text-muted"></i> @lang('messages.Print')</a></li>
    <li>
    <a class="dropdown-item edit-item-btn" href="{{route('Reservations.edit',$res->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
    <li>
    <a class="dropdown-item">

    <form method="POST" action="{{route('Reservations.destroy',$res->id)}}">
    @csrf
    <input name="_method" type="hidden" value="DELETE">

    <button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')</button>
    </form></a>

    </li>
    </ul>
    </div>
    </td>
    </tr>
    @endif
    @endforeach
    </tbody>
    </table></div></div></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!--end tab-pane-->

    <div class="tab-pane fade" id="projects" role="tabpanel">
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">
    <h5 class="card-title mb-0">@lang('messages.Payments List')</h5>
    </div>
    <div class="card-body">
    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12"><table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="fixed-header_info">
    <thead>
    <tr><th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="



    : activate to sort column descending">
    <div class="form-check">
    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
    </div>
    </th>
    <th>@lang('messages.Payment ID')</th>
    <th>@lang('messages.User')</th>
    <th>@lang('messages.Vehicle')</th>
    <th>@lang('messages.Amount')</th>
    <th>@lang('messages.Payment Method')</th>
    <th>@lang('messages.Payment Date')</th>

    <th>Action</th></tr>
    </thead>
    <tbody>


    @foreach($payments as $pay)
    @if($user->id == $pay->user_id)
    <tr class="odd">
    <th scope="row" class="dtr-control sorting_1" tabindex="0">
    <div class="form-check">
    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
    </div>
    </th>
    <td>{{$pay->id}}</td>
    <td>{{$pay->user->name ?? 'Null'}}</td>
    <td>{{$pay->vehicule->id ?? 'Null'}}</td>
    <td>{{$pay->amount}}</td>
    <td>{{$pay->method}}</td>
    <td>$ {{$pay->created_at}} </td>

    <td>
    <div class="dropdown d-inline-block">
    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="ri-more-fill align-middle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">

    <a class="dropdown-item">

    <form method="POST" action="{{route('Payments.destroy',$pay->id)}}">
    @csrf
    <input name="_method" type="hidden" value="DELETE">

    <button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')</button>
    </form></a>

    </li>
    </ul>
    </div>
    </td>
    </tr>
    @endif
    @endforeach












    </tbody>
    </table></div></div></div>
    </div>
    </div>
    </div>
    </div>

    <!--end row-->
    </div>
    <!--end card-body-->
    </div>
    <!--end card-->
    </div>

    <!--end tab-pane-->
@if($user->name == (Auth::user()->name))
<div class="tab-pane fade" id="documents" role="tabpanel">
<div class="card col-xxl-6">
    <div class="card-body">
        <div class="d-flex align-items-center mb-4">
            <h5 class="card-title flex-grow-1 mb-0 text-info text-uppercase ">@lang('messages.Change Password')</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <form action="{{ route('admin.password.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        
                        <div class="col-xxl-12">
                            <div>
                                <label for="passwordInput" class="form-label text-black">@lang('messages.Old Password')*</label>
                                <input type="password" class="form-control" name="old_password" id="passwordInput">

                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12">
                            <div>
                                <label for="passwordInput" class="form-label text-black">@lang('messages.New Password')*</label>
                                <input type="password" class="form-control" name="new_password" id="passwordInput" value="">
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12">
                            <div>
                                <label for="passwordInput" class="form-label text-black">@lang('messages.Confirm Password')*</label>
                                <input type="password" class="form-control" name="new_password_confirmation" id="passwordInput" value="">
                            </div>
                        </div><!--end col-->


                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('messages.Close')</button>
                                <button type="submit" class="btn btn-info">@lang('messages.Submit')</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>

            </form>  
            </div>
        </div>
    </div>
</div>
</div>
@else
@endif
    </div>
    <!--end tab-pane-->
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