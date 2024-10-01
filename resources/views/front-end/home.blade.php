
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:14:40 GMT -->
<head>
    <title>SpeedyRental - Multipurpose Vehicle Car Rental Website Template</title>
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

<body onload="initialize()">
    <div id="wrapper">

        <!-- page preloader begin -->
        <div id="de-preloader"></div>
        <!-- page preloader close -->

        <!-- header begin -->
        @php
        $companies=App\Models\Company::all();
        $categor=App\Models\Category::count();
        $orders= App\Models\Reservation::count();
        $users= App\Models\User::where('type','=','customer')->count();
        $vehicles= App\Models\Vehicule::count();
        @endphp
        @include('front-end.nav')
        <!-- header close -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top" ></div>
            <section id="section-hero" aria-label="section" class=" overlay-bg jarallax text-light full-height vertical-center">
                <img src="images/background/66.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row align-items-center">
        {{-- <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="section-hero" aria-label="section" class=" text-light full-height vertical-center">
                <img src="images/background/77.jpg" class="jarallax-img" alt="">
            {{-- <section id="section-hero" aria-label="section" class="jarallax no-top no-bottom" data-video-src="images/background/6.jpg"> --}}
                <div class="">
                    <div class="center">
                        <div class="container position-relative z1000">
                            <div class="spacer-double d-lg-none d-sm-block"></div>
                            <div class="spacer-double d-lg-none d-sm-block"></div>
                            <div class="spacer-double d-lg-none d-sm-block"></div>
                            <div class="row align-items-center">
                                <div class="col-lg-6 text-light">
                                    <h3><span class="id-color">@lang('messages.Fast and Easy Way to Rent a Car')</span></h3>
                                    <div class="spacer-10"></div>
                                     <h3 class="mb-2">Simplify your travels in Algeria with our high-end car rental service, offering comfort and reliabilit</h1>
                                    <div class="spacer-10"></div>
                                    {{-- <p class="lead">
                                        @lang('messages.Simplifiez vos déplacements en Algérie grâce à notre service de location de voitures haut de gamme, offrant confort et fiabilité.
                                        ') @lang('messages.Whether you are planning a road trip'), @lang('messages.a family vacation'), @lang('messages.or simply need a reliable mode of transportation'), @lang('messages.Let us be your trusted companion as you navigate the roads and embark on exciting adventures.')
                                    </p> --}}
                                </div>

                                <div class="col-lg-6">
                                    <div class="spacer-single sm-hide"></div>
                                    <div class="p-4 rounded-3 shadow-soft text-light" data-bgcolor="rgba(0, 0, 0, .6)">


                                        <form name="contactForm" id='contact_form' action="{{ route('search-results') }}" method="GET">

                                            <h5>@lang('messages.What is your vehicle type?')</h5>

                                            <div class="de_form de_radio row g-3">
                                                <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                    <input id="radio-1a" name="type" type="radio" value="Voiture" checked="checked">
                                                    <label for="radio-1a"><img src="images/select-form/car.png" alt="">@lang('messages.Car')</label>
                                                </div>

                                                <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                    <input id="radio-1b" name="type" type="radio" value="Fourgon">
                                                    <label for="radio-1b"><img src="images/select-form/van.png" alt="">@lang('messages.Van')</label>
                                                </div>

                                                <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                    <input id="radio-1c" name="type" type="radio" value="Minibus">
                                                    <label for="radio-1c"><img src="images/select-form/minibus.png" alt="">@lang('messages.Minibus')</label>
                                                </div>

                                                <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                    <input id="radio-1d" name="type" type="radio" value="Prestige">
                                                    <label for="radio-1d"><img src="images/select-form/sportscar.png" alt="">@lang('messages.Prestige')</label>
                                                </div>
                                            </div>

                                            <div class="spacer-20"></div>

                                            <div class="row">


                                                <div class="col-lg-6 mb20">
                                                    <h5>@lang('messages.Pick Up Date & Time')</h5>
                                                    <div class="date-time-field">
                                                        <input type="text" id="date-picker" name="Pick Up Date" value="">
                                                        <select name="Pick Up Time" id="pickup-time">
                                                            <option selected disabled value="Select time">@lang('messages.Time')</option>
                                                            <option style="color: black;" value="00:00">00:00</option>
                                                            <option style="color: black;" value="00:30">00:30</option>
                                                            <option style="color: black;" value="01:00">01:00</option>
                                                            <option style="color: black;" value="01:30">01:30</option>
                                                            <option style="color: black;" value="02:00">02:00</option>
                                                            <option style="color: black;" value="02:30">02:30</option>
                                                            <option style="color: black;" value="03:00">03:00</option>
                                                            <option style="color: black;" value="03:30">03:30</option>
                                                            <option style="color: black;" value="04:00">04:00</option>
                                                            <option style="color: black;" value="04:30">04:30</option>
                                                            <option style="color: black;" value="05:00">05:00</option>
                                                            <option style="color: black;" value="05:30">05:30</option>
                                                            <option style="color: black;" value="06:00">06:00</option>
                                                            <option style="color: black;" value="06:30">06:30</option>
                                                            <option style="color: black;" value="07:00">07:00</option>
                                                            <option style="color: black;" value="07:30">07:30</option>
                                                            <option style="color: black;" value="08:00">08:00</option>
                                                            <option style="color: black;" value="08:30">08:30</option>
                                                            <option style="color: black;" value="09:00">09:00</option>
                                                            <option style="color: black;" value="09:30">09:30</option>
                                                            <option style="color: black;" value="10:00">10:00</option>
                                                            <option style="color: black;" value="10:30">10:30</option>
                                                            <option style="color: black;" value="11:00">11:00</option>
                                                            <option style="color: black;" value="11:30">11:30</option>
                                                            <option style="color: black;" value="12:00">12:00</option>
                                                            <option style="color: black;" value="12:30">12:30</option>
                                                            <option style="color: black;" value="13:00">13:00</option>
                                                            <option style="color: black;" value="13:30">13:30</option>
                                                            <option style="color: black;" value="14:00">14:00</option>
                                                            <option style="color: black;" value="14:30">14:30</option>
                                                            <option style="color: black;" value="15:00">15:00</option>
                                                            <option style="color: black;" value="15:30">15:30</option>
                                                            <option style="color: black;" value="16:00">16:00</option>
                                                            <option style="color: black;" value="16:30">16:30</option>
                                                            <option style="color: black;" value="17:00">17:00</option>
                                                            <option style="color: black;" value="17:30">17:30</option>
                                                            <option style="color: black;" value="18:00">18:00</option>
                                                            <option style="color: black;" value="18:30">18:30</option>
                                                            <option style="color: black;" value="19:00">19:00</option>
                                                            <option style="color: black;" value="19:30">19:30</option>
                                                            <option style="color: black;" value="20:00">20:00</option>
                                                            <option style="color: black;" value="20:30">20:30</option>
                                                            <option style="color: black;" value="21:00">21:00</option>
                                                            <option style="color: black;" value="21:30">21:30</option>
                                                            <option style="color: black;" value="22:00">22:00</option>
                                                            <option style="color: black;" value="22:30">22:30</option>
                                                            <option style="color: black;" value="23:00">23:00</option>
                                                            <option style="color: black;" value="23:30">23:30</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb20">
                                                    <h5>@lang('messages.Return Date & Time')</h5>
                                                    <div class="date-time-field">
                                                        <input type="text" id="date-picker-2" name="Collection Date" value="">
                                                        <select name="Pick Up Time" id="pickup-time">
                                                            <option selected disabled value="Select time">@lang('messages.Time')</option>
                                                            <option style="color: black;" value="00:00">00:00</option>
                                                            <option style="color: black;" value="00:30">00:30</option>
                                                            <option style="color: black;" value="01:00">01:00</option>
                                                            <option style="color: black;" value="01:30">01:30</option>
                                                            <option style="color: black;" value="02:00">02:00</option>
                                                            <option style="color: black;" value="02:30">02:30</option>
                                                            <option style="color: black;" value="03:00">03:00</option>
                                                            <option style="color: black;" value="03:30">03:30</option>
                                                            <option style="color: black;" value="04:00">04:00</option>
                                                            <option style="color: black;" value="04:30">04:30</option>
                                                            <option style="color: black;" value="05:00">05:00</option>
                                                            <option style="color: black;" value="05:30">05:30</option>
                                                            <option style="color: black;" value="06:00">06:00</option>
                                                            <option style="color: black;" value="06:30">06:30</option>
                                                            <option style="color: black;" value="07:00">07:00</option>
                                                            <option style="color: black;" value="07:30">07:30</option>
                                                            <option style="color: black;" value="08:00">08:00</option>
                                                            <option style="color: black;" value="08:30">08:30</option>
                                                            <option style="color: black;" value="09:00">09:00</option>
                                                            <option style="color: black;" value="09:30">09:30</option>
                                                            <option style="color: black;" value="10:00">10:00</option>
                                                            <option style="color: black;" value="10:30">10:30</option>
                                                            <option style="color: black;" value="11:00">11:00</option>
                                                            <option style="color: black;" value="11:30">11:30</option>
                                                            <option style="color: black;" value="12:00">12:00</option>
                                                            <option style="color: black;" value="12:30">12:30</option>
                                                            <option style="color: black;" value="13:00">13:00</option>
                                                            <option style="color: black;" value="13:30">13:30</option>
                                                            <option style="color: black;" value="14:00">14:00</option>
                                                            <option style="color: black;" value="14:30">14:30</option>
                                                            <option style="color: black;" value="15:00">15:00</option>
                                                            <option style="color: black;" value="15:30">15:30</option>
                                                            <option style="color: black;" value="16:00">16:00</option>
                                                            <option style="color: black;" value="16:30">16:30</option>
                                                            <option style="color: black;" value="17:00">17:00</option>
                                                            <option style="color: black;" value="17:30">17:30</option>
                                                            <option style="color: black;" value="18:00">18:00</option>
                                                            <option style="color: black;" value="18:30">18:30</option>
                                                            <option style="color: black;" value="19:00">19:00</option>
                                                            <option style="color: black;" value="19:30">19:30</option>
                                                            <option style="color: black;" value="20:00">20:00</option>
                                                            <option style="color: black;" value="20:30">20:30</option>
                                                            <option style="color: black;" value="21:00">21:00</option>
                                                            <option style="color: black;" value="21:30">21:30</option>
                                                            <option style="color: black;" value="22:00">22:00</option>
                                                            <option style="color: black;" value="22:30">22:30</option>
                                                            <option style="color: black;" value="23:00">23:00</option>
                                                            <option style="color: black;" value="23:30">23:30</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb20" hidden>

                                                    <div >
                                                        <input type="text"  name="status" value="available">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type='submit' id='send_message' value="@lang('messages.Find Vehicle')" class="btn-main pull-right">

                                            <div class="clearfix"></div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="spacer-double d-lg-none d-sm-block"></div>
                            <div class="spacer-double d-lg-none d-sm-block"></div>
                        </div>

                        <div class="position-absolute d-flex bottom-20">
                          <div class="de-marquee-list d-marquee-small">
                            <div class="d-item">
                              <span class="d-item-txt">@lang('messages.SUV')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Hatchback')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Crossover')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Convertible')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Sedan')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Sports Car')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Coupe')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Minivan')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Station Wagon')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Pickup Truck')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Minivans')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                              <span class="d-item-txt">@lang('messages.Exotic Cars')</span>
                              <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                             </div>
                          </div>


                        </div>
                    </div>
                </div>
            </section>

            {{-- <section id="section-fun-facts" class="bg-color text-light">
                <div class="container">
                    <div class="row g-custom-x force-text-center">
                        <div class="col-md-3 col-sm-6 mb-sm-30">
                            <div class="de_count wow fadeInUp">
                                <h3 class="timer" data-to="{{$orders}}" data-speed="3000">{{$orders}}</h3>
                                @lang('messages.Bookings')
                                <p class="d-small">@lang('messages.Join the thousands of customers who have booked our vehicles for their travel needs.')</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-sm-30">
                            <div class="de_count wow fadeInUp">
                                <h3 class="timer" data-to="{{$users}}" data-speed="3000">{{$users}}</h3>
                                @lang('messages.Happy Customers')
                                <p class="d-small">@lang('messages.Join the thousands of customers who have chosen our car rental services for their travel needs.') </p>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-sm-30">
                            <div class="de_count wow fadeInUp">
                                <h3 class="timer" data-to="{{$vehicles}}" data-speed="3000">{{$vehicles}}</h3>
                                @lang('messages.Fleets Vehicle')
                                <p class="d-small">@lang('messages.Join the thousands of satisfied customers who have chosen our car rental services for their travel needs')</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-sm-30">
                            <div class="de_count wow fadeInUp">
                                <h3 class="timer" data-to="{{$categor}}" data-speed="3000">{{$categor}}</h3>
                                @lang('messages.Wide Selection of Vehicle Makes')
                                <p class="d-small">@lang('messages.Discover our extensive collection of vehicles from various reputable makes.')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
@php
$categories=App\Models\Category::all();
@endphp

            <section id="section-cars">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <h2>@lang('messages.Our Vehicle Make')</h2>
                            <p>@lang('messages.We take pride in offering vehicles from top-quality manufacturers. Each vehicle in our fleet is carefully selected to provide exceptional performance, comfort, and reliability.')</p>
                            <div class="spacer-20"></div>
                        </div>


                        <div class="clearfix"></div>

                        <div id="items-carousel" class="owl-carousel wow fadeIn">
                            @foreach($categories as $brand)<div class="col-lg-10">

                                <div class="de-item mb30">

                                <div class="d-img">
                                    <img src="{{ Storage::url($brand->image) }}" class="img-fluid" alt="">
                                </div>

                                </div>

                            </div>@endforeach
                        </div>

                    </div>
                </div>
            </section>

            <section class="text-light jarallax">
                <img src="images/background/2.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInRight">
                            <h2>@lang('messages.We offer customers a wide range of') <span class="id-color">@lang('messages.commercial cars')</span> @lang('messages.and') <span class="id-color">@lang('messages.luxury cars')</span> @lang('messages.for any occasion.')</h2>
                        </div>
                        <div class="col-lg-6 wow fadeInLeft">
                            @lang('messages.We offer our customers a diverse selection of commercial and luxury cars tailored to suit any occasion. Whether you need a reliable and spacious vehicle for business purposes or a stylish and comfortable ride for a special event, our car rental service has you covered. With our extensive fleet, you can choose from a variety of makes and models, each meticulously maintained to ensure a high standard of performance and comfort. Experience the convenience and flexibility of our car rental service and enjoy the perfect vehicle for your needs.')
                        </div>
                    </div>
                    <div class="spacer-double"></div>

                </div>
            </section>

            <section aria-label="section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <h2>@lang('messages.Our Features')</h2>
                            <p>@lang('messages.Our car rental website offers a convenient and reliable experience to meet all your transportation needs.')</p>
                            <div class="spacer-20"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-3">
                            <div class="box-icon s2 p-small mb20 wow fadeInRight" data-wow-delay=".5s">
                                <i class="fa bg-color fa-trophy"></i>
                                <div class="d-inner">
                                    <h4>@lang('messages.Helpful Filters and Sorting Options')</h4>
                                    @lang('messages.By using our filters and sorting options, you can streamline your search process and save valuable time.')
                                </div>
                            </div>
                            <div class="box-icon s2 p-small mb20 wow fadeInL fadeInRight" data-wow-delay=".75s">
                                <i class="fa bg-color fa-road"></i>
                                <div class="d-inner">
                                    <h4>@lang('messages.Wide range of vehicles')</h4>

                                     @lang('messages.Including economy cars, sedans, SUVs, vans, and luxury cars.')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <img src="images/misc/car-2.png" alt="" class="img-fluid wow fadeInUp">
                        </div>

                        <div class="col-lg-3">
                            <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1s">
                                <i class="fa bg-color fa-tag"></i>
                                <div class="d-inner">
                                    <h4>@lang('messages.Easy and fast online booking')</h4>
                                     @lang('messages.With the ability to specify rental dates, extra options, and vehicle preferences.')
                                </div>
                            </div>
                            <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1.25s">
                                <i class="fa bg-color fa-map-pin"></i>
                                <div class="d-inner">
                                    <h4>@lang('messages.Discounts and Promotions')</h4>
                                     @lang('messages.We regularly offer discounts, promotions, and exclusive deals to provide added value to our customers.')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section-img-with-tab" class="bg-dark text-light">
                <div class="container" style="align-center">
                    <div class="row align-items-center">
                        <div class="col-lg-5 offset-lg-7">

                            <h2>@lang('messages.Only Quality For Clients')</h2>
                            <div class="spacer-20"></div>

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">@lang('messages.Luxury')</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('messages.Comfort')</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">@lang('messages.Prestige')</button>
                              </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <p>@lang('messages.Indulge in the ultimate luxury experience with our exquisite range of high-end vehicles. Immerse yourself in comfort, style, and advanced features, ensuring a memorable and sophisticated journey like no other.')
                                </p>
                              </div>
                              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <p>@lang('messages.Experience unmatched comfort with our fleet of vehicles designed to prioritize your relaxation and convenience. From plush seating and spacious interiors to control systems, every aspect of our cars is meticulously crafted to ensure a smooth and enjoyable ride, allowing you to travel in absolute comfort and tranquility.')</p></div>
                              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <p>@lang('messages.Indulge in the ultimate luxury and sophistication with our prestigious car collection. Our range of prestigious vehicles is handpicked to offer you a remarkable driving experience that exudes elegance and class. With top-of-the-line features, cutting-edge technology, and impeccable craftsmanship, these cars redefine prestige and are sure to leave a lasting impression wherever you go. Experience the epitome of style and status with our prestigious car rentals.')</p></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="image-container col-md-6 pull-right" data-bgimage="url(images/misc/e2.png) center"></div>
            </section>
            <section id="section-faq">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2>Avez-vous des questions ?</h2>
                            <div class="spacer-20"></div>
                        </div>
                    </div>
                    <div class="row g-custom-x">
                        <div class="col-md-6 wow fadeInUp">
                            <div class="accordion secondary">
                                <div class="accordion-section">
                                    <div class="accordion-section-title" data-tab="#accordion-1">
                                        Comment signaler un accident ou des dommages à la voiture de location ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-1">
                                        <p>
                                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-2">
                                        Quelle est la durée minimale de location ?                                    </div>
                                    <div class="accordion-section-content" id="accordion-2">
                                        <p>
                                            La durée minimale de location peut varier en fonction de notre agence et des politiques spécifiques. En général, la durée minimale de location d'une voiture est d'une journée complète, soit 24 heures. Cependant, certaines agences peuvent également proposer des options de location à court terme, telles que des locations de quelques heures ou une demi-journée, pour répondre à des besoins spécifiques.
                                        </p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-3">
                                        Quels documents dois-je fournir pour louer une voiture ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-3">
                                        <p>
                                            Permis de conduire valide : Vous devrez présenter un permis de conduire valide délivré par votre pays de résidence. Veuillez vous assurer que votre permis est en cours de validité et qu'il est accepté dans le pays où vous souhaitez louer la voiture.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 wow fadeInUp">
                            <div class="accordion secondary">
                                <div class="accordion-section">
                                    <div class="accordion-section-title" data-tab="#accordion-b-4">
                                        Quel âge dois-je avoir pour louer une voiture ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-b-4">
                                        <p>
                                            Pour louer une voiture auprès de notre agence, vous devez avoir au moins 21 ans révolus. C'est l'âge minimum requis pour pouvoir bénéficier de nos services de location de voitures. Veuillez noter que des conditions spécifiques peuvent s'appliquer en fonction du type de véhicule que vous souhaitez louer et de la destination.
                                        </p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-b-5">
                                        Que se passe-t-il si je rends la voiture en retard ?                                    </div>
                                    <div class="accordion-section-content" id="accordion-b-5">
                                        <p>
                                            Si vous rendez la voiture en retard, notre agence applique généralement une politique de retard. Cela signifie que des frais supplémentaires peuvent vous être facturés en fonction de la durée du retard et des conditions spécifiques de votre contrat de location.
                                        </p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-b-6">
                                        Puis-je récupérer et rendre la voiture à des endroits différents ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-b-6">
                                        <p>
                                            Non, il n'est généralement pas possible de récupérer et de rendre la voiture à des endroits différents, sauf dans des circonstances exceptionnelles. La plupart des agences de location de voitures exigent que le véhicule soit récupéré et restitué au même endroit, conformément aux termes et conditions du contrat de location.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section aria-label="section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <h2></h2>
                            <p></p>
                            {{-- <div class="spacer-20"></div> --}}
                        </div>
                       <div class="clearfix"></div>

                        </div>


            </section>
            @foreach($companies as $company)
            <section id="section-call-to-action" class="bg-color-2 pt60 pb60 text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <h2 class="s2">@lang('messages.Call us for further information. SpeedyRental customer care is here to help you anytime.')</h2>
                        </div>

                        <div class="col-lg-5 text-lg-center text-sm-center">
                            <div class="phone-num-big">
                                <i class="fa fa-phone"></i>
                                <span class="pnb-text">
                                    @lang('messages.Call Us Now')
                                </span>
                                <span class="pnb-num">
                                    {{$company->phone ?? ''}}
                                </span>
                            </div>
                            <a href="{{route('contactUs.store')}}" class="btn-main">@lang('messages.Contact Us')</a>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach

        </div>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        @include('front-end.footer')
    </div>
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgiM7ogCAA2Y5pgSk2KXZfxF5S_1jsptA&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>

</body>
</html>
