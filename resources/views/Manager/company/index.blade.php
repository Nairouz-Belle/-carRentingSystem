@extends('ManagerHome')
@section('content')




<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
@php
$company=App\Models\Company::count();
@endphp
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Company')</h4>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="card">
@if($company == 0)
<div class="card-header" style="">
<span style="font-size: 24px;font-weight: bold;color: #5ea3cb;"></span>
<button type="button" class="btn btn-info add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="float:right;"><i class="ri-add-line align-bottom me-1"></i>@lang('messages.Create Company')</button>
</div>
@else
@endif

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
<form  action="{{route('manager.company.store')}}" method="POST" class="tablelist-form" enctype="multipart/form-data"  autocomplete="off">
@csrf
<div class="modal-body">
<div class="text-center">
<h5 class="fs-17 mb-1">@lang('messages.Company Logo')</h5>
<br>
<div class="profile-user position-relative d-inline-block mx-auto mb-4">

<img src="{{asset('assets/images/users/multi-user.jpg')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">

<div class="avatar-xs p-0 rounded-circle profile-photo-edit">
<input name="image" id="profile-img-file-input" type="file" class="profile-img-file-input">
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
<label for="amount-field" class="form-label">@lang('messages.Company Name')<span class="text-danger">*</span></label>
<input type="text" name="companyName" class="form-control" placeholder="Enter Company Name" required />
</div>
</div>

<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.Owner Name')<span class="text-danger">*</span></label>
<input type="text" name="owner" class="form-control" placeholder="Owner Name"  />
</div>
</div>
</div>
<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Address')<span class="text-danger">*</span></label>
<input type="text" name="address" class="form-control" placeholder="Enter Address" required />

</div>
</div>




<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Phone')<span class="text-danger">*</span></label>
<input type="number" name="phone" class="form-control" placeholder="Address" required />

</div>
</div></div>

<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label  class="form-label">@lang('messages.Email')<span class="text-danger">*</span></label>
<input type="email" name="email" class="form-control" placeholder="email@email.email" required />
</div>
</div>




<div class="col-md-6">
<div>
<label for="" class="form-label">@lang('messages.Web site')<span class="text-danger">*</span></label>
<input type="email"placeholder="Site Web" name="siteweb" class="form-control" required />
</div>
</div>
</div>

<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label  class="form-label">Facebook</label>
<input type="email" placeholder="Facebook" name="facebook" class="form-control" />
</div>
</div>




<div class="col-md-6">
<div>
<label  class="form-label">Instagram</label>
<input type="email" name="instagram" class="form-control" placeholder="Instagram"  />
</div>
</div>
</div>
<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label  class="form-label">Twitter</label>
<input type="emain" name="twitter" placeholder="Twitter" class="form-control" />
</div>
</div>






<div class="col-md-6">
<div>
<label  class="form-label">Linkedin</label>
<input type="text" name="linkedin" class="form-control" placeholder="Linkedin"  />
</div>
</div>
</div>

<div class="col-md-12">
<div>
<label  class="form-label">@lang('messages.Description')</label>
<textarea type="text" name="description" class="form-control" placeholder="Description">  </textarea>
</div>
</div>







</div>
<div class="modal-footer">
<div class="hstack gap-2 justify-content-end">
<button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('messages.Close')</button>
<button type="submit" class="btn btn-success" id="add-btn">@lang('messages.Add Company')</button>
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

@if($company)

@foreach($companies as $company) 
 <center>
 <div class="col-xxl-6">
    <div class="card" id="company-view-detail">
    <div class="card-body text-center">
    <div class="position-relative d-inline-block">
    <div  style="width: 600px;height: 92px;">
    <div class="avatar-title bg-light ">
    <img src="{{ Storage::url($company->image) }}" alt="" style="width: 80px;height: 80px;">
    </div>
    </div>
    </div>

    <h5 class="mt-3 mb-1 text-info text-uppercase">{{$company->companyName}}</h5>
    <p class="text-primary"></p>

    <ul class="list-inline mb-0">
        <li class="list-inline-item avatar-xs">
        <a  class="avatar-title bg-soft-danger text-success fs-15 rounded">
            <form method="POST" action="{{route('manager.company.destroy',$company->id)}}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''>
                    <i class="ri-delete-bin-fill" style="color:tomato;"></i>
                </button>
            </form>
        </a>
        </li>

        <li class="list-inline-item avatar-xs">
        <a href="{{route('manager.company.edit',$company->id)}}" class="avatar-title bg-soft-success text-success fs-15 rounded">
        <i class="ri-pencil-fill"></i>
        </a>
        </li>
    </ul>
    </div>
    @php
    $users= App\Models\User::count();
    @endphp
    <div class="card-body">


    <div class="table-responsive table-card">
    <table class="table table-borderless mb-0">
    <tbody>

    <br><br>

    <tr>
    <td class="fw-medium" scope="row">@lang('messages.Owner')</td>
    <td>
    <a href="javascript:void(0);" class="text-primary">{{$company->owner}}</a>
    </td>

    <td class="fw-medium" scope="row">Facebook</td>
    <td>
    <a  class="text-muted">{{$company->facebook}}</a>
    </td>
    </tr>
    <tr>
    <td class="fw-medium" scope="row">@lang('messages.Location')</td>
    <td>
    <a href="javascript:void(0);" class="text-primary">{{$company->address}}</a>
    </td>

    <td class="fw-medium" scope="row">Instagram</td>
    <td>
    <a  class="text-muted">{{$company->instagram}}</a>
    </td>
    </tr>
    <tr>
    <td class="fw-medium" scope="row">@lang('messages.Contact Email')</td>
    <td class="text-success">{{$company->email}}</td>

    <td class="fw-medium" scope="row">Linkedin</td>
    <td>
    <a  class="text-muted">{{$company->linkedin}}</a>
    </td>
    </tr>

    <tr>
    <td class="fw-medium" scope="row">@lang('messages.Phone')</td>
    <td class="text-muted">{{$company->phone}}</td>

    <td class="fw-medium" scope="row">Twitter</td>
    <td>
    <a  class="text-muted">{{$company->twitter}}</a>
    </td>
    </tr>

    <tr>
    <td class="fw-medium" scope="row">@lang('messages.Employee')</td>
    <td>{{$users}}</td>

    <td class="fw-medium" scope="row">Siteweb</td>
    <td>
    <a  class="text-muted">{{$company->siteweb}}</a>
    </td>
    </tr>

    <tr>
    <td class="fw-medium" scope="row">@lang('messages.Since')</td>
    <td>{{$company->created_at->format('Y')}}</td>
    </tr>

    <tr>
    <td class="fw-medium" scope="row">@lang('messages.INFORMATION')</td>
    <td colspan="3">
    <a  class="text-muted">{{$company->description}}</a><br><br><br><br>
    </td>
    </tr>


    </tbody>

    </table>
    </div>
    </div>
    </div>
    <!--end card-->
 </div>
</center>
@endforeach
@endif
<!--end col-->

</div>



</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-sm-6">
<script>document.write(new Date().getFullYear())</script>2023 © @lang('messages.Car Rental') 
</div>
<div class="col-sm-6">
<div class="text-sm-end d-none d-sm-block">

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