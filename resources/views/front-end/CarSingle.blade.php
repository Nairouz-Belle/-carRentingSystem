
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/car-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:15:16 GMT -->
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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet" type="text/css" id="mdb">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/coloring.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">
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
                <img src="{{ asset('images/background/2.jpg') }}" class="jarallax-img" alt="">
                    <div class="center-y relative text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
									<h1>@lang('messages.Vehicle Fleet')</h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- section close -->

            <section id="section-car-details">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div id="slider-carousel" class="owl-carousel">
                                @php
                                    $image = DB::table('vehicules')->where('id',$vehicule->id)->first();
                                    $images = explode('|',$image->image);
                                @endphp
                                @foreach ($images as $item)
                                    <div class="item">
                                        <img src="{{URL::to($item)}}" " alt="">
                                    </div>

                                @endforeach

                                {{-- <div class="item">
                                    <img src="{{ asset('images/car-single/2.jpg') }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/car-single/3.jpg') }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/car-single/4.jpg') }}" alt="">
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <h3>{{ $vehicule->carName }} {{ $vehicule->productionYear }}</h3>
                            <p>{{ $vehicule->description  }}</p>

                            <div class="spacer-10"></div>

                            <h4>Specifications</h4>
                            <div class="de-spec">
                                <div class="d-row">
                                    <span class="d-title">Body</span>
                                    <spam class="d-value">Sedan</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Seat</span>
                                    <spam class="d-value">{{ $vehicule->seating }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Door</span>
                                    <spam class="d-value">4</spam>
                                </div>
                                {{-- <div class="d-row">
                                    <span class="d-title">Luggage</span>
                                    <spam class="d-value">150</spam>
                                </div> --}}
                                <div class="d-row">
                                    <span class="d-title">Fuel Type</span>
                                    <spam class="d-value">{{ $vehicule->fuelType }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Engine</span>
                                    <spam class="d-value">{{ $vehicule->engine }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Year</span>
                                    <spam class="d-value">{{ $vehicule->productionYear }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Mileage</span>
                                    <spam class="d-value">{{ $vehicule->km }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Transmission</span>
                                    <spam class="d-value">{{ $vehicule->transmission }}</spam>
                                </div>
                                <div class="d-row">
                                    <span class="d-title">Exterior Color</span>
                                    <spam class="d-value">{{ $vehicule->color }}</spam>
                                </div>

                            </div>

                            <div class="spacer-single"></div>

                            <h4>Features</h4>
                            <ul class="ul-style-2">
                                <li>Bluetooth</li>
                                <li>Multimedia Player</li>
                                <li>Central Lock</li>
                                <li>Sunroof</li>
                            </ul>
                        </div>

                        <div class="col-lg-3">
                            <div class="de-price text-center">
                                Daily rate
                                <h3>{{ $vehicule->price }}<spam><h4> DA </h4></spam></h3>
                            </div>
                            <div class="spacer-30"></div>
                            <div class="de-box mb25">
                                
                                    <h4 style="text-align: ce">Réserver cette voiture</h4>

                                    <div class="spacer-20"></div>

                                    <div class="row">



                                    </div>
                                    <a href="{{url('/loginIn')}}">
                                    <button class="btn-main btn-fullwidth" type="submit">@lang("messages.Book Now")</button>
                                   </a>

                                    <div class="clearfix"></div>

                            </div>

                            <div class="de-box">
                                <h4>Share</h4>
                                <div class="de-color-icons">
                                    <span><i class="fa fa-twitter fa-lg"></i></span>
                                    <span><i class="fa fa-facebook fa-lg"></i></span>
                                    <span><i class="fa fa-reddit fa-lg"></i></span>
                                    <span><i class="fa fa-linkedin fa-lg"></i></span>
                                    <span><i class="fa fa-pinterest fa-lg"></i></span>
                                    <span><i class="fa fa-stumbleupon fa-lg"></i></span>
                                    <span><i class="fa fa-delicious fa-lg"></i></span>
                                    <span><i class="fa fa-envelope fa-lg"></i></span>
                                </div>
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
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>

</body>


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/car-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:15:17 GMT -->
</html>
