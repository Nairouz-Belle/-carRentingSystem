
<!DOCTYPE html>
<html lang="zxx">
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
                                    <form action="{{route('filter.type')}}" method="POST">
                                        @csrf
                                    <div class="de_checkbox">
                                        <input id="vehicle_type_1" name="type[]" type="checkbox" value="Car">
                                        <label for="vehicle_type_1">@lang('messages.Car')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="vehicle_type_2" name="type[]" type="checkbox" value="Van">
                                        <label for="vehicle_type_2">@lang('messages.Van')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="vehicle_type_3" name="type[]" type="checkbox" value="Minibus">
                                        <label for="vehicle_type_3">@lang('messages.Minibus')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="vehicle_type_4" name="type[]" type="checkbox" value="Prestige">
                                        <label for="vehicle_type_4">@lang('messages.Prestige')</label>
                                    </div>

                                    <button type="submit" style="padding: 3px 15px 3px 15px; background-color: #78CA5C;  color:white;border: none; border-radius: 5px;margin-top:15px ;">@lang('messages.Submit')</button>
                                    </form>
                                </div>
                            </div>

                            <div class="item_filter_group">

                            <h4>@lang('messages.Car Body Type')</h4>
                            <form action="{{route('filter.body')}}" method="POST"> 
                                @csrf
                            <div class="de_form">
                                <div class="de_checkbox">
                                    <input id="car_body_type_1" name="shape[]" type="checkbox" value="Convertible">
                                    <label for="car_body_type_1">@lang('messages.Convertible')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_2" name="shape[]" type="checkbox" value="Coupe">
                                    <label for="car_body_type_2">@lang('messages.Coupe')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_3" name="shape[]" type="checkbox" value="Exotic Cars">
                                    <label for="car_body_type_3">@lang('messages.Exotic Cars')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_4" name="shape[]" type="checkbox" value="Hatchback">
                                    <label for="car_body_type_4">@lang('messages.Hatchback')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_5" name="shape[]" type="checkbox" value="Minivan">
                                    <label for="car_body_type_5">@lang('messages.Minivan')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_6" name="shape[]" type="checkbox" value="Pickup Truck">
                                    <label for="car_body_type_6">@lang('messages.Pickup Truck')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_7" name="shape[]" type="checkbox" value="Sedan">
                                    <label for="car_body_type_7">@lang('messages.Sedan')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_8" name="shape[]" type="checkbox" value="Sports Car">
                                    <label for="car_body_type_8">@lang('messages.Sports Car')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_9" name="shape[]" type="checkbox" value="Station Wagon">
                                    <label for="car_body_type_9">@lang('messages.Station Wagon')</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="car_body_type_10" name="shape[]" type="checkbox" value="SUV">
                                    <label for="car_body_type_10">@lang('messages.SUV')</label>
                                </div>
                                <button type="submit" style="padding: 3px 15px 3px 15px; background-color: #78CA5C;  color:white;border: none; border-radius: 5px;margin-top:15px ;">@lang('messages.Submit')</button>
                                    </form>

                            </div>
                            </form>
                            </div>

                            <div class="item_filter_group">
                            <h4>@lang('messages.Car Seats')</h4>
                            <form action="{{route('filter.seats')}}" method="POST"> 
                                @csrf
                                <div class="de_form">
                                    <div class="de_checkbox">
                                        <input id="car_seat_1" name="seating[]" type="checkbox" value="2">
                                        <label for="car_seat_1">2 @lang('messages.seats')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_seat_2" name="seating[]" type="checkbox" value="4">
                                        <label for="car_seat_2">4 @lang('messages.seats')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_seat_3" name="seating[]" type="checkbox" value="6">
                                        <label for="car_seat_3">6 @lang('messages.seats')</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_seat_4" name="seating[]" type="checkbox" value="6+">
                                        <label for="car_seat_4">6+ @lang('messages.seats')</label>
                                    </div>
                                    <button type="submit" style="padding: 3px 15px 3px 15px; background-color: #78CA5C;  color:white;border: none; border-radius: 5px;margin-top:15px ;">@lang('messages.Submit')</button>
                                </div>
                            </form>
                            </div>

                            <div class="item_filter_group">
                            <form action="{{route('filter.engine')}}" method="POST"> 
                                @csrf
                                <h4>@lang('messages.Car Engine Capacity (cc)')</h4>
                                <div class="de_form">
                                    <div class="de_checkbox">
                                        <input id="car_engine_1" name="engine[]" type="checkbox" value="one">
                                        <label for="car_engine_1">1000 - 2000</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_engine_2" name="engine[]" type="checkbox" value="two">
                                        <label for="car_engine_2">2000 - 4000</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_engine_3" name="engine[]" type="checkbox" value="three">
                                        <label for="car_engine_3">4000 - 6000</label>
                                    </div>

                                    <div class="de_checkbox">
                                        <input id="car_engine_4" name="engine[]" type="checkbox" value="four">
                                        <label for="car_engine_4">6000+</label>
                                    </div>
                                    <button type="submit" style="padding: 3px 15px 3px 15px; background-color: #78CA5C;  color:white;border: none; border-radius: 5px;margin-top:15px ;">@lang('messages.Submit')</button>
                                </div>
                            </form>
                            </div>

                        <div class="item_filter_group">
                        <form action="{{ route('filter.price') }}" method="POST">
                            @csrf
                            <h4>@lang('messages.Price') (DA)</h4>
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" name="minPrice" value="0" class="input-min" >
                                </div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" name="maxPrice" value="2000" class="input-max" >
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min"  min="0" max="2000" value="0" step="1">
                                <input type="range" class="range-max"  min="0" max="2000" value="2000" step="1">
                            </div>
                            <button type="submit" style="padding: 3px 15px 3px 15px; background-color: #78CA5C; color:white; border: none; border-radius: 5px; margin-top: 15px;">@lang('messages.Submit')</button>
                        </form>
                        </div>
                        </div>
                        {{-- $vehicule = Vehicule::find(1);
                        $category = $vehicule->category->brand; --}}
                        <div class="col-lg-9">
                            <div class="row">
                                @foreach($vehicules as $vehicule)
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
                                                    Daily rate from <span><H4>{{ $vehicule->price }} DA</H4></span>
                                                    <a class="btn-main" href="{{route('vehicules.show2',$vehicule->id)}}">Rent Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                            </div>
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
    <script>
        $(document).ready(function() {
    // Update min and max price inputs when the range inputs change
    $('.range-min').on('input', function() {
        $('.input-min').val($(this).val());
    });

    $('.range-max').on('input', function() {
        $('.input-max').val($(this).val());
    });

    // Update range inputs when the min and max price inputs change
    $('.input-min').on('input', function() {
        $('.range-min').val($(this).val());
    });

    $('.input-max').on('input', function() {
        $('.range-max').val($(this).val());
    });
});
    </script>
</body>
</html>
