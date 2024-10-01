@extends('AdminHome') @section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">@lang('messages.Good Morning'), <span class="text-secondary">{{Auth::user()->name}}</span></h4>
                                    <p class="text-primary mb-0">@lang('messages.Here s what s happening with your store today.')</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="javascript:void(0);">
                                        <div class="row g-3 mb-0 align-items-center">
                                            <!--end col-->
                                            <div class="col-auto">
                                                <a href="{{route('Vehicules.create')}}">
                                                    <button type="button" class="btn btn-success"><i class="ri-add-circle-line align-middle me-1"></i> @lang('messages.Add Vehicle')</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                            <!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    @php 

                    $currentyear = Carbon\Carbon::now()->year;
                    
                    $cvt=App\Models\Vehicule::where('transmission','=','CVT')->count(); 
                    
                    $paymentsJanuary = DB::table('payments')->whereMonth('created_at', '01')->whereYear('created_at',$currentyear)->sum('amount');
                    
                    $paymentsFebruary =DB::table('payments')->whereMonth('created_at', '02')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsMarch = DB::table('payments')->whereMonth('created_at',
                    '03')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsApril = DB::table('payments')->whereMonth('created_at', '04')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsMay =DB::table('payments')->whereMonth('created_at', '05')->whereYear('created_at',$currentyear)->sum('amount'); 

                    $paymentsJune = DB::table('payments')->whereMonth('created_at',
                    '06')->whereYear('created_at',$currentyear)->sum('amount');
                    
                    $paymentsJuly = DB::table('payments')->whereMonth('created_at', '07')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsAugust =DB::table('payments')->whereMonth('created_at', '08')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsSeptember= DB::table('payments')->whereMonth('created_at',
                    '09')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsOctober = DB::table('payments')->whereMonth('created_at', '10')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsNovember =DB::table('payments')->whereMonth('created_at', '11')->whereYear('created_at',$currentyear)->sum('amount'); 
                    
                    $paymentsDecember = DB::table('payments')->whereMonth('created_at',
                    '12')->whereYear('created_at',$currentyear)->sum('amount');

                    $manual = App\Models\Vehicule::where('transmission','=','Manual')->count();

                    $automatic = App\Models\Vehicule::where('transmission','=','Automatic')->count();

                    $cvt = App\Models\Vehicule::where('transmission','=','CVT')->count();

                    $suv=App\Models\Vehicule::where('shape','=','SUV')->count();
                    $minivan=App\Models\Vehicule::where('shape','=','Minivan')->count();
                    $sedan=App\Models\Vehicule::where('shape','=','Sedan')->count();
                    $sportsCar=App\Models\Vehicule::where('shape','=','Sports Car')->count();
                    $coupe=App\Models\Vehicule::where('shape','=','Coupe')->count();
                    $convertible=App\Models\Vehicule::where('shape','=','Convertible')->count();

                    //
                    /*   -------------  RESERVATIONS COMPLETED ------------------- */
                    $ReservationsJanuary = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','01')->count();
                    $ReservationsFev = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','02')->count();
                    $ReservationsMar = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','03')->count();
                    $ReservationsApr = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','04')->count();
                    $ReservationsMay = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','05')->count();
                    $ReservationsJuin = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','06')->count();
                    $ReservationsJul = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','07')->count();
                    $ReservationsAug = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','08')->count();
                    $ReservationsSep = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','09')->count();
                    $ReservationsOct = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','10')->count();
                    $ReservationsNov = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','11')->count();
                    $ReservationsDec = DB::table('reservations')->where('status','LIKE','Completed')->whereMonth('returned','12')->count();

                    $ReservationsJanuaryC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','01')->count();
                    $ReservationsFevC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','02')->count();
                    $ReservationsMarC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','03')->count();
                    $ReservationsAprC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','04')->count();
                    $ReservationsMayC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','05')->count();
                    $ReservationsJuinC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','06')->count();
                    $ReservationsJulC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','07')->count();
                    $ReservationsAugC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','08')->count();
                    $ReservationsSepC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','09')->count();
                    $ReservationsOctC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','10')->count();
                    $ReservationsNovC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','11')->count();
                    $ReservationsDecC = DB::table('reservations')->where('status','LIKE','Cancelled')->whereMonth('returned','12')->count();
                   // dd($ReservationsJanuary);
                    @endphp

                    <!--end row-->
                    @php $earnings= App\Models\Payment::sum('amount'); $orders= App\Models\Reservation::count(); $users= App\Models\User::where('type','=','customer')->count(); $vehicles= App\Models\Vehicule::count(); @endphp

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-success text-truncate mb-0">
                                                @lang('messages.Total Earnings')
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-checkbox-blank-circle-fill fs-13 align-middle"></i>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">DA {{$earnings}}</h4>
                                            <a href="{{route('Payments.index')}}" class="text-decoration-underline text-success">@lang('messages.View Earnings')</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-success rounded fs-3">
                                                <i class="bx bx-dollar-circle text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-info text-truncate mb-0">
                                               Reservaations
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-info fs-14 mb-0">
                                                <i class="ri-checkbox-blank-circle-fill fs-13 align-middle"></i>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{$orders}}</span></h4>
                                            <a href="{{route('Reservations.index')}}" class="text-decoration-underline text-info">@lang('messages.View all orders')</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded fs-3">
                                                <i class="bx bx-shopping-bag text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-danger text-truncate mb-0">
                                                @lang('messages.Customers')
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-danger fs-14 mb-0">
                                                <i class="ri-checkbox-blank-circle-fill fs-13 align-middle"></i>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{$users}}</span></h4>
                                            <a href="{{route('Users.index')}}" class="text-decoration-underline text-danger">@lang('messages.See details')</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                                <i class="bx bx-user-circle text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                @lang('messages.Vehicles')
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-muted fs-14 mb-0">
                                                <i class="ri-checkbox-blank-circle-fill fs-13 align-middle"></i>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{$vehicles}}</h4>
                                            <a href="{{route('Vehicules.index')}}" class="text-decoration-underline text-muted">@lang('messages.View Vehicles')</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                                <i class="ri-roadster-fill text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row-->
                    <div class="row">
  <div class="col-xl-6">
    <div style="background-color: white;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);">
      <canvas id="BarChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('BarChart');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [
            {
              label: '# Reservations Cancelled',
              data: [{{$ReservationsJanuaryC}}, {{$ReservationsFevC}}, {{$ReservationsMarC}}, {{$ReservationsAprC}}, {{$ReservationsMayC}}, {{$ReservationsJuinC}}, {{$ReservationsJulC}}, {{$ReservationsAugC}}, {{$ReservationsSepC}}, {{$ReservationsOctC}}, {{$ReservationsNovC}}, {{$ReservationsDecC}}],
              borderWidth: 1
            },
            {
              label: '# Reservations Completed',
              data: [{{$ReservationsJanuary}}, {{$ReservationsFev}}, {{$ReservationsMar}}, {{$ReservationsApr}}, {{$ReservationsMay}}, {{$ReservationsJuin}}, {{$ReservationsJul}}, {{$ReservationsAug}}, {{$ReservationsSep}}, {{$ReservationsOct}}, {{$ReservationsNov}}, {{$ReservationsDec}}],
              borderWidth: 1
            }
          ]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
  </div>

  <div class="col-xl-6">
    <canvas id="myChart" style="background-color: white;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);"></canvas>

    <script>
      const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      const xValues = months;
      const yValues = [{{$paymentsJanuary}},{{$paymentsFebruary}},{{$paymentsMarch}},{{$paymentsApril}}, {{$paymentsMay}},{{$paymentsJune}},{{$paymentsJuly}},{{$paymentsAugust}},{{$paymentsSeptember}},{{$paymentsOctober}},{{$paymentsNovember}},{{$paymentsDecember}}];

      new Chart("myChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            fill: true,
            backgroundColor: "rgba(54, 162, 235, 0.2)",
            borderColor: "rgba(54, 162, 235, 1)",
            borderWidth: 2,
            pointBackgroundColor: "rgba(54, 162, 235, 1)",
            pointRadius: 4,
            pointHoverRadius: 8,
            data: yValues
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: { display: false },
          scales: {
            yAxes: [{
              ticks: {
                min: 6,
                max: 17,
                stepSize: 2,
                fontColor: "rgba(0, 0, 0, 0.7)"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0.1)"
              }
            }],
            xAxes: [{
              ticks: {
                fontSize: 12,
                fontColor: "rgba(0, 0, 0, 0.7)"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0.1)"
              }
            }]
          }
        }
      });
    </script>
                    </div>
                    </div>
                    <div class="spacer" style="height: 30px;"></div>

                    <div class="row" style="background-color: white;">
                        <div class="col-xl-6">
                          <div style="max-width: 300px; background-color: white; margin: 0 auto;">
                            <canvas id="PieChart" style="max-width: 100%; background-color: white;"></canvas>
                          </div>

                          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                          <script>
                            const ctx2 = document.getElementById('PieChart');

                            new Chart(ctx2, {
                              type: 'pie',
                              data: {
                                labels: ['#Automatic Cars', '#Manual Cars'],
                                datasets: [{
                                  label: '# of Votes',
                                  data: [{{ $automatic }},{{ $manual }}],
                                  backgroundColor: ['DarkTurquoise','YellowGreen'],
                                  borderWidth: 1
                                }]
                              },
                              options: {
                                scales: {
                                  y: {
                                    beginAtZero: true
                                  }
                                }
                              }
                            });
                          </script>
                        </div>
                        <div class="col-xl-6">
                            <div style="max-width: 300px; background-color: white; margin: 0 auto;">
                                <canvas id="DonutChart" style="max-width: 100%; background-color: white;"></canvas>
                              </div>

                              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                              <script>
                                const ctx3 = document.getElementById('DonutChart');

                                new Chart(ctx3, {
                                  type: 'doughnut',
                                  data: {
                                    labels: ['Coupe', 'Sedan', 'Sport Car', 'Suv', 'Mini van', 'Convertible'],
                                    datasets: [{
                                      label: '# of Votes',
                                      data: [{{ $coupe }}, {{ $sedan }},{{ $sportsCar }},{{ $suv }},{{ $minivan }},{{ $convertible }}],
                                      borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      y: {
                                        beginAtZero: true
                                      }
                                    }
                                  }
                                });
                              </script>

                                      Copied!

                        </div>


                      </div>
                      <div class="spacer" style="height: 30px;"></div>
                                     @php $customers= App\Models\User::orderBy('created_at', 'desc')->get(); $reservations= App\Models\Reservation::orderBy('created_at', 'desc')->get(); @endphp

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title text-success mb-0">@lang('messages.Manage New Customer Accounts')</h5>
                                            </div>
                                            <div class="card-body">
                                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 10px;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option" />
                                                                </div>
                                                            </th>
                                                            <th>@lang('messages.Name')</th>

                                                            <th>Email</th>

                                                            <th>Status</th>
                                                            <th>@lang('messages.Address')</th>

                                                            <th>@lang('messages.Gender')</th>

                                                            <th>@lang('messages.Date Of Birth')</th>

                                                            <th>@lang('messages.Phone')</th>

                                                            <th>@lang('messages.Created At')</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($customers as $usr) @if($usr->type=="customer" && $usr->status=="Pending")
                                                        <tr class="odd">
                                                            <th scope="row" class="dtr-control sorting_1" tabindex="0">
                                                                <div class="form-check"></div>
                                                            </th>
                                                            <input type="hidden" class="userdelete_val_id" value="{{$usr->id}}" />
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-2">
                                                                        @if($usr->ProfilePic == NULL)
                                                                        <img class="rounded-circle" src="{{asset('assets/images/users/noProfilePicture.png')}}" height="45" width="45" alt="" />
                                                                        @else
                                                                        <img class="rounded-circle" src="{{ Storage::url($usr->ProfilePic) }}" height="45" width="45" alt="" />

                                                                        @endif
                                                                    </div>
                                                                    <div class="flex-grow-1">{{$usr->name}}</div>
                                                                </div>
                                                            </td>
                                                            <td>{{$usr->email}}</td>
                                                            <td style="display: none;">
                                                                <span class="badge badge-label bg-warning"><i class="mdi mdi-circle-medium"></i> {{$usr->status}}</span>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-ghost-info btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item text-success" style="font-weight: bold;" href="{{route('admin.confirmed',$usr->id)}}">@lang('messages.Confirmed')</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger" style="font-weight: bold;" href="{{route('admin.blocked',$usr->id)}}">@lang('messages.Blocked')</a>
                                                                    </div>
                                                                </div>
                                                                <!-- /btn-group -->
                                                            </td>
                                                            <td>{{$usr->address}}</td>

                                                            <td>{{$usr->gender}}</td>
                                                            <td>{{$usr->birthDate}}</td>
                                                            <td>{{$usr->phone}}</td>

                                                            <td>{{$usr->created_at}}</td>
                                                            <td style="display: none;">
                                                                <div class="dropdown d-inline-block">
                                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill align-middle"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                            <a href="{{route('Users.show',$usr->id)}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>@lang('messages.View')</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item edit-item-btn" href="{{route('Users.edit',$usr->id)}}">
                                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> @lang('messages.Edit')
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item">
                                                                                <form method="POST" action="{{route('Users.destroy',$usr->id)}}">
                                                                                    @csrf
                                                                                    <input name="_method" type="hidden" value="DELETE" />

                                                                                    <button type="submit" class="show-alert-delete-box" style="background-color: inherit; border: none;" data-toggle="tooltip" title="">
                                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')
                                                                                    </button>
                                                                                </form>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card card-height-100">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title text-danger mb-0">@lang('messages.Manage New Customer bookings')</h5>
                                            </div>
                                            <div class="card-body">
                                                <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 10px;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option" />
                                                                </div>
                                                            </th>
                                                            <th>@lang('messages.No.Reservation')</th>
                                                            <th>@lang('messages.User')</th>
                                                            <th>@lang('messages.Vehicle')</th>
                                                            <th>Status</th>
                                                            <th>@lang('messages.Borrow')</th>
                                                            <th>@lang('messages.Return')</th>
                                                            <th>@lang('messages.Price')</th>
                                                            <th>@lang('messages.Fine Per Day')</th>
                                                            <th>@lang('messages.Returned')</th>
                                                            <th>@lang('messages.Penalty')</th>
                                                            <th>@lang('messages.Created By')</th>
                                                            <th>@lang('messages.Payment Status')</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($reservations as $res) @if($res->status=='Pending')
                                                        <tr class="odd">
                                                            <th scope="row" class="dtr-control" tabindex="0">
                                                                <div class="form-check">
                                                                    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1" />
                                                                </div>
                                                            </th>
                                                            <td class="sorting_1">{{$res->id}}</td>
                                                            <td>{{$res->user->name ?? 'Null'}}</td>
                                                            <td>{{$res->vehicule->carName ?? 'Null'}}</td>
                                                            <td>
                                                                <span class="badge badge-label bg-danger">
                                                                    <i class="mdi mdi-circle-medium"></i>

                                                                    {{$res->status}}
                                                                </span>
                                                                <button type="button" class="btn btn-ghost-info btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item text-warning" style="font-weight: bold;" href="{{route('admin.onRent',$res->id)}}">@lang('messages.On Rent')</a>
                                                                    <div class="dropdown-divider"></div>

                                                                    <a class="dropdown-item text-secondary" style="font-weight: bold;" href="{{route('reservation.confirmed',$res->id)}}">@lang('messages.Confirmed')</a>
                                                                    <div class="dropdown-divider"></div>

                                                                    <a class="dropdown-item text-danger" style="font-weight: bold;" href="{{route('admin.cancelled',$res->id)}}">@lang('messages.Cancelled')</a>
                                                                </div>
                                                            </td>
                                                            <td>{{$res->borrow}}</td>
                                                            <td>{{$res->return}}</td>
                                                            <td>$ {{$res->price}}</td>
                                                            <td>$ {{$res->fine}}</td>
                                                            <td>{{$res->returned}}</td>
                                                            <td>$ {{$res->penalty}}</td>
                                                            <td>{{$res->added_by->name ?? 'Null'}}</td>

                                                            <td>
                                                                <span class="badge bg-danger">
                                                                    {{$res->Paiementstatus}}
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <div class="dropdown d-inline-block">
                                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-fill align-middle"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                            <a href="{{route('Reservations.show',$res->id)}}" class="dropdown-item"><i class="ri-printer-line align-bottom me-2 text-muted"></i>@lang('messages.Print')</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item edit-item-btn" href="{{route('Reservations.edit',$res->id)}}">
                                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>@lang('messages.Edit')
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item">
                                                                                <form method="POST" action="{{route('Reservations.destroy',$res->id)}}">
                                                                                    @csrf
                                                                                    <input name="_method" type="hidden" value="DELETE" />

                                                                                    <button type="submit" class="show-alert-delete-box" style="background-color: inherit; border: none;" data-toggle="tooltip" title="">
                                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>@lang('messages.Delete')
                                                                                    </button>
                                                                                </form>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-->
                        </div>
                        <!-- .col-->
                    </div>
                    <!-- end row-->
                </div>
                <!-- end .h-100-->
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- container-fluid -->
</div>

@endsection
