@extends('AdminHome')
@section('content')




<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.Discount Datatable')</h4>


</div>
</div>
</div>
<!-- end page title -->







<!-- table -->







<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header" style="">
<span style="font-size: 24px;font-weight: bold;color: #5ea3cb;"></span>
<button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="float:right;"><i class="ri-add-line align-bottom me-1"></i> @lang('messages.Create Discount')</button>
</div>

<div class="card-body">
<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
<div class="row"><div class="col-sm-12">
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
<thead>
<tr><th scope="col" style="width: 16.8px;" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="



: activate to sort column descending">
<div class="form-check">

</div>
</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="SR No.: activate to sort column ascending">Code</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">Type</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="SR No.: activate to sort column ascending">Status</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">@lang('messages.Vehicle')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">@lang('messages.Deadline')</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">% @lang('messages.Discount Amount') %</th>

<th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">@lang('messages.Created At')</th>



<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 71.6px; display: none;" aria-label="Created By: activate to sort column ascending">Action</th>

</tr>
</thead>
<tbody>













@foreach($discounts as $dis)    
<tr class="odd">
<th scope="row" class="dtr-control sorting_1" tabindex="0">
<div class="form-check">

</div>
</th>
<input type="hidden" class="userdelete_val_id" value="{{$dis->id}}">

<td>{{$dis->code}}</td>
<td>{{$dis->type}}</td>
<td>
@if($dis->status =='active')
<span class="badge badge-gradient-secondary">{{ucfirst($dis->status)}}</span>
@else
<span class="badge badge-gradient-danger">{{ucfirst($dis->status)}}</span>
@endif
<div class="btn-group">

<button type="button" class="btn btn-ghost-info  btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
<div class="dropdown-menu">

<a class="dropdown-item text-danger" style="font-weight: bold;" href="{{route('admin.disactivate',$dis->id)}}">@lang('messages.Disactivate')</a>

</div>
</div></td>


<td>{{$dis->vehicle->carName}}</td>
<td>{{$dis->deadline}}</td>
<td>{{$dis->discountAmount}}%</td>
<td>{{$dis->created_at}}</td>

<td style="display: none;">
<div class="dropdown d-inline-block">
<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<i class="ri-more-fill align-middle"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end">

<li>
<a class="dropdown-item edit-item-btn" href="{{route('Discounts.edit',$dis->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>@lang('messages.Edit')</a></li>
<li>
<a class="dropdown-item">

<form method="POST" action="{{route('Discounts.destroy',$dis->id)}}">
@csrf
<input name="_method" type="hidden" value="DELETE">

<button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')</button>
</form></a>



</li>


</li>
</ul>

<!--end modal -->

</div>
</td>
</tr>@endforeach
</tbody>
</table>
</div>
</div>
</div>







<!-- ************* Creation model ************** -->

<div class="modal fade" id="showModal" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header bg-light p-3">
<h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"
aria-label="Close" id="close-modal"></button>
</div>
<form  action="{{route('Discounts.store')}}" method="POST" class="tablelist-form" enctype="multipart/form-data"  autocomplete="off">
@csrf
<div class="modal-body">
<div class="row gy-4 mb-3">
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">Code</label>
<input type="text" name="code" class="form-control" placeholder="Enter Code" required />
</div>
</div>
<div class="col-md-6" style="display: none;">
<div>
<label for="amount-field" class="form-label">Type</label>
<input type="text" name="type" class="form-control" value="Promotional discounts"  />
</div>
</div>
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">% @lang('messages.Discount Amount') %</label>
<input type="number" name="discountAmount" class="form-control" placeholder="Enter Discount Amount" required />
</div>
</div>
<div class="col-md-6" style="display:none;">

<div>
<label for="amount-field" class="form-label">Status</label>
<input type="text" name="status" class="form-control" value="active"  />
</div>
</div>

<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Deadline')</label>
<input type="date" name="deadline" class="form-control" value="" required />
</div>
</div>
@php
$vehicles= App\Models\Vehicule::all();
@endphp
<div class="col-md-6">
<div>
<label for="amount-field" class="form-label">@lang('messages.Vehicle')</label>
<select class="form-select" id="choices-category-input" name="vehicle_id" data-choices data-choices-search-false>
<option>--- @lang('messages.Choose') ---</option>
@foreach ($vehicles as $car)
<option value="{{$car->id}}">{{$car->carName}}</option>
@endforeach
</select>
</div>
</div>
</div>


</div>
<div class="modal-footer">
<div class="hstack gap-2 justify-content-end">
<button type="button" class="btn btn-soft-danger btn-border" data-bs-dismiss="modal">@lang('messages.Close')</button>
<button type="submit" class="btn btn-soft-dark btn-border" id="add-btn">@lang('messages.Add Discount')</button>
<!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
</div>
</div>
</form>
</div>
</div>
</div>



<!-- ************* Edit model ************** -->


</div>
</div>
</div>
</div>



</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-sm-6">
<script>document.write(new Date().getFullYear())</script>2023 © Velzon.
</div>
<div class="col-sm-6">
<div class="text-sm-end d-none d-sm-block">
Design &amp; Develop by Themesbrand
</div>
</div>
</div>
</div>
</footer>



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


</html>
@endsection