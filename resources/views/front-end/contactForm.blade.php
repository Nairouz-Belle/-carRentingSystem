
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:15:20 GMT -->
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
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <!-- section begin -->
            <section id="subheader" class="jarallax text-light">
                <img src="images/background/22.png" class="jarallax-img" alt="">
                    <div class="center-y relative text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
									<h1>@lang('messages.Contact Us')</h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- section close -->


            <section aria-label="section">
                <div class="container">
						<div class="row g-custom-x">

							<div class="col-lg-8 mb-sm-30">
                            @if(Session::has('success'))

                                <div class="alert alert-success">

                                    {{Session::get('success')}}

                                </div>

                            @endif

							 <h3>@lang('messages.Do you have any question')?</h3>

        						<form name="contactForm" id="contact_form" class="form-border" method="POST" action="{{ route('contactUs.store') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                            <div class="col-md-4 mb10">
                                                <div class="field-set">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="@lang('messages.Your Name')" value="{{ old('name') }}">
                                                    @if ($errors->has('name'))

                                                      <span class="text-danger">{{ $errors->first('name') }}</span>

                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb10">
                                                <div class="field-set">
                                                    <input type="text" name="email" id="email" class="form-control" placeholder="@lang('messages.Your Email')" value="{{ old('email') }}">
                                                @if ($errors->has('email'))

                                                    <span class="text-danger">{{ $errors->first('email') }}</span>

                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb10">
                                                <div class="field-set">
                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="@lang('messages.Your Phone')">
                                                    @if ($errors->has('phone'))

                                                      <span class="text-danger">{{ $errors->first('phone') }}</span>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field-set mb20">
                                        <textarea name="message" id="message" class="form-control"placeholder="@lang('messages.Your Message')">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))

                                            <span class="text-danger">{{ $errors->first('message') }}</span>

                                            @endif
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="6LdW03QgAAAAAJko8aINFd1eJUdHlpvT4vNKakj6"></div>
                                        <div id='submit' class="mt20">

                                            <input type='submit' id='send_message' value="@lang('messages.Send Message')" class="btn-main">
                                        </div>

                                        <div id="success_message" class='success'>
                                            Your message has been sent successfully. Refresh this page if you want to send more messages.
                                        </div>
                                        <div id="error_message" class='error'>
                                            Sorry there was an error sending your form.
                                        </div>
                                    </form>
						</div>

						@php
                        $companies=App\Models\Company::all();
                        @endphp
                        @foreach($companies as $company)
                        <div class="col-lg-4">

							<div class="de-box mb30">
								<h4>Our Office</h4>
								<address class="s1">
									<span><i class="id-color fa fa-map-marker fa-lg"></i>{{$company->address}}</span>
									<span><i class="id-color fa fa-phone fa-lg"></i>+(213){{$company->phone}}</span>
									<span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="">{{$company->email}}</a></span>

								</address>
							</div>
                        @endforeach



						</div>

						</div>
					</div>

            </section>

        </div>
        <!-- content close -->

        <a href="#" id="back-to-top"></a>

        @include('front-end.footer')
        <!-- footer close -->

    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src='../../../www.google.com/recaptcha/api.js' async defer></script>
    <script src="form.js"></script>
</body>


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 18:15:21 GMT -->
</html>
