{{-- @if(count($results) > 0)
    @foreach($results as $result)
        <div>{{ $result->vehicle_name }}</div>
        <div>{{ $result->location }}</div>
        <div>{{ $result->pickup_date }}</div>
        <div>{{ $result->return_date }}</div>
        <a href="{{ route('vehicles.book', $result->id) }}">Book Now</a>
    @endforeach
@else
    <div>No vehicles found for the selected criteria.</div>
@endif --}}

{{-- *************************************** --}}

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/cars.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:15:13 GMT -->
<head>
    <title>Rentaly - Multipurpose Vehicle Car Rental Website Template</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Rentaly - Multipurpose Vehicle Car Rental Website Template" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
    <link href="css/plugins.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/coloring.css" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">

        <!-- page preloader begin -->
        <div id="de-preloader"></div>
        <!-- page preloader close -->

        <!-- header begin -->
        <!-- header begin -->
       @include('front-end.nav')
            <!-- header close -->
        <!-- content begin -->
        <div class="no-bottom no-top zebra" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section id="subheader" class="jarallax text-light">
                <img src="images/background/2.jpg" class="jarallax-img" alt="">
                    <div class="center-y relative text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
									<h1>@lang('messages.Cars')</h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- section close -->

            <section id="section-cars">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="item_filter_group">
                                <h4>@lang('messages.Vehicle Type')</h4>
                                <div class="de_form">
                                    <div class="de_checkbox">
                                        <input id="vehicle_type_1" name="vehicle_type_1" type="checkbox" value="vehicle_type_1">
                                        <label for="vehicle_type_1">@lang('messages.Car')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="vehicle_type_2" name="vehicle_type_2" type="checkbox" value="vehicle_type_2">
                                        <label for="vehicle_type_2">@lang('messages.Van')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="vehicle_type_3" name="vehicle_type_3" type="checkbox" value="vehicle_type_3">
                                        <label for="vehicle_type_3">@lang('messages.Minibus')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="vehicle_type_4" name="vehicle_type_4" type="checkbox" value="vehicle_type_4">
                                        <label for="vehicle_type_4">@lang('messages.Prestige')</label>
                                    </div>

                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>@lang('messages.Car Body Type')</h4>
                                <div class="de_form">
                                    <div class="de_checkbox">
                                        <input id="car_body_type_1" name="car_body_type_1" type="checkbox" value="car_body_type_1">
                                        <label for="car_body_type_1">@lang('messages.Convertible')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_2" name="car_body_type_2" type="checkbox" value="car_body_type_2">
                                        <label for="car_body_type_2">@lang('messages.Coupe')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_3" name="car_body_type_3" type="checkbox" value="car_body_type_3">
                                        <label for="car_body_type_3">@lang('messages.Exotic Cars')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_4" name="car_body_type_4" type="checkbox" value="car_body_type_4">
                                        <label for="car_body_type_4">@lang('messages.Hatchback')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_5" name="car_body_type_5" type="checkbox" value="car_body_type_5">
                                        <label for="car_body_type_5">@lang('messages.Minivan')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_6" name="car_body_type_6" type="checkbox" value="car_body_type_6">
                                        <label for="car_body_type_6">@lang('messages.Pickup Truck')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_7" name="car_body_type_7" type="checkbox" value="car_body_type_7">
                                        <label for="car_body_type_7">@lang('messages.Sedan')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_8" name="car_body_type_8" type="checkbox" value="car_body_type_8">
                                        <label for="car_body_type_8">@lang('messages.Sports Car')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_9" name="car_body_type_9" type="checkbox" value="car_body_type_9">
                                        <label for="car_body_type_9">@lang('messages.Station Wagon')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_body_type_10" name="car_body_type_10" type="checkbox" value="car_body_type_10">
                                        <label for="car_body_type_10">@lang('messages.SUV')</label>
                                    </div>

                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>@lang('messages.Car Seats')</h4>
                                <div class="de_form">
                                    <div class="de_checkbox">
                                        <input id="car_seat_1" name="car_seat_1" type="checkbox" value="car_seat_1">
                                        <label for="car_seat_1">2 @lang('messages.seats')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_seat_2" name="car_seat_2" type="checkbox" value="car_seat_2">
                                        <label for="car_seat_2">4 @lang('messages.seats')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_seat_3" name="car_seat_3" type="checkbox" value="car_seat_3">
                                        <label for="car_seat_3">6 @lang('messages.seats')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_seat_4" name="car_seat_4" type="checkbox" value="car_seat_4">
                                        <label for="car_seat_4">6+ @lang('messages.seats')</label>
                                    </div>

                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>@lang('messages.Car Engine Capacity (cc)')</h4>
                                <div class="de_form">
                                    <div class="de_checkbox">
                                        <input id="car_engine_1" name="car_engine_1" type="checkbox" value="car_engine_1">
                                        <label for="car_engine_1">1000 - 2000</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_engine_2" name="car_engine_2" type="checkbox" value="car_engine_2">
                                        <label for="car_engine_2">2000 - 4000</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_engine_3" name="car_engine_3" type="checkbox" value="car_engine_3">
                                        <label for="car_engine_3">4000 - 6000</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_engine_4" name="car_engine_4" type="checkbox" value="car_engine_4">
                                        <label for="car_engine_4">6000+</label>
                                    </div>

                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>@lang('messages.Price') ($)</h4>
                                  <div class="price-input">
                                    <div class="field">
                                      <span>Min</span>
                                      <input type="number" class="input-min" value="0">
                                    </div>
                                    <div class="field">
                                      <span>Max</span>
                                      <input type="number" class="input-max" value="2000">
                                    </div>
                                  </div>
                                  <div class="slider">
                                    <div class="progress"></div>
                                  </div>
                                  <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
                                    <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
                                  </div>
                            </div>
                        </div>
                        {{-- $vehicule = Vehicule::find(1);
                        $category = $vehicule->category->brand; --}}
                        <div class="col-lg-9">
                            <div class="row">
                                @if(count($vehicules) > 0)
                                @foreach ($vehicules as $vehicule)
                                <div class="col-xl-4 col-lg-6">
                                    <div class="de-item mb30">
                                        <div class="d-img">
                                            <img src="{{Storage::url($vehicule->carPic)}}" class="img-fluid" alt="">
                                        </div>

                                        <div class="d-info">
                                            <div class="d-text">
                                                <h4>{{$vehicule->carName}}</h4>
                                                <div class="d-item_like">

                                        </div>
                                        <div class="d-atr-group">
                                                    <span class="d-atr"><img src="images/icons/1.svg" alt="">{{ $vehicule->seating }}</span>
                                                    <span class="d-atr"><img src="images/icons/2.svg" alt="">{{ $vehicule->airbags }}</span>
                                                    <span class="d-atr"><img src="images/icons/4.svg" alt="">SUV</span>
                                                </div>
                                                <div class="d-price">
                                                    @lang('messages.Daily rate from') <span><H4>{{ $vehicule->price }} DA</H4></span>
                                                    <a class="btn-main" href="{{route('vehicules.show2',$vehicule->id)}}">@lang('messages.Rent Now')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
        <!-- content close -->

        <a href="#" id="back-to-top"></a>

        <!-- footer begin -->
        @include('front-end.footer')
        <!-- footer close -->

    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>

</body>


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/cars.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:15:16 GMT -->
</html>
