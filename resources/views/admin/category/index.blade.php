@extends('AdminHome')
@section('content')

<div class="page-content">
<div class="container-fluid">

<div class="col-lg-12">
<div class="card">
<div class="card-header">
<div class="d-flex align-items-center flex-wrap gap-2">
<div class="flex-grow-1">
<button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> @lang('messages.Add Category')</button>
</div>

</div>
</div>
</div>
</div>


<div class="row row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-1">
@foreach($categories as $brand)  
<div class="col">
<div class="card explore-box">
<div class="card-body">
<div class="d-flex align-items-center mb-3">

<div class="ms-2 flex-grow-1">
<h6 class="mb-0 fs-15 text-dark">{{$brand->brand}}</h6>

</div>

</div>
<div class="explore-place-bid-img overflow-hidden rounded">
<img src="{{ Storage::url($brand->image) }}" alt="" class="img-fluid explore-img">
<div class="bg-overlay"></div>
<div class="place-bid-btn" style="display: flex;">

<a href="{{route('Category.edit',$brand->id)}}" class="btn btn-info"><i class="ri-edit-fill align-bottom me-1"></i>
</a>

<form action="{{route('Category.destroy',$brand->id)}}" method="POST">
@csrf
<input name="_method" type="hidden" value="DELETE">

<button type="submit" class="btn btn-danger"><i class="ri-delete-bin-fill align-bottom me-1"></i></button>
</form>
</div>
</div>
</div>
</div>
</div>
@endforeach
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
<form  action="{{route('Category.store')}}" method="POST" class="tablelist-form" enctype="multipart/form-data"  autocomplete="off">
@csrf
<div class="modal-body">
<div class="text-center">
<h5 class="fs-17 mb-1">@lang('messages.Category Logo')</h5>
<br>
<div class="profile-user position-relative  d-inline-block mx-auto mb-4">

<img src="{{asset('assets/images/users/CarDownload.png')}}" class="avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">




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
<label for="amount-field" class="form-label">@lang('messages.Brand')</label>
<input type="text" name="brand" class="form-control" placeholder="Enter Brand" required />
</div>
</div>
</div>


</div>
<div class="modal-footer">
<div class="hstack gap-2 justify-content-end">
<button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('messages.Close')</button>
<button type="submit" class="btn btn-dark" id="add-btn">@lang('messages.Add Category')</button>
<!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
</div>
</div>
</form>
</div>
</div>
</div>
<!-- container-fluid -->
</div>

<!-- END layout-wrapper -->


<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
<i class="ri-arrow-up-line"></i>
</button>

<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Vector map-->
<script src="{{asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!-- Countdown js -->
<script src="{{asset('assets/js/pages/coming-soon.init.js')}}"></script>

<!-- Marketplace init -->
<script src="{{asset('assets/js/pages/dashboard-nft.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
@endsection