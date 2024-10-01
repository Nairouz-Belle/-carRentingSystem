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
<a href="{{route('Company.index')}} "  style="color: black;"><i class="ri-image-edit-line align-bottom me-1"></i> @lang('messages.Go Back')</a>
</label>
</div>
</div>
</div>
</div>
</div>

<form action="{{ route('Company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">
<div class="col-xxl-3">
<div class="card mt-n5">
<div class="card-body p-4">
<div class="text-center">
<div class="profile-user position-relative d-inline-block mx-auto  mb-4">

@if($company->image == NULL)
<img src="{{asset('assets/images/users/noProfilePicture.png')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
@else
<img src="{{ Storage::url($company->image) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
@endif

<div class="avatar-xs p-0 rounded-circle profile-photo-edit">
<input id="profile-img-file-input" name="image" type="file" class="profile-img-file-input">
<label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
<span class="avatar-title rounded-circle bg-light text-body">
<i class="ri-camera-fill"></i>
</span>
</label>
</div>
</div>
<h5 class="fs-17 mb-1 text-info">{{$company->companyName}}</h5>

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
<a class="nav-link active text-success" data-bs-toggle="tab" href="#personalDetails" role="tab">
<i class="fas fa-home"></i>
@lang('messages.Company Details')
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
@lang('messages.Company Name')</label>
<input type="text" name="companyName" class="form-control" id="lastnameInput" placeholder="" value="{{$company->companyName}}">
</div>
</div>

<div class="col-lg-6">
<div class="mb-3">
<label for="lastnameInput" class="form-label">
@lang('messages.Owner Name')</label>
<input type="text" name="owner" class="form-control" id="lastnameInput" placeholder="" value="{{$company->owner}}">
</div>
</div>

<div class="col-lg-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Address')</label>
<input type="text" name="address" class="form-control" id="lastnameInput" placeholder="" value="{{$company->address}}">
</div>
</div>


<div class="col-lg-6">
<div class="mb-3">
<label for="amount-field" class="form-label">@lang('messages.Phone')</label>
<input type="text" name="phone" class="form-control" placeholder="" value="{{$company->phone}}" required />
</div>
</div>

<div class="col-lg-6">
<div class="mb-3">
<label  class="form-label">@lang('messages.Email')</label>
<input type="email" name="email" value="{{$company->email}}"class="form-control" placeholder="Phone" required />
</div>
</div>




<div class="col-lg-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Site Web')</label>
<input type="text" name="siteweb" class="form-control" id="lastnameInput" placeholder="" value="{{$company->siteweb}}">
</div>
</div>
<div class="col-lg-6">
<div class="mb-3">
<label for="birthDate" class="form-label">Facebook</label>
<input type="text" name="facebook"value="{{$company->facebook}}" class="form-control">
</div>
</div>






<div class="col-lg-6">
<div class="mb-3">
<label  class="form-label">Instagram</label>
<input type="text" value="{{$company->instagram}}" name="instagram" class="form-control" placeholder="" required />
</div>
</div>




<div class="col-lg-12">
<div class="mb-3">
<label for="lastnameInput" class="form-label">
@lang('messages.Description')</label>
<textarea type="text" name="description" class="form-control" id="lastnameInput" placeholder="">{{$company->description}}</textarea>
</div>
</div>







<!--end col-->
<div class="col-lg-12">
<div class="hstack gap-2 justify-content-end">
<button type="submit" class="btn btn-primary">@lang('messages.Update')</button>
<button type="button" class="btn btn-soft-success">@lang('messages.Cancel')</button>
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
