@extends('AdminHome')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Vehicles')</h4>

<div class="page-title-right">
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
<li class="breadcrumb-item active"></li>
</ol>
</div>

</div>
</div>
</div>
<!-- end page title -->
@if (session('error'))

<!-- Danger Alert -->
<div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show" role="alert">
<i class="ri-error-warning-line label-icon"></i><strong>@lang('messages.Error')</strong> - {{ session('error') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
<div class="row">

<div class="col-xl-3 col-lg-4">

<div class="card">
<div class="card-header">
<div class="d-flex mb-3">
<div class="flex-grow-1">
<h5 class="fs-16">@lang('messages.Filters')</h5>
</div>

</div>
</div>

<div class="accordion accordion-flush filter-accordion">

<!-- end accordion-item -->
<div class="card-body border-bottom">
<div>
<p class="text-muted text-uppercase fs-13 fw-medium mb-2">@lang('messages.Brands')</p>
<ul class="list-unstyled mb-0 filter-list">

@php
$category = App\Models\Category::all();

@endphp
@foreach($category as $cat)



<li>
<a href="{{route('admin.filterBrands',$cat->id)}}" class="d-flex py-1 align-items-center">
<div class="flex-grow-1">
<h5 class="fs-14 mb-0 listname text-primary">{{$cat->brand}}</h5>
</div>
<div class="flex-shrink-0 ms-2">
<span class="badge bg-light text-muted" >

</span>
</div>
</a>     
</li>

@endforeach
</ul>
</div>
</div>
<form action="{{route('admin.filterPrice')}}" method="POST">
@csrf
<div class="card-body border-bottom">
<p class="text-muted text-uppercase fs-13 fw-medium mb-4">@lang('messages.Price')</p>

<div id="product-price-range"></div>
<div class="formCost d-flex gap-2 align-items-center mt-3">


<input class="form-control form-control-sm" type="number"name="minCost" id="minCost"  /> <span class="fw-semibold text-muted">@lang('messages.to')</span> 
<input class="form-control form-control-sm" type="number"name="maxCost" id="maxCost"  />
<span class="fw-semibold text-muted"></span>
<input type="submit" value="submit" class="btn rounded-pill btn-info btn btn-soft-secondary btn-sm">

</div>
</div>
</form> 
<div class="accordion-item">
<h2 class="accordion-header" id="flush-headingDiscount">
<button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount" aria-expanded="true" aria-controls="flush-collapseDiscount">
<span class="text-muted text-uppercase fs-13 fw-medium">@lang('messages.Car Body Type')</span> <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>

</button>
</h2>
<form action="{{route('admin.filter')}}" method="POST">
@csrf 
<div id="flush-collapseDiscount" class="accordion-collapse " aria-labelledby="flush-headingDiscount">
<div class="accordion-body text-body pt-1">
<div class="d-flex flex-column gap-2 filter-check">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Convertible" >
<label class="form-check-label" for="productdiscountRadio6">@lang('messages.Convertible')</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Coupe">
<label class="form-check-label" for="productdiscountRadio5">@lang('messages.Coupe')</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Exotic Cars">
<label class="form-check-label" for="productdiscountRadio4">
@lang('messages.Exotic Cars')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox"name="shape[]" value="Hatchback">
<label class="form-check-label" for="productdiscountRadio3">
@lang('messages.Hatchback')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Hatchback">
<label class="form-check-label" for="productdiscountRadio2">
@lang('messages.Minivan')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Pickup Truck">
<label class="form-check-label" for="productdiscountRadio1">
@lang('messages.Pickup Truck')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Sedan">
<label class="form-check-label" for="productdiscountRadio1">
@lang('messages.Sedan')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Sports Car">
<label class="form-check-label" for="productdiscountRadio1">
@lang('messages.Sports Car')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="Station Wagon">
<label class="form-check-label" for="productdiscountRadio1">
@lang('messages.Station Wagon')
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="shape[]" value="SUV">
<label class="form-check-label" for="productdiscountRadio1">
@lang('messages.SUV')
</label>
</div>
<button type="submit" class="btn rounded-pill btn-info btn btn-soft-secondary btn-sm">@lang('messages.Submit')</button>

</div>
</div>
</div>
</form>
</div>
</div>

</div>
<!-- end card -->
</div>

<!-- end col -->

<div class="col-xl-9 col-lg-8">
<div>
<div class="card">
<div class="card-header border-0">
<div class="row g-4">
<div class="col-sm-auto">
<div>

<a href="{{route('Vehicules.create')}}" class="btn btn-info"><i class="ri-add-line align-bottom me-1" id="addproduct-btn"></i> @lang('messages.Add Vehicle')</a>
</div>
</div>
<div class="col-sm">
<div class="d-flex justify-content-sm-end">
<div class="search-box ms-2">
<input type="text" class="form-control" id="searchProductList" placeholder="Search Vehicule..."wire:model="search" >
<i class="ri-search-line search-icon"></i>
</div>
</div>
</div>
</div>
</div>
@php
$all=App\Models\Vehicule::count();
$available=App\Models\Vehicule::where('status','=','Available')->count();
$rent=App\Models\Vehicule::where('status','=','On Rent')->count();
@endphp
<div class="card-header">
<div class="row align-items-center">
<div class="col">
<ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
<li class="nav-item">
<a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
@lang('messages.All') <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$all}}</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab">
@lang('messages.Available') <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$available}}</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab">
@lang('messages.On Rent')<span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$rent}}</span>
</a>
</li>
</ul>
</div>
<div class="col-auto">
<div id="selection-element">

</div>
</div>
</div>


</div>









<div class="card-body">

<div class="tab-content text-muted">
<div class="tab-pane active" id="productnav-all" role="tabpanel">
<div id="table-product-list-all" class="table-card gridjs-border-none">

<div class="row">
@foreach($vehicules as $car)

<div class="col-lg-4" id="products-table">
<div class="card explore-box card-animate border">
<div class="card-body">


<div class="card ribbon-box border shadow-none mb-lg-0 right">
<div class="card-body text-muted">
@if($car->status=='Available')
<span class="ribbon-three ribbon-three-success"><span>@lang('messages.Available')</span></span>
@elseif($car->status=='On Rent')
<span class="ribbon-three ribbon-three-danger"><span>@lang('messages.On Rent')</span></span>
@endif
<h5 class="fs-14 mb-3">{{$car->carName}}</h5>
<p>{{$car->shape}}</p>
</div>
</div>



<div class="d-flex align-items-center mb-3">
<div class="ms-2 flex-grow-1" id="bobo">
<a href=""><h6 class="mb-1 fs-15"></h6></a>
<p class="mb-0 text-muted fs-13" class="Coupe"></p>
</div>

</div>
<div class="explore-place-bid-img overflow-hidden rounded">
<img src="{{ Storage::url($car->carPic) }}" alt="" class="explore-img w-100">
<div class="bg-overlay"></div>
<div class="place-bid-btn">
<a href="{{route('Vehicules.show',$car->id)}}" class="btn btn-primary">
<i class="ri-eye-fill">
</i>
</a>
<a href="{{route('Vehicules.edit',$car->id)}}" class="btn btn-success">
<i class="ri-edit-fill">
</i>
</a>
<a class="btn btn-danger">

<form method="POST" action="{{route('Vehicules.destroy',$car->id)}}" >
@csrf
<input name="_method" type="hidden" value="DELETE">

<button type="submit" style="background-color: inherit;border:none; width:14px ;height: 10px;">
<i class="ri-delete-bin-fill " style="color: white; ">
</i>
</button>
</form>
</a>
</div>

</div>
<div class="mt-3">
<form action="{{route('admin.renting',$car->id)}}" method="POST">
@csrf
<a href="" style="float: right;">
<button class="btn btn-info">@lang('messages.Rent')</button>
</a>
</form>
<h6 class="fs-16 mb-0">
<a href="" class="link-dark">@lang('messages.Daily Rate From')</a>
</h6>

<h5 class="text-success">
<i class=""></i> {{$car->price}} $ </h5>
</div>
</div>
</div>
</div>
@endforeach    
</div>

</div>
</div> 

<div class="tab-pane" id="productnav-published" role="tabpanel">
<div id="table-product-list-published" class="table-card gridjs-border-none">

<div class="row">
@foreach($vehicules as $car)
@if($car->status=='Available')

<div class="col-lg-4" id="products-table">
<div class="card explore-box card-animate border">
<div class="card-body">


<div class="card ribbon-box border shadow-none mb-lg-0 right">
<div class="card-body text-muted">
@if($car->status=='Available')
<span class="ribbon-three ribbon-three-success"><span>@lang('messages.Available')</span></span>
@elseif($car->status=='On Rent')
<span class="ribbon-three ribbon-three-danger"><span>@lang('messages.On Rent')</span></span>
@endif
<h5 class="fs-14 mb-3">{{$car->carName}}</h5>
<p>{{$car->shape}}</p>
</div>
</div>



<div class="d-flex align-items-center mb-3">
<div class="ms-2 flex-grow-1" id="bobo">
<a href=""><h6 class="mb-1 fs-15"></h6></a>
<p class="mb-0 text-muted fs-13" class="Coupe"></p>
</div>

</div>
<div class="explore-place-bid-img overflow-hidden rounded">
<img src="{{ Storage::url($car->carPic) }}" alt="" class="explore-img w-100">
<div class="bg-overlay"></div>
<div class="place-bid-btn">
<a href="{{route('Vehicules.show',$car->id)}}" class="btn btn-primary">
<i class="ri-eye-fill">
</i>
</a>
<a href="{{route('Vehicules.edit',$car->id)}}" class="btn btn-success">
<i class="ri-edit-fill">
</i>
</a>
<a class="btn btn-danger">

<form method="POST" action="{{route('Vehicules.destroy',$car->id)}}" >
@csrf
<input name="_method" type="hidden" value="DELETE">

<button type="submit" style="background-color: inherit;border:none; width:14px ;height: 10px;">
<i class="ri-delete-bin-fill " style="color: white; ">
</i>
</button>
</form>
</a>
</div>

</div>
<div class="mt-3">
<form action="{{route('admin.renting',$car->id)}}" method="POST">
@csrf
<a href="" style="float: right;">
<button class="btn btn-info">@lang('messages.Rent')</button>
</a>
</form>
<h6 class="fs-16 mb-0">
<a href="" class="link-dark">@lang('messages.Daily Rate From')</a>
</h6>

<h5 class="text-success">
<i class=""></i> {{$car->price}} $ </h5>
</div>
</div>
</div>
</div>
@endif
@endforeach    
</div>
</div>
</div>
<!-- end tab pane -->

<div class="tab-pane" id="productnav-draft" role="tabpanel">
<div class="row">
@foreach($vehicules as $car)
@if($car->status=='On Rent')
<div class="col-lg-4" id="products-table">
<div class="card explore-box card-animate border">
<div class="card-body">


<div class="card ribbon-box border shadow-none mb-lg-0 right">
<div class="card-body text-muted">
@if($car->status=='Available')
<span class="ribbon-three ribbon-three-success"><span>@lang('messages.Available')</span></span>
@elseif($car->status=='On Rent')
<span class="ribbon-three ribbon-three-danger"><span>@lang('messages.On Rent')</span></span>
@endif
<h5 class="fs-14 mb-3">{{$car->carName}}</h5>
<p>{{$car->shape}}</p>
</div>
</div>



<div class="d-flex align-items-center mb-3">
<div class="ms-2 flex-grow-1" id="bobo">
<a href=""><h6 class="mb-1 fs-15"></h6></a>
<p class="mb-0 text-muted fs-13" class="Coupe"></p>
</div>

</div>
<div class="explore-place-bid-img overflow-hidden rounded">
<img src="{{ Storage::url($car->carPic) }}" alt="" class="explore-img w-100">
<div class="bg-overlay"></div>
<div class="place-bid-btn">
<a href="{{route('Vehicules.show',$car->id)}}" class="btn btn-primary">
<i class="ri-eye-fill">
</i>
</a>
<a href="{{route('Vehicules.edit',$car->id)}}" class="btn btn-success">
<i class="ri-edit-fill">
</i>
</a>
<a class="btn btn-danger">

<form method="POST" action="{{route('Vehicules.destroy',$car->id)}}" >
@csrf
<input name="_method" type="hidden" value="DELETE">

<button type="submit" style="background-color: inherit;border:none; width:14px ;height: 10px;">
<i class="ri-delete-bin-fill " style="color: white; ">
</i>
</button>
</form>
</a>
</div>

</div>
<div class="mt-3">
<form action="{{route('admin.renting',$car->id)}}" method="POST">
@csrf
<a href="" style="float: right;">
<button class="btn btn-info">@lang('messages.Rent')</button>
</a>
</form>
<h6 class="fs-16 mb-0">
<a href="" class="link-dark">@lang('messages.Daily Rate From')</a>
</h6>

<h5 class="text-success">
<i class=""></i> {{$car->price}} $ </h5>
</div>
</div>
</div>
</div>
@endif
@endforeach    
</div>
</div>
</div>



</div>
<!-- end card -->
</div>
</div>
</div>
<!-- end row -->

</div>
<!-- container-fluid -->

</div>
<script type="text/javascript">
var sliderColorScheme = document.querySelectorAll('[data-rangeslider]');

sliderColorScheme.forEach(function (slider) {
noUiSlider.create(slider, {
start: 127,
connect: 'lower',
range: {
'min': 0,
'max': 255
},
});
});
</script>
<!--<script type="text/javascript">
$(document).ready(function() {
// Bind the applyFilter function to the change event of all checkboxes with the name "shape[]"
$('input[name="shape[]"]').on('change', applyFilter);

function applyFilter() {
var formData = $('#filter-form').serialize();
$.ajax({
type: 'GET',
url: '{{ route('admin.filter') }}',
data: formData,
success: function(data) {
// Update the products table with the filtered data
alert('success');
$('#products-table').html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
console.log(jqXHR); // log the full jqXHR object for debugging purposes
console.log(textStatus); // log the error message
console.log(errorThrown); // log the error type
alert('Error: ' + errorThrown);
}
});
}
});
</script>-->
@endsection        