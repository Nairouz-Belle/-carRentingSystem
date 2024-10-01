@extends('AdminHome')
@section('content')
<!--end row-->
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-header align-items-center d-flex">
<h4 class="card-title mb-0 flex-grow-1">@lang('messages.Edit Brand')</h4>
</div><!-- end card header -->
<div class="card-body">

<form  action="{{route('Category.update',$category->id) }}" method="POST" class="tablelist-form" enctype="multipart/form-data"  autocomplete="off">
@csrf
@method('PUT')
<div class="modal-body">
<div class="text-center">
<h5 class="fs-17 mb-1">@lang('messages.Brand Picture')</h5>
<br>
<div class="profile-user position-relative d-inline-block mx-auto mb-4">

@if($category->image == NULL)
<img src="{{asset('assets/images/users/noProfilePicture.png')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
@else
<img src="{{ Storage::url($category->image) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
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
</div>
<div class="">
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Brand')</label>
<input type="text" name="brand" class="form-control" value="{{$category->brand}}" required />
</div>
</div>
</div>


</div>
<div class="modal-footer">
<div class="hstack gap-2 justify-content-end">
<button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('messages.Close')</button>
<button type="submit" class="btn btn-dark" id="add-btn">@lang('messages.Edit Category')</button>
<!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
</div>
</div>
</form>                    
</div>
</div>
</div>
<!--end col-->
</div>

</div>
</div>                                
@endsection