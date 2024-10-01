@extends('CustomerHome')
@section('content')
<div class="row">
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="">
                                    
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

                                    <th data-ordering="false" class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43.6px;" aria-label="SR No.: activate to sort column descending" aria-sort="ascending">@lang('messages.Payment No.')</th>

                                    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="user: activate to sort column ascending">@lang('messages.User')</th>

                                    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="vehicule: activate to sort column ascending">@lang('messages.Vehicule')</th>

                                    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 33.6px;" aria-label="ID: activate to sort column ascending">@lang('messages.Total Amount')</th>

                                    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 87.6px;" aria-label="Purchase ID: activate to sort column ascending">@lang('messages.Payment Method')</th>

                                    

                                    <th data-ordering="false" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 254.6px;" aria-label="Title: activate to sort column ascending">@lang('messages.Payment Date')</th>

                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 42.6px; display: none;" aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $pay)
                                @if((Auth::user()->id) == $pay->user_id)
                                    <tr class="odd">
                                    <th scope="row" class="dtr-control" tabindex="0">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>
                                    <td class="sorting_1">{{$pay->id}}</td>
                                    <td>{{$pay->user->name ?? 'Null'}}</td>
                                    <td>{{$pay->vehicule->id ?? 'Null'}}</td>
                                    <td>{{$pay->amount}}</td>
                                    <td>{{$pay->method}}</td>
                                    <td>$ {{$pay->created_at}} </td>
                                    
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                
                                        

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