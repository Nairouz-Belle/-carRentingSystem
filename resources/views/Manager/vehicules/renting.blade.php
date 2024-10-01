@extends('ManagerHome')
@section('content')
<div class="row">
<div class="page-content">
<div class="container-fluid">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Vehicle')</h4>



</div>
<div class="col-xxl-6">
<div class="card">
<div class="card-header align-items-center d-flex">
<h4 class="card-title mb-0 flex-grow-1">@lang('messages.RENTING')</h4>
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
<form action="{{route('manager.reservations.store')}}" method="POST">
@csrf
<div class="row">
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Customer')</label>
<select id="" class="form-select" name="user_id" required>

<option selected>@lang('messages.Choose')...</option>
@foreach ($users as $user)
@if($user->type == "customer")
<option value="{{$user->id}}">{{$user->name}}</option>
@endif
@endforeach
</select>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Vehicle')</label>
<select id="" class="form-select" name="vehicule_id" readonly>
<option value="{{$rent->id}}">{{$rent->carName}}</option>
</select>     
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="firstNameinput" class="form-label" >@lang('messages.Pick up Date')</label>
<input type="date" class="form-control" name="borrow" required>
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Drop off Date')</label>
<input type="date" class="form-control" name="return" required >
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Price')</label>
<input type="number" class="form-control" name="price"  value="{{$rent->price}}" readonly>
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Fine Per Day')</label>
<input type="number" class="form-control" name="fine" value="{{$rent->fine}}" readonly>
</div>
</div><!--end col-->
<div class="col-6"style="display: none;">
<div class="mb-3">
<label for="" class="form-label">@lang('messages.Returned')</label>
<input type="date" class="form-control"name="returned" >
</div>
</div><!--end col-->

<div class="col-6">
<div class="mb-3">
<label class="form-label">Status</label>
<input type="text" class="form-control text-success"style="font-weight: bold;"name="status" value="Confirmed" readonly>
</div>
</div><!--end col-->
<div class="col-6">
<div class="mb-3">
<label class="form-label">@lang('messages.Discount') - @lang('messages.Optional')</label>
<input type="text" class="form-control" name="discountCode" placeholder="@lang('messages.Discount Code')" >
</div>
</div>
<div class="col-6"style="display: none;">
<div class="mb-3">
<label class="form-label">@lang('messages.Created By')</label>
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