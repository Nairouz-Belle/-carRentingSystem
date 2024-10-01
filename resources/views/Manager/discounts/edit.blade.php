@extends('ManagerHome')
@section('content')
<div class="row">
<div class="page-content">
<div class="container-fluid">

<div class="col-xxl-6">
<div class="card">
<div class="card-header align-items-center d-flex">
<h4 class="card-title mb-0 flex-grow-1">@lang('messages.Edit Discount')</h4>
<div class="flex-shrink-0">
</div>
</div><!-- end card header -->


<div class="card-body">
<div class="live-preview">
<form action="{{route('manager.discounts.update',$discount->id)}}" method="POST">
@csrf
@method('PUT')
<div class="row">

<div class="col-6">
<div class="mb-3">
<label for="firstNameinput" class="form-label">@lang('messages.Discount Code')</label>
<input type="text" class="form-control" name="code" value="{{$discount->code}}">
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">% @lang('messages.Discount Percentage') %</label>
<input type="text" class="form-control" name="discountAmount" value="{{$discount->discountAmount}}" >
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="firstNameinput"  class="form-label">@lang('messages.Deadline')</label>
<input type="date" class="form-control" name="deadline" value="{{$discount->deadline}}">
</div>
</div><!--end col-->
@php
$Vehicles= App\Models\Vehicule::all();
@endphp

<div class="col-6">
<div class="mb-3">
<label for="firstNameinput"  class="form-label">@lang('messages.Vehicle')</label>

<select class="form-select" id="choices-category-input" name="vehicle_id" data-choices data-choices-search-false>
@foreach ($Vehicles as $car)
<option value="{{$car->id}}" {{($car->id == $discount->vehicle_id) ? 'selected="selected"' : ''}}>{{$car->carName}}
</option>
@endforeach
</select>
</div>
<!-- end card body -->
</div>


<!--end col-->
<div class="col-lg-12">
<div class="text-end">
<button type="submit" class="btn btn-primary">@lang('messages.Submit')</button>
</div>
</div><!--end col-->
</div><!--end row-->
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
@endsection