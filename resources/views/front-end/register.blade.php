
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
    <!-- CSS Files -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


   <!-- ================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <script src="assets/js/layout.js"></script>
    <link href="css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
    <link href="css/plugins.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/coloring.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css">
    <style type="text/css">.alert {
    position: relative;
    padding: 10px;
    background-color: #dff0d8;
    color: #3c763d;
    border: 1px solid #d6e9c6;
    border-radius: 4px;
    margin-bottom: 10px;
}

.alert .message {
    display: inline-block;
    margin-right: 10px;
}

.alert .close-btn {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
    background: transparent;
    border: none;
}</style>
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
									<h1>@lang('messages.Request An Account')</h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- section close -->



            <section aria-label="section">
                <div class="container">
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible alert-additional fade show" role="alert">
    <div class="alert-body">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="d-flex">
            <div class="flex-shrink-0 me-3">
                <i class="ri-notification-off-line fs-16 align-middle"></i>
            </div>
            <div class="flex-grow-1">
                <h5 class="alert-heading">Merci de vous être inscrit(e) !</h5>
                <p class="mb-0">LE RESPONSABLE VÉRIFIERA VOTRE DONNÉES</p>
            </div>
        </div>
    </div>
    <div class="alert-content">
        <p class="mb-0">Nous vous enverrons un e-mail pour vous informer que vous pouvez connecter
            💌</p>
    </div>
</div>
@endif
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<h3>@lang('messages.Don t have an account Register now.')</h3>


							<div class="spacer-10"></div>

							<form class="form-border" method="post" action="{{ route('newAccount') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Name'):</label>
                                            <input type='text' placeholder="@lang('messages.Your Name')" name='name' id='name' class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Gender'):</label>
                                            <select class="form-select" name="gender">
                                                <option value="">--- @lang('messages.Gender') ---</option>
                                                <option value="Male">@lang('messages.Male')</option>
                                                <option value=Female>@lang('messages.Female')</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Address'):</label>
                                            <input type='text' name='address' placeholder="@lang('messages.Your Address')" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Phone'):</label>
                                            <input type='text' name='phone' placeholder="@lang('messages.Your Phone')" class="form-control">
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Email Address'):</label>
                                            <input type='text' name='email' id='email' placeholder="email@gmail.com" class="form-control">
                                        </div>
                                    </div>





                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Password'):</label>
                                            <input type='password' name='password' placeholder="*** *** ***" id='password' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display:none;">
                                        <div class="field-set">
                                            <label>Type:</label>
                                            <input type='text' name='type' value="customer" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Birthdate'):</label>
                                            <input type='date' name='birthDate' class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.License ID'):</label>
                                            <input type='text' name='IDLicense' placeholder="@lang('messages.Your License ID')" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.License Date'):</label>
                                            <input type='month' name='IDLicenseDate'  class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.License Expiry Date'):</label>
                                            <input type='month' name='IDLicenseExpiry'  class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.License Document'):</label>
                                            <input type='file' name='LicenseDoc'  class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="display:none;">
                                        <div class="field-set">
                                            <label>Status:</label>
                                            <input type='text' name='status' value="Pending" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>@lang('messages.Profile Picture'):</label>
                                            <input type='file' name='ProfilePic'  class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <br>

                                            <input type='submit'value="@lang('messages.Request An Account')" class="btn-main color-1" id="">


                                    </div>

                                </div>
                            </form>

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
    <script src="assets/libs/prismjs/prism.js"></script>

    <script>
        var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        var alertTrigger = document.getElementById('liveAlertBtn')

        function alert(message, type) {
            var wrapper = document.createElement('div')
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

            alertPlaceholder.append(wrapper)
        }

        if (alertTrigger) {
            alertTrigger.addEventListener('click', function () {
                alert('Nice, you triggered this alert message!', 'success')
            })
        }
    </script>

    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>

</body>

</html>
