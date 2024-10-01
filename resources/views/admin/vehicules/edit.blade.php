@extends('AdminHome')
@section('content')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Edit Vehicle')</h4>



</div>
</div>
</div>
<!-- end page title -->

<form action="{{route('Vehicules.update',$vehicule->id)}}" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
@csrf
@method('PUT')
<div class="row">
<div class="col-lg-8">
<div class="card">
<div class="card-body">
<div class="col-md-12">
<div class="mb-3">
<label class="form-label" for="product-title-input">@lang('messages.Vehicle Model')</label>

<input type="text" class="form-control" id="product-title-input"  placeholder="@lang('messages.Vehicule Model')" name="carName" value="{{$vehicule->carName}}" required>

</div>
</div>

<div>
<label class="form-label" for="des-info-description-input">@lang('messages.Description')</label>
<textarea class="form-control" name="description" id="des-info-description-input" rows="3" style="height: 233px;" required>{{$vehicule->description }}</textarea>

</div>
</div>
</div>
<!-- end card -->

<div class="card" >
<div class="card-header">
<h5 class="card-title mb-0">@lang('messages.Vehicle Gallery')</h5>
</div>
<div class="card-body">
<div class="mb-4">
<h5 class="fs-15 mb-1">@lang('messages.Vehicle Image')</h5>
<p class="text-muted">@lang('messages.Edit Vehicle main Image.')</p>
<div class="text-center">
<div class="position-relative d-inline-block">
<div class="text-center">
<div class="profile-user position-relative d-inline-block mx-auto mb-2">
<img src="{{Storage::url($vehicule->carPic)}}"  class=" avatar-lg img-thumbnail user-profile-image" alt="user-profile-image" style="height:350px;width: 350px;">
<div class="avatar-xs p-0 rounded-circle profile-photo-edit">
<input id="profile-img-file-input" name="carPic" type="file" value="{{$vehicule->carPic}}"class="profile-img-file-input" accept="image/png,image/jpeg,image/jpg">
<label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
<span class="avatar-title rounded-circle bg-light text-body">
<i class="ri-camera-fill"></i>
</span>
</label>
</div>
</div>
<h5 class="fs-14">@lang('messages.Edit Image')</h5>

</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12" >
<div class="card">
<div class="card-header">
<h4 class="card-title mb-0">@lang('messages.Other Images')</h4>
</div><!-- end card header -->

<div class="card-body" style="height: 200px;">             
<div>

<input class="form-control" type="file" name="image[]" value="{{$vehicule->image}}" id="formFileMultiple" multiple>
</div>
</div>
<!-- end card body -->
</div>
<!-- end card -->
</div> <!-- end col -->
</div>

<!-- end card -->
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
<input type="text" class="form-control" id="manufacturer-name-input"  name="vin" value="{{$vehicule->vin}}" placeholder="@lang('messages.Vehicle Identity Number')">
</div>

<div  class="mb-3">
<label for="choices-publish-visibility-input" class="form-label">@lang('messages.Vehicle Type')</label>
<select class="form-select"  name="type" id="choices-publish-visibility-input" data-choices data-choices-search-false>

<option value="Car" {{($vehicule->type ==='Car') ? 'selected' : ''}}>@lang('messages.Car')</option>

<option value="Van" {{($vehicule->type ==='Van') ? 'selected' : ''}}>@lang('messages.Van')</option>

<option value="Minibus" {{($vehicule->type ==='Minibus') ? 'selected' : ''}}>@lang('messages.Minibus')</option>

<option value="Prestige" {{($vehicule->type ==='Prestige') ? 'selected' : ''}}>@lang('messages.Prestige')</option>

</select>
</div>


<div class="mb-3">
<label for="choices-publish-status-input" class="form-label">@lang('messages.Car Body Type') </label>
<select class="form-select"  name="shape" id="choices-publish-status-input" data-choices data-choices-search-false>

<option value="Convertible" {{($vehicule->shape ==='Convertible') ? 'selected' : ''}}>@lang('messages.Convertible')</option>
<option value="Coupe" {{($vehicule->shape ==='Coupe') ? 'selected' : ''}}> @lang('messages.Coupe')</option>
<option value="Exotic Cars" {{($vehicule->shape ==='Exotic Cars') ? 'selected' : ''}}>@lang('messages.Exotic Cars')</option>
<option value="Hatchback" {{($vehicule->shape ==='Hatchback') ? 'selected' : ''}}>@lang('messages.Hatchback')</option>
<option value="Minivan" {{($vehicule->shape ==='Minivan') ? 'selected' : ''}}>@lang('messages.Minivan')</option>
<option value="Pickup Truck" {{($vehicule->shape ==='Pickup Truck') ? 'selected' : ''}}>@lang('messages.Pickup Truck')</option> 
<option value="Sedan" {{($vehicule->shape ==='Sedan') ? 'selected' : ''}}>@lang('messages.Sedan')</option>
<option value="Sports Car" {{($vehicule->shape ==='Sports Car') ? 'selected' : ''}}>@lang('messages.Sports Car')</option>
<option value="Station Wagon" {{($vehicule->shape ==='Station Wagon') ? 'selected' : ''}}>@lang('messages.Station Wagon')</option><option value="SUV" {{($vehicule->shape ==='SUV') ? 'selected' : ''}}>@lang('messages.SUV')</option>
</select>
</div>



<div  class="mb-3">
<label for="choices-publish-visibility-input" class="form-label">@lang('messages.Transmission')</label>
<select class="form-select"  name="transmission" id="choices-publish-visibility-input" data-choices data-choices-search-false>

<option value="Manual" {{($vehicule->transmission ==='Manual') ? 'selected' : ''}}>@lang('messages.Manual')</option>

<option value="Automatic" {{($vehicule->transmission ==='Automatic') ? 'selected' : ''}}>@lang('messages.Automatic')</option>


<option value="CVT" {{($vehicule->transmission ==='CVT') ? 'selected' : ''}}>@lang('messages.CVT')</option>
</select>
</div>

<div>
<label for="choices-publish-visibility-input" class="form-label">@lang('messages.Fuel Type')</label>
<select class="form-select" name="fuelType" id="choices-publish-visibility-input" data-choices data-choices-search-false>

<option value="Diesel" {{($vehicule->fuelType ==='Diesel') ? 'selected' : ''}}>@lang('messages.Diesel')</option>

<option value="Gasoline" {{($vehicule->fuelType ==='Gasoline') ? 'selected' : ''}}>@lang('messages.Gasoline')</option>

<option value="Electric" {{($vehicule->fuelType ==='Electric') ? 'selected' : ''}}>@lang('messages.Electric')</option>

<option value="Hybrid" {{($vehicule->fuelType ==='Hybrid') ? 'selected' : ''}}>@lang('messages.Hybrid')</option>

<option value="Flex-fuel" {{($vehicule->fuelType ==='Flex-fuel') ? 'selected' : ''}}>@lang('messages.Flex-fuel')</option>

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


@foreach ($categories as $cat)
<option value="{{$cat->id}}" {{($cat->id == $vehicule->category_id) ? 'selected="selected"' : ''}}>{{$cat->brand}}
</option>
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
<input type="text" name="productionYear" class="form-control" id="manufacturer-name-input" value="{{$vehicule->productionYear}}" placeholder="@lang('messages.Production Year')">
</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="manufacturer-brand-input">@lang('messages.License Plate')</label>
<input type="text" name="LicensePlate"class="form-control" id="manufacturer-brand-input" value="{{$vehicule->LicensePlate}}" placeholder="@lang('messages.License Plate')">
</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="manufacturer-brand-input">@lang('messages.Colors')</label>
<input type="text" name="color" class="form-control" id="manufacturer-brand-input" value="{{$vehicule->color}}" placeholder="@lang('messages.Colors')">
</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="manufacturer-brand-input">@lang('messages.Mileage')(km)</label>
<input type="text" name="km" value="{{$vehicule->km}}" class="form-control" id="manufacturer-brand-input" placeholder="@lang('messages.Mileage')">
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

<input type="number"  name="seating"class="form-control" id="product-price-input" placeholder="@lang('messages.Seats')" aria-label="Price" aria-describedby="product-price-addon"value="{{$vehicule->seating}}" required>

</div>

</div>
</div>
<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Price')</label>
<div class="input-group has-validation mb-3">
<span class="input-group-text" id="product-price-addon">$</span>
<input type="text" name="price" class="form-control" id="product-price-input" placeholder="@lang('messages.Price')" aria-label="Price" aria-describedby="product-price-addon" value="{{$vehicule->price}}" required>

</div>

</div>
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Fine Per Day')</label>
<div class="input-group has-validation mb-3">
<span class="input-group-text" id="product-price-addon">$</span>
<input type="text" name="fine" class="form-control" id="product-price-input" placeholder="@lang('messages.Fine Per Day')" aria-label="Price" aria-describedby="product-price-addon" value="{{$vehicule->fine}}" required>

</div>

</div>
</div>

<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Airbags')</label>
<div class="input-group has-validation mb-3">

<input type="bumber" name="airbags" class="form-control" id="product-price-input" placeholder="@lang('messages.Airbags')" aria-label="Price" aria-describedby="product-price-addon" value="{{$vehicule->airbags}}" required>

</div>

</div>
</div>

<div class="col-lg-12">
<div class="mb-6">
<label class="form-label" for="product-price-input">@lang('messages.Engine')</label>
<div class="input-group has-validation mb-3">

<input type="bumber" name="engine" class="form-control" id="product-price-input" placeholder="@lang('messages.Engine')" aria-label="Price" aria-describedby="product-price-addon" value="{{$vehicule->engine}}" required>

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
@endsection