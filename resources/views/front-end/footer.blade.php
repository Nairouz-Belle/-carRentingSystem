@php
$companies=App\Models\Company::all();
@endphp
<footer class="text-light">
            <div class="container">
                <div class="row g-custom-x">
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>@lang('messages.About')</h5>
                            <p>@lang('messages.Discover a trusted and reliable rental car service'), @lang('messages.offering a diverse fleet'), @lang('messages.competitive rates'), @lang('messages.and exceptional customer satisfaction.')</p>
                        </div>
                    </div>
                    @foreach($companies as $company)
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>@lang('messages.Contact Info')</h5>
                            <address class="s1">
                                <span><i class="id-color fa fa-map-marker fa-lg"></i>{{$company->address ?? ''}}</span>
                                <span><i class="id-color fa fa-phone fa-lg"></i>+(213){{$company->phone ?? ''}}</span>
                                <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="">{{$company->email ?? ''}}</a></span>
                            </address>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-3">
                        <h5>@lang('messages.Quick Links')</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="widget">
                                    <ul>
                                        <li><a href="#">@lang('messages.About')</a></li>
                                        <li><a href="#">@lang('messages.Blog')</a></li>
                                        <li><a href="#">@lang('messages.Careers')</a></li>
                                        <li><a href="#">@lang('messages.News')</a></li>
                                        <li><a href="#">@lang('messages.Partners')</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>@lang('messages.Social Network')</h5>
                            <div class="social-icons">
                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a>

                                <a href="#"><i class="fa fa-instagram fa-lg"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <a href="index.html">
                                        @lang('messages.Copyright') 2023 -  {{$company->companyName ?? ''}}
                                    </a>
                                </div>
                                <ul class="menu-simple">
                                    <li><a href="#">@lang('messages.Terms') &amp; Conditions</a></li>
                                    <li><a href="#">@lang('messages.Privacy Policy')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
