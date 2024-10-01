@extends('ManagerHome')
@section('content')
<div class="row">
<div class="page-content">
<div class="container-fluid">
@php
$all=App\Models\Reservation::count();
$pending=App\Models\Reservation::where('status','=','Pending')->count();
@endphp

					<div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="orderList">
                                <div class="card-header border-0">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-sm">
                                            <h5 class="card-title mb-0">@lang('messages.Orders List')</h5>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="d-flex gap-1 flex-wrap">
                                                <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="float:right;"><a href="{{route('manager.vehicules.index')}}"style="text-decoration: none;color: inherit;"><i class="ri-add-line align-bottom me-1"></i>@lang('messages.Create Reservation')</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body pt-0">
                                    <div>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active All py-3" data-bs-toggle="tab" id="All"
                                                    href="#home1" role="tab" aria-selected="true">
                                                    <i class="ri-store-2-fill me-1 align-bottom"></i> @lang('messages.All Orders')
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered"
                                                    href="#delivered" role="tab" aria-selected="false">
                                                    <i class="ri-close-circle-line me-1 align-bottom text-danger"></i> @lang('messages.Pending')<span class="badge bg-warning align-middle ms-1">{{$pending}}</span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>

                                <div class="tab-content">
									<div class="tab-pane fade show active" id="home1" role="tabpanel">
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
											<li><a href="{{route('manager.reservations.show',$res->id)}}" class="dropdown-item"><i class="ri-printer-line align-bottom me-2 text-muted"></i> @lang('messages.Print')</a></li>
											<li>
											<a class="dropdown-item edit-item-btn" href="{{route('manager.reservations.edit',$res->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> @lang('messages.Edit')</a></li>
											<li>
											<a class="dropdown-item">

											<form method="POST" action="{{route('manager.reservations.destroy',$res->id)}}">
											@csrf
											<input name="_method" type="hidden" value="DELETE">

											<button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')</button>
											</form></a>

											</li>
											</ul>
											</div>
											</td>
											</tr>
											@endforeach
											</tbody>
											</table>
										</div>
									</div>
									</div>
									<div class="tab-pane" id="delivered" role="tabpanel">
										<div class="row">
											<div class="col-sm-12">
											<table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width: 100%;">
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
											@if($res->status=='Pending')
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
											<li><a href="{{route('manager.reservations.show',$res->id)}}" class="dropdown-item"><i class="ri-printer-line align-bottom me-2 text-muted"></i> @lang('messages.Print')</a></li>
											<li>
											<a class="dropdown-item edit-item-btn" href="{{route('manager.reservations.edit',$res->id)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> @lang('messages.Edit')</a></li>
											<li>
											<a class="dropdown-item">

											<form method="POST" action="{{route('manager.reservations.destroy',$res->id)}}">
											@csrf
											<input name="_method" type="hidden" value="DELETE">

											<button type="submit" class="show-alert-delete-box"style="background-color: inherit;border: none;" data-toggle="tooltip" title=''><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')</button>
											</form></a>

											</li>
											</ul>
											</div>
											</td>
											</tr>
											@endif
											@endforeach
											</tbody>
											</table>
										</div>
									</div>
									</div>
								</div>
                                </div>
                            </div>

                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->


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