@extends('ManagerHome')
@section('content')
<div class="row">
<div class="page-content">
<div class="container-fluid">

<div class="col-xxl-6">
<div class="card">
<div class="card-header align-items-center d-flex">
<h4 class="card-title mb-0 flex-grow-1 text-info" style="font-weight:bold;">@lang('messages.EDIT RENTING')</h4>
<div class="flex-shrink-0">
</div>
</div><!-- end card header -->
@php
$users = App\Models\User::all();
$cars = App\Models\Vehicule::all();
$discounts = App\Models\Discount::all();
@endphp
<div class="card-body">
<div class="live-preview">
<form action="{{route('manager.reservations.update',$reservation->id)}}" method="POST">
@csrf
@method('PUT')
<div class="row">
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Customer')</label>
<select id="" class="form-select" name="user_id">


@foreach ($users as $user)
@if($user->type=="customer")


<option value="{{$user->id}}" {{($user->id == $reservation->user_id) ? 'selected="selected"' : ''}}>{{$user->name}}
</option>

@endif
@endforeach
</select>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Vehicle')</label>
<select id="" class="form-select text-success "style="font-weight: bold;pointer-events: none;" name="vehicule_id">
@foreach ($cars as $car)



<option value="{{$car->id}}" {{($car->id == $reservation->vehicule_id) ? 'selected="selected"' : ''}}>{{$car->carName}}
</option>


@endforeach

</select>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="firstNameinput" class="form-label">@lang('messages.Pick up Date')</label>
<input type="date" class="form-control" name="borrow" value="{{$reservation->borrow}}">
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Drop off Date')</label>
<input type="date" class="form-control" name="return" value="{{$reservation->return}}" >
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Price')</label>
<input type="number" class="form-control" name="price" value="{{$reservation->price}}" readonly>
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Fine Per Day')</label>
<input type="number" class="form-control" name="fine" value="{{$reservation->fine}}" readonly>
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Returned')</label>
<input type="date" class="form-control"name="returned" value="{{$reservation->returned}}">
</div>
</div><!--end col-->

<div class="col-6">
<div class="mb-3">
<label class="form-label">Status</label>
<select class="form-select" name="status">

<option value="Pending" {{($reservation->status == "Pending") ? 'selected="selected"' : ''}}>@lang('messages.Pending')</option>

<option value="Confirmed" {{($reservation->status == "Confirmed") ? 'selected="selected"' : ''}}>@lang('messages.Confirmed')</option>
<option value="On Rent" {{($reservation->status == "On Rent") ? 'selected="selected"' : ''}}>@lang('messages.On Rent')</option>

<option value="Completed" {{($reservation->status == "Completed") ? 'selected="selected"' : ''}}>@lang('messages.Completed')</option>
<option value="Cancelled" {{($reservation->status == "Cancelled") ? 'selected="selected"' : ''}}>@lang('messages.Cancelled')</option>




</select>
</div>
</div>

<div class="col-6">
<div class="mb-3">
<label class="form-label">@lang('messages.Discount') - @lang('messages.Optional')</label>
<input type="text" class="form-control" name="discountCode" value="{{$reservation->discountCode}}" >
</div>
</div>
<div class="col-6"style="display: none;">
<div class="mb-3">
<label class="form-label">Created By</label>
<select class="form-select" name="created_by">
@foreach ($users as $usr)
@if($usr->id==(Auth::user()->id))
<option value="{{$usr->id}}">{{$usr->name}}</option>
@endif
@endforeach
</select>
</div>
</div>
<!--end col-->
<div class="col-lg-12">
<div class="text-end">
<button type="submit" class="btn btn-info">@lang('messages.Submit')</button>
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