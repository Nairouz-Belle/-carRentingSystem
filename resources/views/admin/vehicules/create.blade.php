@extends('AdminHome')
@section('content')


<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/modern/apps-ecommerce-add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2023 13:30:56 GMT -->
<head>

<meta charset="utf-8" />
<title>@lang('messages.Create Vehicle')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Plugins css -->
<link href="{{asset('assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />

<!-- Layout config Js -->
<script src="{{asset('assets/js/layout.js')}}"></script>
<!-- Bootstrap Css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />


</head>

<body>


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Create Vehicle')</h4>

</div>
</div>
</div>
<!-- end page title -->

<form action="{{route('Vehicules.store')}}" method="POST" id="createproduct-form" autocomplete="off" class="needs-validation" enctype="multipart/form-data" novalidate>
@csrf
<div class="row">
<div class="col-lg-8">
<div class="card">
<div class="card-body">
<div class="col-md-12">
<div class="mb-3">
<label class="form-label" for="product-title-input">@lang('messages.Vehicle Model')</label>

<input type="text" class="form-control" id="product-title-input" value="" placeholder="@lang('messages.Vehicle Model')" name="carName" required>

</div>
</div>

<div>
<label class="form-label" for="des-info-description-input">Description</label>
<textarea class="form-control" placeholder="Description" name="description" id="des-info-description-input" rows="3" style="height: 233px;" required=""></textarea>
<div class="invalid-feedback">@lang('messages.Please enter a description')</div>
</div>
</div>
</div>

<div class="card">
<div class="card-header">
<h5 class="card-title mb-0">@lang('messages.Vehicle Gallery')</h5>
</div>
<div class="card-body">
<div class="mb-4">
<h5 class="fs-15 mb-1">@lang('messages.Vehicle Image')</h5>
<p class="text-muted">@lang('messages.Add Vehicle main Image.')</p>
<div class="text-center">
<div class="text-center">
<div class="profile-user position-relative d-inline-block mx-auto mb-2">
<img src="{{asset('assets/images/users/CarDownload.png')}}" style="height:280px;width:280px;" class=" avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
<div class="avatar-xs p-0  profile-photo-edit">
<input id="profile-img-file-input" type="file" class="profile-img-file-input" accept="image/png, image/jpeg" name="carPic">
<label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
<span class="avatar-title rounded-circle bg-light text-body">
<i class="ri-camera-fill"></i>
</span>
</label>
</div>
</div>
<h5 class="fs-14">@lang('messages.Add Image')</h5>

</div>
</div>
</div>
<div>
<h5 class="fs-15 mb-1">@lang('messages.Vehicle Gallery')</h5>
<p class="text-muted">@lang('messages.Add Vehicle Gallery Images.')</p>

<div class="dropzone">
<div class="fallback">
<input name="image[]" type="file" multiple>
</div>
<div class="dz-message needsclick">
<div class="mb-3">
<i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
</div>

<h5>@lang('messages.Drop files here or click to upload.')</h5>
</div>
</div>


<!-- end dropzon-preview -->
</div>

</div>
</div>
<div class="text-end mb-3">
<button type="submit" class="btn btn-dark w-sm">@lang('messages.Submit')</button>
</div>
</div>
<!-- end col -->


<div class="col-lg-4">
<div class="card">
<div class="card-body">

<div class="mb-3">
<label for="choices-publish-status-input" class="form-label">@lang('messages.Vehicle Identity Number')</label>
<input type="text" class="form-control" id="manufacturer-name-input"  name="vin" placeholder="@lang('messages.Vehicle Identity Number')">
</div>

<div class="mb-3">
<label for="choices-publish-status-input" class="form-label">@lang('messages.Vehicle Type')</label>
<select class="form-select"  name="type" id="choices-publish-status-input" data-choices data-choices-search-false>
<option value="">--- @lang('messages.Choose') ---</option>
<option value="Car">@lang('messages.Car')</option>
<option value="Van">@lang('messages.Van')</option>
<option value="Minibus">@lang('messages.Minibus')</option>
<option value="Prestige">@lang('messages.Prestige')</option>

</select>
</div>

<div class="mb-3">
<label for="choices-publish-status-input" class="form-label">@lang('messages.Car Body Type')</label>
<select class="form-select"  name="shape" id="choices-publish-status-input" data-choices data-choices-search-false>
<option value="">--- @lang('messages.Choose') ---</option>
<option value="Convertible">@lang('messages.Convertible')</option>
<option value="Coupe">@lang('messages.Coupe')</option>
<option value="Exotic Cars">@lang('messages.Exotic Cars')</option>
<option value="Hatchback">@lang('messages.Hatchback')</option>
<option value="Minivan">@lang('messages.Minivan')</option>
<option value="Pickup Truck">@lang('messages.Pickup Truck')</option>
<option value="Sedan">@lang('messages.Sedan')</option>
<option value="Sports Car">@lang('messages.Sports Car')</option>
<option value="Station Wagon">@lang('messages.Station Wagon')</option>
<option value="SUV">@lang('messages.SUV')</option>
</select>
</div>


<div  class="mb-3">
<label for="choices-publish-visibility-input" class="form-label">@lang('messages.Transmission')</label>
<select class="form-select"  name="transmission" id="choices-publish-visibility-input" data-choices data-choices-search-false>
<option value="">--- @lang('messages.Choose') ---</option>
<option value="Manual">@lang('messages.Manual')</option>
<option value="Automatic">@lang('messages.Automatic')</option>
<option value="CVT">@lang('messages.CVT')</option>
</select>
</div>

<div>
<label for="choices-publish-visibility-input" class="form-label">@lang('messages.Fuel Type')</label>
<select class="form-select" name="fuelType" id="choices-publish-visibility-input" data-choices data-choices-search-false>
<option value="">--- @lang('messages.Choose') ---</option>
<option value="Diesl">@lang('messages.Diesel')</option>
<option value="Gasoline">@lang('messages.Gasoline')</option>
<option value="Electric">@lang('messages.Electric')</option>
<option value="Hybrid">@lang('messages.Hybrid')</option>
<option value="Flex-fuel">@lang('messages.Flex-fuel')</option>
</select>
</div>
</div>
<!-- end card body -->
</div>
@php
$categories= App\Models\Category::all();
@endphp

<div class="card">
<div class="card-header">
<h5 class="card-title mb-0">@lang('messages.Vehicle Categories')</h5>
</div>
<div class="card-body">
<select class="form-select" id="choices-category-input" name="category_id" data-choices data-choices-search-false>
<option>--- @lang('messages.Choose') ---</option>
@foreach ($categories as $cat)
<option value="{{$cat->id}}">{{$cat->brand}}</option>
@endforeach

</select>
</div>
<!-- end card body -->
</div>

<div class="card">
<div class="card-body">
<div class="col-lg-12">
<div class="mb-3">
<label class="form-label" for="manufacturer-name-input">@lang('messages.Production Year')</label>
<input type="number" name="productionYear" class="form-control" id="manufacturer-name-input" placeholder="@lang('messages.Production Year')">
</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="manufacturer-brand-input">@lang('messages.License Plate')</label>
<input type="number" name="LicensePlate"class="form-control" id="manufacturer-brand-input" placeholder="@lang('messages.License Plate')">
</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="manufacturer-brand-input">@lang('messages.Colors')</label>
<input type="text" name="color" class="form-control" id="manufacturer-brand-input" placeholder="@lang('messages.Colors')">
</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="manufacturer-brand-input">@lang('messages.Mileage')(km)</label>
<input type="number" name="km" class="form-control" id="manufacturer-brand-input" placeholder="@lang('messages.Mileage')">
</div>
</div>


</div>
</div>
<div class="card">
<div class="card-body">
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Seats')</label>
<div class="input-group has-validation mb-3">

<input type="number"  name="seating"class="form-control" id="product-price-input" placeholder="@lang('messages.Seats')" aria-label="Price" aria-describedby="product-price-addon" required>

</div>

</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Price')</label>
<div class="input-group has-validation mb-3">
<span class="input-group-text" id="product-price-addon">$</span>
<input type="text" name="price" class="form-control" id="product-price-input" placeholder="@lang('messages.Price')" aria-label="Price" aria-describedby="product-price-addon" required>

</div>

</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Fine Per Day')</label>
<div class="input-group has-validation mb-3">
<span class="input-group-text" id="product-price-addon">$</span>
<input type="text" name="fine" class="form-control" id="product-price-input" placeholder="@lang('messages.Fine Per Day')" aria-label="Price" aria-describedby="product-price-addon" required>

</div>

</div>
</div>

<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Airbags')</label>
<div class="input-group has-validation mb-3">

<input type="bumber" name="airbags" class="form-control" id="product-price-input" placeholder="@lang('messages.Airbags')" aria-label="Price" aria-describedby="product-price-addon" required>

</div>

</div>
</div>

<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Engine')</label>
<div class="input-group has-validation mb-3">

<input type="bumber" name="engine" class="form-control" id="product-price-input" placeholder="@lang('messages.Engine')" aria-label="Price" aria-describedby="product-price-addon" required>

</div>

</div>
</div>
</div>
</div>
<!-- end card -->

</div>
<!-- end col -->
</div>
<!-- end row -->

</form>

</div>
<!-- container-fluid -->
</div>



<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- ckeditor -->
<script src="{{asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

<!-- dropzone js -->
<script src="{{asset('assets/libs/dropzone/dropzone-min.js')}}"></script>

<script src="{{asset('assets/js/pages/ecommerce-product-create.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

<script type="text/javascript">

</script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/modern/apps-ecommerce-add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2023 13:30:57 GMT -->
</html>
@endsection



