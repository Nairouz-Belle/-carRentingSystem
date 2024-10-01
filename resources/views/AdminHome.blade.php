<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="disable">

<head>

<meta charset="utf-8" />
<title> @lang('messages.Car Rental') | @lang('messages.Admin Dashboard') </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
<livewire:styles />
<!-- dropzone css -->
<link rel="stylesheet" href="{{asset('assets/libs/dropzone/dropzone.css')}}" type="text/css" />

<!--Swiper slider css-->
<link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

<!-- jsvectormap css -->
<link href="{{asset('assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

<!-- nouisliderribute css -->
<link rel="stylesheet" href="{{asset('assets/libs/nouislider/nouislider.min.css')}}">

<!-- gridjs css -->
<link rel="stylesheet" href="{{asset('assets/libs/gridjs/theme/mermaid.min.css')}}">
<!-- jsvectormap css -->
<link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
<link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Layout config Js -->
<script src="{{ asset('assets/js/layout.js')}}"></script>
<!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />


<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

<header id="page-topbar">
<div class="layout-width">
<div class="navbar-header">
<div class="d-flex">
<!-- LOGO -->
<div class="navbar-brand-box horizontal-logo">
<a href="index.html" class="logo logo-dark">
<span class="logo-sm">
<img src="{{asset('assets/images/logo.png')}}" alt="" height="22">
</span>
<span class="logo-lg">
<img src="{{asset('assets/images/logo.png')}}" alt="" height="17">
</span>
</a>

<a href="index.html" class="logo logo-light">
<span class="logo-sm">
<img src="{{asset('assets/images/logo.png')}}" alt="" height="22">
</span>
<span class="logo-lg">
<img src="{{asset('assets/images/logo.png')}}" alt="" height="17">
</span>
</a>
</div>

<button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
<span class="hamburger-icon">
<span></span>
<span></span>
<span></span>
</span>
</button>

<!-- App Search-->
<form class="app-search d-none d-md-block">

<div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
<div data-simplebar style="max-height: 320px;">
<!-- item-->
<div class="dropdown-header">
<h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
</div>

<div class="dropdown-item bg-transparent text-wrap">
<a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
<a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1"></i></a>
</div>
<!-- item-->
<div class="dropdown-header mt-2">
<h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
</div>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item">
<i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
<span>Analytics Dashboard</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item">
<i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
<span>Help Center</span>
</a>

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item">
<i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
<span>My account settings</span>
</a>

<!-- item-->
<div class="dropdown-header mt-2">
<h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
</div>

<div class="notification-list">
<!-- item -->
<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
<div class="d-flex">
<img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
<div class="flex-1">
<h6 class="m-0">Angela Bernier</h6>
<span class="fs-11 mb-0 text-muted">Manager</span>
</div>
</div>
</a>
<!-- item -->
<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
<div class="d-flex">
<img src="{{asset('assets/images/users/avatar-3.jpg')}}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
<div class="flex-1">
<h6 class="m-0">David Grasso</h6>
<span class="fs-11 mb-0 text-muted">Web Designer</span>
</div>
</div>
</a>
<!-- item -->
<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
<div class="d-flex">
<img src="{{asset('assets/images/users/avatar-5.jpg')}}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
<div class="flex-1">
<h6 class="m-0">Mike Bunch</h6>
<span class="fs-11 mb-0 text-muted">React Developer</span>
</div>
</div>
</a>
</div>
</div>


</div>
</form>
</div>

<div class="d-flex align-items-center">
    <div class="dropdown ms-1 topbar-head-dropdown header-item">



<!-- item-->
<select class="form-select" style="border:none;" onchange="changeLanguage(this.value)">

<option {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">English</option>

<option {{session()->has('lang_code')?(session()->get('lang_code')=='fr'?'selected':''):''}} value="fr">French</option>
</select>
</div>
<div class="dropdown topbar-head-dropdown ms-1 header-item">
<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class='bx bx-category-alt fs-22'></i>
</button>
<div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
<div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
<div class="row align-items-center">
<div class="col">
<h6 class="m-0 fw-semibold fs-15"> @lang('messages.Web Apps') </h6>
</div>

</div>
</div>

<div class="p-2">
<div class="row g-0">
<div class="col">
<a class="dropdown-icon-item" href="#!">
<img src="{{ asset('assets/images/brands/github.png')}}" alt="Github">
<span>GitHub</span>
</a>
</div>
</div>
</div>
</div>
</div>





<div class="ms-1 header-item d-none d-sm-flex">
<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
<i class='bx bx-fullscreen fs-22'></i>
</button>
</div>

<div class="ms-1 header-item d-none d-sm-flex">
<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
<i class='bx bx-moon fs-22'></i>
</button>
</div>



<div class="dropdown ms-sm-3 header-item topbar-user">
<button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
@php
$users = App\Models\User::all();
@endphp
@foreach($users as $usr)
@if($usr->id==(Auth::user()->id))
<span class="d-flex align-items-center">


@if($usr->ProfilePic == NULL)
<img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/noProfilePicture.png')}}" alt="Header Avatar">
@else
<img class="rounded-circle header-profile-user" src="{{ Storage::url($usr->ProfilePic) }}" alt="Header Avatar">
@endif



<span class="text-start ms-xl-2">
<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{$usr->name}}</span>
<span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{$usr->type}}</span>
</span>
</span>
@endif
@endforeach
</button>
<div class="dropdown-menu dropdown-menu-end">
<!-- item-->
<h6 class="dropdown-header">@lang('messages.Welcome') {{(Auth::user()->name)}} !</h6>
<a class="dropdown-item" href="{{route('Users.show',(Auth::user()->id))}}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>




<a class="dropdown-item" href="{{route('admin.logout')}}">

<i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
<span class="align-middle" data-key="t-logout">@lang('messages.Logout')</span>
</a>

</div>
</div>
</div>
</div>
</div>
</header>

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
</div>
<div class="modal-body">
<div class="mt-2 text-center">
<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
<div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
<h4>Are you sure ?</h4>
<p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
</div>
</div>
<div class="d-flex gap-2 justify-content-center mt-4 mb-2">
<button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
</div>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
<!-- LOGO -->
<div class="navbar-brand-box">
<!-- Dark Logo-->
<a href="index.html" class="logo logo-dark">
<span class="logo-sm">
<img src="{{ asset('assets/images/logo.png')}}" alt="" height="22">
</span>
<span class="logo-lg">
<img src="{{ asset('assets/images/logo.png')}}" alt="" height="17">
</span>
</a>
<!-- Light Logo-->
<a href="index.html" class="logo logo-light">
<span class="logo-sm">
<img src="{{ asset('assets/images/logo.png')}}" alt="" height="22">
</span>
<span class="logo-lg">
<img src="{{ asset('assets/images/logo.png')}}" alt="" height="17">
</span>
</a>
<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
<i class="ri-record-circle-line"></i>
</button>
</div>

<div id="scrollbar">
<div class="container-fluid">

<div id="two-column-menu">
</div>
<ul class="navbar-nav" id="navbar-nav">
<li class="menu-title"><span data-key="t-menu">Menu</span></li>

<li class="nav-item">
<a class="nav-link menu-link" href="{{route('admin.home')}}">
<i class="ri-dashboard-fill"></i> <span data-key="t-dashboards">@lang('messages.Dashboard')</span>
</a>
</li>




<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Apps</span></li>

<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Company.index')}}">
<i class=" ri-building-2-fill"></i> <span data-key="t-authentication">@lang('messages.Company')</span>
</a>

</li>

<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Users.index')}}">
<i class="ri-group-2-fill"></i> <span data-key="t-authentication">@lang('messages.Users')</span>
</a>

</li>
<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Vehicules.index')}}">
<i class="ri-roadster-fill"></i> <span data-key="t-authentication">@lang('messages.Vehicule')</span>
</a>

</li>
<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Reservations.index')}}">
<i class=" ri-calendar-todo-fill"></i> <span data-key="t-authentication">@lang('messages.Booking')</span>
</a>

</li>
<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Category.index')}}">
<i class=" ri-apps-fill"></i> <span data-key="t-authentication">@lang('messages.Category')</span>
</a>

</li>
<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Discounts.index')}}">
<i class=" ri-percent-fill"></i> <span data-key="t-authentication">@lang('messages.Discount')</span>
</a>

</li>
<li class="nav-item">
<a class="nav-link menu-link" href="{{route('Payments.index')}}">
<i class="ri-coins-fill"></i> <span data-key="t-authentication">@lang('messages.Payments')</span>
</a>

</li>





</ul>
</div>
<!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
@yield('content')
<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-sm-6">
<script>document.write(new Date().getFullYear())</script>@lang('messages.Car Rental') © @lang('messages.All Rights Are resurved 2023.')
</div>
</div>
</div>
</footer>
</div>

<!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
<i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->


<!-- Theme Settings -->



<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Vector map-->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!--Swiper slider js-->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js')}}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js')}}"></script>
<script src="code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/pages/ecommerce-product-list.init.js')}}"></script>
<script src="{{asset('assets/js/pages/profile-setting.init.js')}}"></script>

<!-- nouisliderribute js -->
<script src="{{asset('assets/libs/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('assets/libs/wnumb/wNumb.min.js')}}"></script>
<!-- range slider init -->
<script src="{{asset('assets/js/pages/range-sliders.init.js')}}"></script>

<!-- gridjs js -->
<script src="assets/libs/gridjs/gridjs.umd.js"></script>
<script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>
<!-- gridjs js -->
<script src="{{asset('assets/libs/gridjs/gridjs.umd.js')}}"></script>
<script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>
<script src="{{asset('assets/js/pages/listjs.init.js')}}"></script>
<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>


<script src="{{asset('assets/libs/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('assets/libs/wnumb/wNumb.min.js')}}"></script>
<script src="{{asset('assets/js/pages/apps-nft-explore.init.js')}}"></script>
<script type="text/javascript" src="{{('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<!-- ckeditor -->
<script src="{{asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('assets/js/pages/form-file-upload.init.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('assets/libs/dropzone/dropzone-min.js')}}"></script>

<script src="{{asset('assets/js/pages/ecommerce-product-create.init.js')}}"></script>
<!-- Modern colorpicker bundle -->
<script src="{{asset('assets/libs/@simonwep/pickr/pickr.min.js')}}"></script>
<!-- rater-js plugin -->
<script src="{{asset('assets/libs/rater-js/index.js')}}"></script>
<!-- rating init -->
<script src="{{asset('assets/js/pages/rating.init.js')}}"></script>
<!-- init js -->
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>


<!-- ecommerce product details init -->
<script src="{{asset('assets/js/pages/ecommerce-product-details.init.js')}}"></script>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="{{asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>


<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('assets/js/pages/dashboard-ecommerce.init.js')}}"></script>

<livewire:scripts />
<!-- apexcharts -->
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Vector map-->
<script src="{{asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!-- Countdown js -->
<script src="{{asset('assets/js/pages/coming-soon.init.js')}}"></script>

<!-- Marketplace init -->
<script src="{{asset('assets/js/pages/dashboard-nft.init.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('assets/libs/chart.js/chart.min.js')}}"></script>

<!-- chartjs init -->
<script src="{{asset('assets/js/pages/chartjs.init.js')}}"></script>
<!-- echarts js -->
<script src="{{asset('assets/libs/echarts/echarts.min.js')}}"></script>

<!-- echarts init -->
<script src="{{asset('assets/js/pages/echarts.init.js')}}"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

  function changeLanguage(lang)
  {
    window.location='{{url("change-language")}}/'+lang;
  }

</script>

</html>
