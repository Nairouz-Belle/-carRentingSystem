        @php
        $companies= App\Models\Company::all();
        @endphp


        @foreach($companies as $company)

        <header class="transparent scroll-light has-topbar">
            <div id="topbar" class="topbar-dark text-light">
                <div class="container">
                    <div class="topbar-left xs-hide">
                        <div class="topbar-widget">
                            <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+(213){{$company->phone ?? ''}}</a></div>
                            <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>{{$company->email ?? ''}}</a></div>
                        </div>
                    </div>

                    <div class="topbar-right">
                        <div class="social-icons">
                            <a href="#"><i class="fa fa-facebook fa-lg"></i></a>

                            <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">

                                        <a href="index.html">
                                            {{-- <img class="logo-1" src="{{Storage::url($company->image)}}" alt="">
                                            <img class="logo-2" src="{{Storage::url($company->image)}}" alt=""> --}}
                                        </a>

                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="{{url('/home')}}">{{ __('messages.Home') }}</a></li>
                                    <li><a class="menu-item" href="{{route('vehicules.indexFrontEnd')}}">{{ __('messages.Cars') }}</a></li>
                                    <li><a class="menu-item" href="{{url('/terms')}}">{{ __('Conditions') }}</a></li>
                                    <li><a class="menu-item" href="{{route('contactUs.store')}}">{{ __('messages.Contact') }}</a></li>
                                    <li class="menu-item-has">

                                    <a class="menu-item">
                                    <select  style="background-color:inherit;width: inherit;height: inherit;
                                    padding-top:4px; color:white;font-size: 15px;"
                                    onchange="changeLanguage(this.value)">
                                        <option style="background-color:green;color:white;"
                                         {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">{{ __('messages.English') }}</option>

                                        <option style="background-color:green;color:white;" {{session()->has('lang_code')?(session()->get('lang_code')=='fr'?'selected':''):''}} value="fr">{{ __('messages.French') }}</option>
                                    </select>
                                    </a>

                                    </li>



                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <a href="{{url('/Register_')}}" class="btn-main">@lang('messages.Request An Account')</a>
                                    <span id="menu-btn"></span>
                                </div>
                                <div class="menu_side_area">
                                    <a href="{{url('/loginIn')}}" class="btn-main">@lang('messages.Sign In')</a>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @endforeach
       @if (count($companies) === 0)
        <header class="transparent scroll-light has-topbar">
            <div id="topbar" class="topbar-dark text-light">
                <div class="container">
                    <div class="topbar-left xs-hide">
                        <div class="topbar-widget">

                        </div>
                    </div>

                    <div class="topbar-right">

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->

                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="{{url('/home')}}">{{ __('messages.Home') }}</a></li>
                                    <li><a class="menu-item" href="{{route('vehicules.indexFrontEnd')}}">{{ __('messages.Cars') }}</a></li>
                                    <li><a class="menu-item" href="{{route('contactUs.store')}}">{{ __('messages.Contact') }}</a></li>

                                    <li class="menu-item-has">

                                    <a class="menu-item">
                                    <select  style="background-color:inherit;width: inherit;height: inherit;
                                    padding-top:4px; color:white;font-size: 15px;"
                                    onchange="changeLanguage(this.value)">
                                        <option style="background-color:green;color:white;"
                                         {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">{{ __('messages.English') }}</option>

                                        <option style="background-color:green;color:white;" {{session()->has('lang_code')?(session()->get('lang_code')=='fr'?'selected':''):''}} value="fr">{{ __('messages.French') }}</option>
                                    </select>
                                    </a>

                                    </li>



                                </ul>
                            </div>
                            <div class="de-flex-col">

                                <div class="menu_side_area">
                                    <a href="{{url('/Register_')}}" class="btn-main">@lang('messages.Request An Account')</a>
                                    <span id="menu-btn"></span>
                                </div>
                                <div class="menu_side_area">
                                    <a href="{{url('/loginIn')}}" class="btn-main">@lang('messages.Sign In')</a>
                                    <span id="menu-btn"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

  function changeLanguage(lang)
  {
    window.location='{{url("change-language")}}/'+lang;
  }

</script>
