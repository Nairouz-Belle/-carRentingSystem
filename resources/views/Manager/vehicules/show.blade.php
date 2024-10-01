@extends('ManagerHome')
@section('content')

<style type="text/css">
.rating {
display: flex;
flex-direction: row-reverse;
justify-content: center;
}

.rating > input{ display:none;}

.rating > label {
position: relative;
width: 1em;
font-size: 2vw;
color: #FFD600;
cursor: pointer;
}
.rating > label::before{ 
content: "\2605";
position: absolute;
opacity: 0;
}
.rating > label:hover:before,
.rating > label:hover ~ label:before {
opacity: 1 !important;
}

.rating > input:checked ~ label:before{
opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }







</style>
<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Vehicle Details')</h4>
</div>
</div>
</div>

<!-- Success Alert -->
@if (session('success'))
<div class="alert alert-success alert-dismissible alert-additional fade show" role="alert">
<div class="alert-body">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
<div class="d-flex">
<div class="flex-shrink-0 me-3">
<i class="ri-notification-off-line fs-16 align-middle"></i>
</div>
<div class="flex-grow-1">
<h5 class="alert-heading">@lang('messages.Yey Thanks For Rating') !!</h5>
<p class="mb-0"></p>
</div>
</div>
</div>
<div class="alert-content">
<p class="mb-0">{{ session('success') }}</p>
</div>
</div>
@endif



<!-- end page title -->

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row gx-lg-5">
<div class="col-xl-4 col-md-8 mx-auto">
<div class="product-img-slider sticky-side-div">
<div class="swiper product-thumbnail-slider p-2 rounded bg-light">
<div class="swiper-wrapper">
<div class="swiper-slide">
<img src="{{ Storage::url($vehicule->carPic) }}" alt="" class="img-fluid d-block" />
</div>
@php
$image = DB::table('vehicules')->where('id',$vehicule->id)->first();
$images = explode('|',$image->image);
@endphp
@foreach ($images as $item)
<div class="swiper-slide">
<img src="{{URL::to($item)}}" alt="" class="img-fluid d-block" />
</div>
@endforeach

</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
<!-- end swiper thumbnail slide -->
<div class="swiper product-nav-slider mt-2">
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="nav-slide-item ">
<img src="{{ Storage::url($vehicule->carPic) }}" alt="" class="img-fluid d-block" />
</div>
</div>
@php
$image = DB::table('vehicules')->where('id',$vehicule->id)->first();
$images = explode('|',$image->image);
@endphp
@foreach ($images as $item)
<div class="swiper-slide">
<div class="nav-slide-item">
<img src="{{URL::to($item)}}" alt="" class="img-fluid d-block" />
</div>
</div>
@endforeach

</div>
</div>
<!-- end swiper nav slide -->
</div>
</div>
<!-- end col -->

<div class="col-xl-8">
<div class="mt-xl-0 mt-5">
<div class="d-flex">
<div class="flex-grow-1">
<h4>{{$vehicule->carName}}</h4>
<div class="hstack gap-3 flex-wrap">
<div><a href="#" class="text-primary d-block">{{$vehicule->shape}}</a></div>


<div class="vr"></div>
<div class="text-muted">@lang('messages.Published') : <span class="text-body fw-medium">{{$vehicule->created_at}}</span>
</div>
</div>
</div>
<div class="flex-shrink-0">
<div>
<a href="{{route('manager.vehicules.edit',$vehicule->id)}}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
</div>
</div>
</div>

@php
$rating=App\Models\Rating::where('vehicule_id','=',$vehicule->id)->count();
$sumRating=App\Models\Rating::where('vehicule_id','=',$vehicule->id)->sum('rating');
if($rating != 0)
{$rate= $sumRating / $rating;}
else{$rate=0;}
$fiveStars=App\Models\Rating::where('vehicule_id','=',$vehicule->id)
->where('rating','=',5)
->count();
$fourStars=App\Models\Rating::where('vehicule_id','=',$vehicule->id)
->where('rating','=',4)
->count();
$threeStars=App\Models\Rating::where('vehicule_id','=',$vehicule->id)
->where('rating','=',3)
->count();
$twoStars=App\Models\Rating::where('vehicule_id','=',$vehicule->id)
->where('rating','=',2)
->count();
$oneStars=App\Models\Rating::where('vehicule_id','=',$vehicule->id)
->where('rating','=',1)
->count();

@endphp

<div class="d-flex flex-wrap gap-2 align-items-center mt-3">


@for ($i = 0; $i < floor($rate); $i++)
<i class="ri-star-fill text-danger"></i>
@endfor

@if ($rating - floor($rate) >= 0.5)
<i class="ri-star-half-fill text-danger"></i>
@endif

@for ($i = ceil($rate); $i < 5; $i++)
<i class="ri-star-fill"></i>
@endfor




<div class="text-muted">( {{$rating}} @lang('messages.Customer Review') )</div>
<div class="hstack flex-wrap gap-2">
<button class="btn btn-outline-secondary btn-load" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
<span class="d-flex align-items-center">
<span class="spinner-grow flex-shrink-0" role="status">
<span class="visually-hidden">@lang('messages.Rate & Review Now')...</span>
</span>
<span class="flex-grow-1 ms-2">
@lang('messages.Rate & Review Now')...
</span>
</span>
</button>




</div>
</div>

<div class="card-body">

<div class="live-preview">

<form action="{{route('manager.ratings.store')}}" method="POST">
@csrf
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
<div class="offcanvas-header border-bottom">
<h5 class="offcanvas-title" id="offcanvasExampleLabel">@lang('messages.Rating & Reviews')</h5>
<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-0 overflow-hidden">
<div data-simplebar style="">
<div class="acitivity-timeline p-4">
<div class="col-xxl-9 col-md-6">

<label for="exampleFormControlTextarea5" class="form-label text-muted">@lang('messages.Rating')</label>
<div class="rating">

<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
</div>


<div class="col-xxl-12 col-md-6" style="display:none;">
<br>
<div>
<label for="exampleFormControlTextarea5" class="form-label">vehicule_id</label>
<input type="text" name="vehicule_id" value="{{$vehicule->id}}"/>
</div>

<div>
<label for="exampleFormControlTextarea5" class="form-label">users_id</label>
<input type="text" name="users_id" value="{{(Auth::user()->id)}}"/>
</div>

</div>

<div class="col-xxl-12 col-md-6">
<br>
<div>
<label for="exampleFormControlTextarea5" class="form-label text-muted"  >@lang('messages.Reviews')</label>
<textarea class="form-control" name="review" id="exampleFormControlTextarea5" placeholder="@lang('messages.Share details of your own experience at this place')" rows="3" required></textarea >
</div>
</div>
<br>

<button type="submit" class="btn btn-soft-dark waves-effect waves-light">@lang('messages.Submit')
</button>
</div>
</div>
</div>

</div>
</form>
</div>
<div class="row mt-4">
<div class="col-lg-3 col-sm-6">

<div class="p-2 border border-dashed rounded">
<div class="d-flex align-items-center">
<div class="avatar-sm me-2">
<div class="avatar-title rounded bg-transparent text-success fs-24">
<i class="ri-money-dollar-circle-fill"></i>
</div>
</div>
<div class="flex-grow-1">
<p class="text-muted mb-1">@lang('messages.Price') :</p>
<h5 class="mb-0">$ {{$vehicule->price}}</h5>
</div>
</div>
</div>
</div>
<!-- end col -->
@php
$orders=App\Models\Reservation::where('vehicule_id',$vehicule->id)->count();
@endphp
<div class="col-lg-3 col-sm-6">
<div class="p-2 border border-dashed rounded">
<div class="d-flex align-items-center">

<div class="flex-grow-1">
<p class="text-muted mb-1">@lang('messages.No of Orders') :</p>
<h5 class="mb-0">

{{$orders ?? '0'}}

</h5>
</div>
</div>
</div>
</div>
<!-- end col -->
@php
$revenue=App\Models\Payment::where('vehicule_id',$vehicule->id)->sum('amount');
@endphp
<div class="col-lg-4 col-sm-6">
<div class="p-2 border border-dashed rounded">
<div class="d-flex align-items-center">
<div class="avatar-sm me-2">
<div class="avatar-title rounded bg-transparent text-success fs-24">
<i class="ri-stack-fill"></i>
</div>
</div>
<div class="flex-grow-1">
<p class="text-muted mb-1">@lang('messages.Total Revenue') :</p>
<h5 class="mb-0">
$ {{$revenue ?? '0'}}
</h5>
</div>
</div>
</div>
</div>

<!-- end col -->
</div>

<div class="row">
<div class="col-xl-6">
<div class=" mt-4">
<h5 class="fs-15">@lang('messages.VIN') :</h5>
<div class="d-flex flex-wrap gap-2">

<p class="text-success">{{$vehicule->vin}}</p>

</div>
</div>
</div>

<div class="col-xl-6">
<div class=" mt-4">
<h5 class="fs-15">@lang('messages.License Plate') :</h5>
<div class="d-flex flex-wrap gap-2">

<p class="text-success">{{$vehicule->LicensePlate}}</p>

</div>
</div>
</div>
<!-- end col -->

<div class="col-xl-6">
<div class=" mt-4">
<h5 class="fs-15">@lang('messages.Colors') :</h5>
@if ($vehicule->color == 'black')
<div class="d-flex flex-wrap gap-2">
<div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" >
<button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-black" disabled>
<i class="ri-checkbox-blank-circle-fill"></i>
</button>
</div>
</div>
@endif

@if ($vehicule->color == 'white')
<div class="d-flex flex-wrap gap-2">
<div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" >
<button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-light" disabled>
<i class="ri-checkbox-blank-circle-fill"></i>
</button>
</div>
</div>
@endif

@if ($vehicule->color == 'blue')
<div class="d-flex flex-wrap gap-2">
<div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" >
<button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-info" disabled>
<i class="ri-checkbox-blank-circle-fill"></i>
</button>
</div>
</div>
@endif

@if ($vehicule->color == 'green')
<div class="d-flex flex-wrap gap-2">
<div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" >
<button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-success" disabled>
<i class="ri-checkbox-blank-circle-fill"></i>
</button>
</div>
</div>
@endif

@if ($vehicule->color == 'red' ||$vehicule->color == 'yellow' ||$vehicule->color == 'orange')
<div class="d-flex flex-wrap gap-2">
<div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" >
<button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-danger" disabled>
<i class="ri-checkbox-blank-circle-fill"></i>
</button>
</div>
</div>
@endif
</div>
</div>
<!-- end col -->
</div>


<!-- end row -->

<div class="mt-4 text-muted">
<h5 class="fs-15">@lang('messages.Description') :</h5>
<p>{{$vehicule->description}}</p>
</div>

<div class="product-content mt-5">
<h5 class="fs-15 mb-3">@lang('messages.Vehicle Description') :</h5>
<nav>
<ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">@lang('messages.Specification')</a>
</li>
<li class="nav-item">
<a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">@lang('messages.Details')</a>
</li>
</ul>
</nav>

<div class="tab-content border border-top-0 p-4" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
<div class="table-responsive">
<table class="table mb-0">
<tbody>
<tr>
<th scope="row" style="width: 200px;">
Make
</th>
<td class="text-info">{{$vehicule->category->brand}}</td>

</tr>
<tr>
<th scope="row">@lang('messages.Production Year')</th>
<td>{{$vehicule->productionYear }}</td>
</tr>

<tr>
<th scope="row">@lang('messages.Transmission')</th>
<td>{{$vehicule->transmission}}</td>
</tr>
<tr>

<th scope="row">@lang('messages.Mileage')</th>
<td>{{$vehicule->km}}</td>
</tr>


</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
<div>
<h5 class="mb-3">{{ $vehicule->carName }}</h5>
<p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> @lang('messages.Seats'):     {{ $vehicule->seating }}   </p>
<p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> @lang('messages.Fuel Type'): {{ $vehicule->fuelType }}</p>
<p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> @lang('messages.Engine'): {{ $vehicule->engine }}</p>
<p class="mb-0"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> @lang('messages.Airbags'): {{ $vehicule->airbags }}</p>
</div>
</div>
</div>
</div>



<div class="mt-5">
<div>
<h5 class="fs-15 mb-3">@lang('messages.Ratings') &amp; @lang('messages.Reviews')</h5>
</div>


<div class="row gy-4 gx-0">
<div class="col-lg-4">
<div>
<div class="pb-3">
<div class="bg-light px-3 py-2 rounded-2 mb-2">
<div class="d-flex align-items-center">
<div class="flex-grow-1">
<div class="fs-16 align-middle text-warning">
@for ($i = 0; $i < floor($rate); $i++)
<i class="ri-star-fill text-danger"></i>
@endfor

@if ($rating - floor($rate) >= 0.5)
<i class="ri-star-half-fill text-danger"></i>
@endif

@for ($i = ceil($rate); $i < 5; $i++)
<i class="ri-star-fill text-dark"></i>
@endfor
</div>
</div>
<div class="flex-shrink-0">
<h6 class="mb-0">{{$rate}} @lang('messages.out of') 5</h6>
</div>
</div>
</div>
<div class="text-center">
<div class="text-muted">@lang('messages.Total') <span class="fw-medium">{{$rating}}</span> @lang('messages.reviews')
</div>
</div>
</div>

<div class="mt-3">
<div class="row align-items-center g-2">
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0">5 @lang('messages.star')</h6>
</div>
</div>
<div class="col">
<div class="p-2">
<div class="progress animated-progress progress-sm">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php 
if($rating!=0){ echo ($fiveStars/$rating)*100;} 
else{echo $rating=0;} ?>%;" 
aria-valuenow="{{$fiveStars}}" aria-valuemin="0" aria-valuemax="{{$rating}}"></div>
</div>
</div>
</div>
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0 text-muted">{{$fiveStars}}</h6>
</div>
</div>
</div>
<!-- end row -->

<div class="row align-items-center g-2">
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0">4 @lang('messages.star')</h6>
</div>
</div>
<div class="col">
<div class="p-2">
<div class="progress animated-progress progress-sm">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php if($rating!=0){ echo ($fourStars/$rating)*100;}else{$rating=0;} ?>%;" aria-valuenow="{{$fourStars}}" aria-valuemin="0" aria-valuemax="{{$rating}}"></div>
</div>
</div>
</div>
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0 text-muted">{{$fourStars}}</h6>
</div>
</div>
</div>
<!-- end row -->

<div class="row align-items-center g-2">
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0">3 @lang('messages.star')</h6>
</div>
</div>
<div class="col">
<div class="p-2">
<div class="progress animated-progress progress-sm">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php if($rating!=0){  echo ($threeStars/$rating)*100;}else{$rating=0;} ?>%;" aria-valuenow="{{$threeStars}}" aria-valuemin="0" aria-valuemax="{{$rating}}"></div>
</div>
</div>
</div>
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0 text-muted">{{$threeStars}}</h6>
</div>
</div>
</div>
<!-- end row -->

<div class="row align-items-center g-2">
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0">2 @lang('messages.star')</h6>
</div>
</div>
<div class="col">
<div class="p-2">
<div class="progress animated-progress progress-sm">
<div class="progress-bar bg-warning" role="progressbar" style="width:<?php if($rating!=0){ echo ($twoStars/$rating)*100;}else{$rating=0;} ?>%;" aria-valuenow="{{$threeStars}}" aria-valuemin="0" aria-valuemax="{{$rating}}"></div>
</div>
</div>
</div>

<div class="col-auto">
<div class="p-2">
<h6 class="mb-0 text-muted">{{$twoStars}}</h6>
</div>
</div>
</div>
<!-- end row -->

<div class="row align-items-center g-2">
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0">1 @lang('messages.star')</h6>
</div>
</div>
<div class="col">
<div class="p-2">
<div class="progress animated-progress progress-sm">
<div class="progress-bar bg-danger" role="progressbar" style="width:<?php if($rating!=0){ echo ($oneStars/$rating)*100;}else{$rating=0;} ?>%;"></div>
</div>
</div>
</div>
<div class="col-auto">
<div class="p-2">
<h6 class="mb-0 text-muted">{{$oneStars}}</h6>
</div>
</div>
</div>
<!-- end row -->
</div>
</div>
</div>
<!-- end col -->
@php
$reviews=App\Models\Rating::where('vehicule_id','=',$vehicule->id)->get();
@endphp

<div class="col-lg-8">
<div class="ps-lg-4">
<div class="d-flex flex-wrap align-items-start gap-3">
<h5 class="fs-15">@lang('messages.Reviews'): </h5>
</div>

<div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">

<ul class="list-unstyled mb-0">
@foreach($reviews as $review)
<li class="py-2">
<div class="border border-dashed rounded p-3">
<div class="d-flex align-items-start mb-3">
<div class="hstack gap-3">
@if($review->rating >3)
<div class="badge rounded-pill bg-success mb-0">
<i class="mdi mdi-star"></i>
{{$review->rating}}
</div>
@elseif($review->rating == 3)
<div class="badge rounded-pill bg-warning mb-0">
<i class="mdi mdi-star"></i>
{{$review->rating}}
</div>
@else
<div class="badge rounded-pill bg-danger mb-0">
<i class="mdi mdi-star"></i>
{{$review->rating}}
</div>
@endif
<div class="vr"></div>
<div class="flex-grow-1">
<p class="text-muted mb-0">
{{$review->review}}</p>
</div>
</div>
</div>

<div class="d-flex flex-grow-1 gap-2 mb-3">
<a href="#" class="d-block">

@if($review->user->ProfilePic == NULL)
<img src="{{asset('assets/images/users/noProfilePicture.png')}}"  alt="" class="avatar-sm rounded object-cover">

@else
<img src="{{Storage::url($review->user->ProfilePic) }}" alt="" class="avatar-sm rounded object-cover">
@endif
</a>
</div>

<div class="d-flex align-items-end">
<div class="flex-grow-1">
<h5 class="fs-15 mb-0">{{$review->user->name}}
</h5>
</div>

<div class="flex-shrink-0">
<p class="text-muted fs-13 mb-0">
{{$review->created_at}}</p>
</div>
</div>
</div>
</li>
@endforeach

</ul>
</div>
</div>
</div>
<!-- end col -->
</div>
<!-- end Ratings & Reviews -->
</div>

<!-- end card body -->
</div>
</div>
<!-- end col -->
</div>
<!-- end row -->
</div>
<!-- end card body -->
</div>
<!-- end card -->
</div>
<!-- end col -->
</div>
<!-- end row -->

</div>
<!-- container-fluid -->
</div>

@endsection

