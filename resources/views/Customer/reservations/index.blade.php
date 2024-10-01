@extends('CustomerHome')
@section('content')
<div class="row">
<div class="page-content">
<div class="container-fluid">
<div class="col-lg-12">
<div class="card">
<div class="card-header" style="">
<span style="font-size: 24px;font-weight: bold;color: #5ea3cb;">@lang('messages.Renting Datatable')</span>
<button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="float:right;"><a href="{{route('vehicules.index')}}"style="text-decoration: none;color: inherit;"><i class="ri-add-line align-bottom me-1"></i>@lang('messages.Create Reservation')</a></button>
</div>
<div class="card-body">
<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
<div class="row">
<div class="col-sm-12">
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
<thead>
<tr>
<th scope="col" style="width: 16.8px;" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="



: activate to sort column ascending">
<div class="form-check">
<input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
</div>
</th>

<th data-ordering="false" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="SR No.: activate to sort column descending" aria-sort="ascending">@lang('messages.Reservation No.')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="user: activate to sort column ascending">@lang('messages.User')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="vehicule: activate to sort column ascending">@lang('messages.Vehicle')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">@lang('messages.Borrow')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 87.6px;" aria-label="Purchase ID: activate to sort column ascending">@lang('messages.Return')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.6px;" aria-label="Title: activate to sort column ascending">@lang('messages.Price')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 69.6px;" aria-label="User: activate to sort column ascending">@lang('messages.Fine Per Day')</th>

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 78.6px;" aria-label="Assigned To: activate to sort column ascending">@lang('messages.Returned')</th>

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 71.6px; display: none;" aria-label="Created By: activate to sort column ascending">@lang('messages.Penalty')</th>

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 77.6px; display: none;" aria-label="Created By: activate to sort column ascending">@lang('messages.Created By')</th>



<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 46.6px; display: none;" aria-label="Status: activate to sort column ascending">Status</th>

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 46.6px; display: none;" aria-label="Status: activate to sort column ascending">@lang('messages.Payment Status')</th>

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 42.6px; display: none;" aria-label="Action: activate to sort column ascending">Action</th>
</tr>
</thead>
<tbody>
@foreach($reservations as $res)
@if(auth()->user()->id == $res->user_id)
<tr class="odd">
<th scope="row" class="dtr-control" tabindex="0">
<div class="form-check">
<input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
</div>
</th>
<td class="sorting_1">{{$res->id}}</td>
<td>{{$res->user->name ?? 'Null'}}</td>
<td>{{$res->vehicule->carName ?? 'Null'}}</td>
<td>{{$res->borrow}}</td>
<td>{{$res->return}}</td>
<td>$ {{$res->price}} </td>
<td>$ {{$res->fine}} </td>
<td>{{$res->returned}}</td>
<td>$ {{$res->penalty}} </td>
<td>{{$res->added_by->name ?? 'Null'}}</td>

<td>@if($res->status =='Confirmed')
<span class="badge bg-info">
{{$res->status}}
</span>
@elseif( $res->status == 'Pending')
<span class="badge bg-warning">
{{$res->status}}
</span>
@elseif( $res->status == 'On Rent')
<span class="badge bg-secondary">
{{$res->status}}
</span>
@elseif( $res->status == 'Cancelled')
<span class="badge bg-danger">
{{$res->status}}
</span>
@elseif( $res->status == 'Completed')
<span class="badge bg-success">
{{$res->status}}
</span>
@endif
</td>

<td>
@if($res->Paiementstatus =='Paid')
<span class="badge bg-success">
{{$res->Paiementstatus}}
</span>
@elseif( $res->Paiementstatus == 'Unpaid')
<span class="badge bg-danger">
{{$res->Paiementstatus}}
</span>
@endif
</td>

<td>
<div class="dropdown d-inline-block">
<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<i class="ri-more-fill align-middle"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end">
<li><a href="{{route('reservations.show',$res->id)}}" class="dropdown-item"><i class="ri-printer-line align-bottom me-2 text-muted"></i> @lang('messages.Print')</a></li>
<li>
<a class="dropdown-item edit-item-btn" href="{{route('reservations.edit',$res->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> @lang('messages.Edit')</a></li>
<li>


</li>
</ul>
</div>
</td>
</tr>
@endif
@endforeach
</tbody>
</table></div></div></div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script type="text/javascript">
$('.show-alert-delete-box').click(function(event){
var form =  $(this).closest("form");
var name = $(this).data("name");

event.preventDefault();
swal({
title: "Are you sure you want to delete this record?",
text: "If you delete this, it will be gone forever.",
icon: "warning",
type: "warning",
buttons: ["Cancel","Yes delete it !"],
confirmButtonColor: '#3085d6',
cancelButtonColor: '#dd3333',
confirmButtonText: 'Yes, delete it!'
}).then((willDelete) => {
if (willDelete) {
form.submit();
}
});
});
</script>
@endsection