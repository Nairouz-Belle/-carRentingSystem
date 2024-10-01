@extends('AdminHome')
@section('content')




<div class="page-content">
<div class="container-fluid">

<div class="row g-4 mb-3">
<div class="col-sm-auto">
<button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="float:right;"><i class="ri-add-line align-bottom me-1"></i>@lang('messages.Create Users')</button>
</div>

</div>


<div class="row">
<div class="col-lg-12">
<div class="card" id="orderList">


@php
$blocked=App\Models\User::where('status','=','Blocked')->where('type','=','Customer')->count();
$active=App\Models\User::where('status','=','Confirmed')->where('type','=','Customer')->count();
$pending=App\Models\User::where('status','=','Pending')->where('type','=','Customer')->count();
@endphp

<div class="card-body pt-0">
<div>
<ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
<li class="nav-item">
<a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
<i class="ri-store-2-fill me-1 align-bottom"></i> All Users
</a>
</li>
<li class="nav-item">
<a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#delivered" role="tab" aria-selected="false">
<i class="ri-checkbox-circle-line me-1 align-bottom text-success"></i> Active<span class="badge bg-info align-middle ms-1">{{$active}}</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#pending" role="tab" aria-selected="false">
<i class="ri-close-circle-line me-1 align-bottom text-danger"></i>Pending<span class="badge bg-warning align-middle ms-1">{{$pending}}</span>
</a>
</li>

</ul>

<div class="tab-content">
<div class="tab-pane fade show active" id="home1" role="tabpanel">
    <div class="row">
    <div class="row">
        <div class="card-body">
            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle col-lg-12"style="width:100%">
            <thead>
            <tr>
            <th scope="col" style="width: 10px;">
            <div class="form-check">
            <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
            </div>
            </th>
            <th>@lang('messages.Name')</th>

            <th>@lang('messages.Email')</th>

            <th>@lang('messages.Address')</th>

            <th>@lang('messages.Gender')</th>

            <th>@lang('messages.Role')</th>

            <th>@lang('messages.Date Of Birth')</th>

            <th>@lang('messages.Phone')</th>
            <th>@lang('messages.Created At')</th>
            <th>Status</th>



            <th class="text-info">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $usr)
            @if($usr->type=="customer")    
            <tr class="odd">
            <th scope="row" class="dtr-control sorting_1" tabindex="0">
            <div class="form-check">

            </div>
            </th>
            <input type="hidden" class="userdelete_val_id" value="{{$usr->id}}">
            <td>
            <div class="d-flex align-items-center">
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
            <td>
            @if($usr->gender=='Male') 
            <span class="badge badge-soft-info badge-border">{{$usr->gender}}</span>
            @else
            <span class="badge badge-soft-danger badge-border">{{$usr->gender}}</span>
            @endif
            </td>

            <td>
            @if($usr->type=='customer') 
            <span class="badge badge-outline-success">{{$usr->type}}</span>
            @else
            <span class="badge badge-outline-danger">{{$usr->type}}</span>
            @endif
            </td>

            <td>{{ date('d M, Y', strtotime($usr->birthDate)) }} </td>
            <td>{{$usr->phone}}</td>
            <td>{{ date('d M, Y', strtotime($usr->created_at)) }} <small class="text-muted">  {{ date('H:i:s', strtotime($usr->created_at)) }}</td></small></td>




            @if($usr->status == 'Confirmed')
            <td>
            <span class="badge bg-success">{{$usr->status}}</span>
            <div class="btn-group">
            <button type="button" class="btn btn-ghost-info  btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu">
            <a class="dropdown-item text-danger" style="font-weight: bold;" href="{{route('admin.blocked',$usr->id)}}">@lang('messages.Blocked')</a>
            </div>
            </div><!-- /btn-group -->
            </td>
            @elseif($usr->status == 'Pending')
            <td>
            <span class="badge bg-warning">{{$usr->status}}</span>
            <div class="btn-group">
            <button type="button" class="btn btn-ghost-info  btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu">
            <a class="dropdown-item text-success" style="font-weight: bold;" href="{{route('admin.confirmed',$usr->id)}}">@lang('messages.Confirmed')</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" style="font-weight: bold;" href="{{route('admin.blocked',$usr->id)}}">@lang('messages.Blocked')</a>
            </div>
            </div><!-- /btn-group -->
            </td>
            @else
            <td>
            <span class="badge bg-danger">{{$usr->status}} </span>
            <div class="btn-group">
            <button type="button" class="btn btn-ghost-info  btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu">

            <a class="dropdown-item text-success" style="font-weight: bold;" href="{{route('admin.confirmed',$usr->id)}}">@lang('messages.Confirmed')</a>

            </div>
            </div><!-- /btn-group -->

            </td>
            @endif





            <td>
            <div class="dropdown d-inline-block">
            <button class="btn btn-info btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-more-fill align-middle"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
            <li>
            <a href="{{route('Users.show',$usr->id)}}" class="dropdown-item" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>@lang('messages.View')</a>
            </li>
            <li>
            <a class="dropdown-item edit-item-btn" href="{{route('Users.edit',$usr->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>@lang('messages.Edit')</a>
            </li>
            <li>
<a class="dropdown-item">

<form method="POST" action="{{route('Users.destroy',$usr->id)}}">
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
            </table>
        </div>
    </div>
    </div>
</div>

<div class="tab-pane fade" id="delivered" role="tabpanel"><div class="row">
    <div class="row">
        <div class="card-body">
            <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%;">
            <thead>
            <tr>
            <th scope="col" style="width: 10px;">
            <div class="form-check">
            <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
            </div>
            </th>
            <th>@lang('messages.Name')</th>

            <th>@lang('messages.Email')</th>

            <th>@lang('messages.Address')</th>

            <th>@lang('messages.Gender')</th>

            <th>@lang('messages.Role')</th>

            <th>@lang('messages.Date Of Birth')</th>

            <th>@lang('messages.Phone')</th>
            <th>@lang('messages.Created At')</th>
            <th>Status</th>



            <th class="text-info">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $usr)
            @if(($usr->type=="customer")&&($usr->status=="Confirmed"))    
            <tr class="odd">
            <th scope="row" class="dtr-control sorting_1" tabindex="0">
            <div class="form-check">

            </div>
            </th>
            <input type="hidden" class="userdelete_val_id" value="{{$usr->id}}">
            <td>
            <div class="d-flex align-items-center">
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
            <td>
            @if($usr->gender=='Male') 
            <span class="badge badge-soft-info badge-border">{{$usr->gender}}</span>
            @else
            <span class="badge badge-soft-danger badge-border">{{$usr->gender}}</span>
            @endif
            </td>
            <td>
            @if($usr->type=='customer') 
            <span class="badge badge-outline-success">{{$usr->type}}</span>
            @else
            <span class="badge badge-outline-danger">{{$usr->type}}</span>
            @endif
            </td>
            <td>{{ date('d M, Y', strtotime($usr->birthDate)) }} </td>
            <td>{{$usr->phone}}</td>
            <td>{{ date('d M, Y', strtotime($usr->created_at)) }} <small class="text-muted">  {{ date('H:i:s', strtotime($usr->created_at)) }}</td></small></td>
            @if($usr->status == 'Confirmed')
            <td style="display: none;">
            <span class="badge bg-success">{{$usr->status}}</span>
            </td>
            @elseif($usr->status == 'Pending')
            <td style="display: none;">
            <span class="badge bg-warning">{{$usr->status}}</span>
            </td>
            @else
            <td style="display: none;">
            <span class="badge bg-danger">{{$usr->status}}</span>
            </td>
            @endif

            <td style="display: none;">
            <div class="dropdown d-inline-block">
            <button class="btn btn-info btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-more-fill align-middle"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
            <li>
            <a href="{{route('Users.show',$usr->id)}}" class="dropdown-item" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>@lang('messages.View')</a>
            </li>
            <li>
            <a class="dropdown-item edit-item-btn" href="{{route('Users.edit',$usr->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>@lang('messages.Edit')</a>
            </li>
            <li>

            </li>
            </ul>
            </div>
            </td>
            </tr>
            @endif
            @endforeach
            </tbody>
            </table>
        </div>


    </div>

</div>
</div>


<div class="tab-pane fade" id="pending" role="tabpanel"><div class="row">

<div class="row">

<div class="card-body">
<table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
<thead>
<tr>
<th scope="col" style="width: 10px;">
<div class="form-check">
<input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
</div>
</th>
<th>@lang('messages.Name')</th>

<th>@lang('messages.Email')</th>

<th>@lang('messages.Address')</th>

<th>@lang('messages.Gender')</th>

<th>@lang('messages.Role')</th>

<th>@lang('messages.Date Of Birth')</th>

<th>@lang('messages.Phone')</th>
<th>@lang('messages.Created At')</th>
<th>Status</th>



<th class="text-info">Action</th>
</tr>
</thead>
<tbody>
@foreach($users as $usr)
@if(($usr->type=="customer")&&($usr->status=="Pending"))    
<tr class="odd">
<th scope="row" class="dtr-control sorting_1" tabindex="0">
<div class="form-check">

</div>
</th>
<input type="hidden" class="userdelete_val_id" value="{{$usr->id}}">
<td>
<div class="d-flex align-items-center">
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
<td>
@if($usr->gender=='Male') 
<span class="badge badge-soft-info badge-border">{{$usr->gender}}</span>
@else
<span class="badge badge-soft-danger badge-border">{{$usr->gender}}</span>
@endif
</td>
<td>
@if($usr->type=='customer') 
<span class="badge badge-outline-success">{{$usr->type}}</span>
@else
<span class="badge badge-outline-danger">{{$usr->type}}</span>
@endif
</td>
<td>{{ date('d M, Y', strtotime($usr->birthDate)) }} </td>
<td>{{$usr->phone}}</td>
<td>{{ date('d M, Y', strtotime($usr->created_at)) }} <small class="text-muted">  {{ date('H:i:s', strtotime($usr->created_at)) }}</td></small></td>
@if($usr->status == 'Confirmed')
<td style="display: none;">
<span class="badge bg-success">{{$usr->status}}</span>
</td>
@elseif($usr->status == 'Pending')
<td style="display: none;">
<span class="badge bg-warning">{{$usr->status}}</span>
</td>
@else
<td style="display: none;">
<span class="badge bg-danger">{{$usr->status}}</span>
</td>
@endif

<td style="display: none;">
<div class="dropdown d-inline-block">
<button class="btn btn-info btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<i class="ri-more-fill align-middle"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end">
<li>
<a href="{{route('Users.show',$usr->id)}}" class="dropdown-item" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>@lang('messages.View')</a>
</li>
<li>
<a class="dropdown-item edit-item-btn" href="{{route('Users.edit',$usr->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>@lang('messages.Edit')</a>
</li>
<li>

</li>
</ul>
</div>
</td>
</tr>
@endif
@endforeach
</tbody>
</table>
</div>


</div>

</div>
</div>

</div>


</div>
</div>


</div>

</div>
<!--end col-->
</div>
<!--end row-->








</div>
</div>
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
<div class="text-center">
<h5 class="fs-17 mb-1">@lang('messages.Profile Picture')</h5>
<br>
<div class="profile-user position-relative d-inline-block mx-auto mb-4">
@if($usr->ProfilePic == NULL)
<img src="{{asset('assets/images/users/noProfilePicture.png')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
@else
<img src="{{ Storage::url($usr->ProfilePic) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
@endif



<div class="avatar-xs p-0 rounded-circle profile-photo-edit">
<input name="ProfilePic" id="profile-img-file-input" type="file" class="profile-img-file-input">
<label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
<span class="avatar-title rounded-circle bg-light text-body">
<i class="ri-camera-fill"></i>
</span>
</label>
</div>
</div>
</div>










<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Name')</label>
<input type="text" name="name" class="form-control" placeholder="@lang('messages.Name')" required />
</div>
</div>

<div class="col-md-6">
<div>
<label for="" class="form-label">@lang('messages.Role')</label>

<select class="form-control text-success"style="font-weight: bold;" data-trigger name="type" required id="">

<option value="customer" class="text-muted">@lang('messages.Customer')</option>
<option value="customer" class="text-muted">@lang('messages.Manager')</option>

</select>
</div>
</div>
</div>


<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Address')</label>
<input type="text" name="address" class="form-control" placeholder="@lang('messages.Address')" required />
</div>
</div>
<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.Phone')</label>
<input type="number" name="phone" class="form-control" placeholder="@lang('messages.Phone')" required />
</div>
</div>
</div>


<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label for="" class="form-label">@lang('messages.Gender')</label>
<select class="form-control" data-trigger name="gender" name="gender" required id="">
<option value="">--- @lang('messages.Gender') ---</option>
<option value="Male">@lang('messages.Male')</option>
<option value=Female>@lang('messages.Female')</option>
</select>
</div>
</div>
<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.Birth Date')</label>
<input type="date" name="birthDate" class="form-control"required />
</div>
</div>
</div>

<div class="row gy-4 mb-3">

<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.Email')</label>
<input type="email" name="email" class="form-control" placeholder="User@User.com" required />
</div>
</div>
<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.Password')</label>
<input type="password" name="password" placeholder="**** ****" class="form-control" required />
</div>
</div>
</div>



<div class="row gy-4 mb-3">

<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.ID License')</label>
<input type="text" name="IDLicense" class="form-control" placeholder="0123456789"  />
</div>
</div>
<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.ID License Date')</label>
<input type="date" name="IDLicenseDate" placeholder="" class="form-control"  />
</div>
</div>
<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.ID License Expiry')</label>
<input type="date" name="IDLicenseExpiry"  class="form-control"  />
</div>
</div>
<div class="col-md-6">
<!-- Default File Input Example -->
<div>
<label for="formFile" class="form-label">@lang('messages.ID License Document')</label>
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
<button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('messages.Close')</button>
<button type="submit" class="btn btn-success" id="add-btn">@lang('messages.Submit')</button>
<!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
</div>
</div>
</form>
</div>
</div>
</div>
<!-- End Page-content -->





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
$('.nav-link').on('click', function(e) {
e.preventDefault();
$(this).tab('show');
});
});
</script>
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