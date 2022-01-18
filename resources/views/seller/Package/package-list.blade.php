@extends('layouts.front')
@section('title', 'Buy Package')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('theme')}}/assets/css/packages_table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <style>
        .toast-info {
            background-color: green;
        }
        #toast-container > .toast-success {
            opacity: 1 !important;
        }
        #toast-container > .toast-error {
            opacity: 1 !important;
        }
    </style>
@endsection
@section('content')
    <section class="slider-area slider-2">
        <div class="single-slider-2 bg_cover" style="background-image: url({{ asset('theme') }}/assets/images/slider/slider-4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content-2">
                            <h2 class="main-title">{{siteSetting()['buy_package_text'] ?? ''}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="dealer-register-page pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="page-title">
                        <h4 class="title">{{siteSetting()['please_plan_text'] ?? ''}}</h4>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <a href="javascript:void(0);" class="main-btn logout-button"><i class="fa fa-sign-out"></i> {{siteSetting()['logout_text'] ?? ''}}</a>
                    <form method="POST" class="form-logout" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
            <div id="generic_price_table">   
                <section>
                    <div class="container">
                        
                        <!--BLOCK ROW START-->
                        <div class="row">
                            @foreach($plans as $plan)
                                <div class="col-md-4">
                                
                                  <!--PRICE CONTENT START-->
                                    <div class="generic_content clearfix">
                                        
                                        <!--HEAD PRICE DETAIL START-->
                                        <div class="generic_head_price clearfix">
                                        
                                            <!--HEAD CONTENT START-->
                                            <div class="generic_head_content clearfix">
                                            
                                              <!--HEAD START-->
                                                <div class="head_bg"></div>
                                                <div class="head">
                                                    <span>@if($plan->subscription_type=='1')
                                                            {{ siteSetting()['carpart_tab_text'] ?? '' }}
                                                        @elseif($plan->subscription_type=='2') 
                                                            {{ siteSetting()['scrapyard_tab_text'] ?? '' }}
                                                        @elseif($plan->subscription_type=='3') 
                                                            {{siteSetting()['plan_ultimate_text'] ?? ''}}
                                                        @endif</span>
                                                </div>
                                                <!--//HEAD END-->
                                                
                                            </div>
                                            <!--//HEAD CONTENT END-->
                                            
                                            <!--PRICE START-->
                                            <div class="generic_price_tag clearfix">
                                                <br>
                                                <span class="price">
                                                    <span class="sign">$</span>
                                                    <span class="currency">{{$plan->amount}}</span>
                                                    <span class="month">/
                                                        @if ($plan->interval=='month')
                                                            {{siteSetting()['plan_interval_month_text'] ?? ''}}
                                                        @elseif ($plan->interval=='year')
                                                            {{siteSetting()['plan_interval_year_text'] ?? ''}}
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>
                                            <!--//PRICE END-->
                                            
                                        </div>                            
                                        <!--//HEAD PRICE DETAIL END-->
                                        
                                        <!--FEATURE LIST START-->
                                        <div class="generic_feature_list">
                                            <p>{!! $plan->description !!}</p>
                                        </div>
                                        <!--//FEATURE LIST END-->
                                        
                                        <!--BUTTON START-->
                                        <div class="generic_price_btn clearfix">
                                            <form method="post" action="{{route('buy.package',['id'=>$plan->id])}}">
                                                @csrf
                                                <button type="submit">{{siteSetting()['buy_now_button_text'] ?? ''}}</button>
                                            </form>
                                        </div>
                                        <!--//BUTTON END-->
                                        
                                    </div>
                                    <!--//PRICE CONTENT END-->
                                        
                                </div>
                            @endforeach
                            
                            {{-- <div class="col-md-4">
                            
                              <!--PRICE CONTENT START-->
                                <div class="generic_content active clearfix">
                                    
                                    <!--HEAD PRICE DETAIL START-->
                                    <div class="generic_head_price clearfix">
                                    
                                        <!--HEAD CONTENT START-->
                                        <div class="generic_head_content clearfix">
                                        
                                          <!--HEAD START-->
                                            <div class="head_bg"></div>
                                            <div class="head">
                                                <span>Standard</span>
                                            </div>
                                            <!--//HEAD END-->
                                            
                                        </div>
                                        <!--//HEAD CONTENT END-->
                                        
                                        <!--PRICE START-->
                                        <div class="generic_price_tag clearfix">  
                                            <span class="price">
                                                <span class="sign">$</span>
                                                <span class="currency">199</span>
                                                <span class="cent">.99</span>
                                                <span class="month">/MON</span>
                                            </span>
                                        </div>
                                        <!--//PRICE END-->
                                        
                                    </div>                            
                                    <!--//HEAD PRICE DETAIL END-->
                                    
                                    <!--FEATURE LIST START-->
                                    <div class="generic_feature_list">
                                      <ul>
                                          <li><span>2GB</span> Bandwidth</li>
                                            <li><span>150GB</span> Storage</li>
                                            <li><span>12</span> Accounts</li>
                                            <li><span>7</span> Host Domain</li>
                                            <li><span>24/7</span> Support</li>
                                        </ul>
                                    </div>
                                    <!--//FEATURE LIST END-->
                                    
                                    <!--BUTTON START-->
                                    <div class="generic_price_btn clearfix">
                                      <a class="" href="">Sign up</a>
                                    </div>
                                    <!--//BUTTON END-->
                                    
                                </div>
                                <!--//PRICE CONTENT END-->
                                    
                            </div>
                            <div class="col-md-4">
                            
                              <!--PRICE CONTENT START-->
                                <div class="generic_content clearfix">
                                    
                                    <!--HEAD PRICE DETAIL START-->
                                    <div class="generic_head_price clearfix">
                                    
                                        <!--HEAD CONTENT START-->
                                        <div class="generic_head_content clearfix">
                                        
                                          <!--HEAD START-->
                                            <div class="head_bg"></div>
                                            <div class="head">
                                                <span>Unlimited</span>
                                            </div>
                                            <!--//HEAD END-->
                                            
                                        </div>
                                        <!--//HEAD CONTENT END-->
                                        
                                        <!--PRICE START-->
                                        <div class="generic_price_tag clearfix">  
                                            <span class="price">
                                                <span class="sign">$</span>
                                                <span class="currency">299</span>
                                                <span class="cent">.99</span>
                                                <span class="month">/MON</span>
                                            </span>
                                        </div>
                                        <!--//PRICE END-->
                                        
                                    </div>                            
                                    <!--//HEAD PRICE DETAIL END-->
                                    
                                    <!--FEATURE LIST START-->
                                    <div class="generic_feature_list">
                                      <ul>
                                          <li><span>2GB</span> Bandwidth</li>
                                            <li><span>150GB</span> Storage</li>
                                            <li><span>12</span> Accounts</li>
                                            <li><span>7</span> Host Domain</li>
                                            <li><span>24/7</span> Support</li>
                                        </ul>
                                    </div>
                                    <!--//FEATURE LIST END-->
                                    
                                    <!--BUTTON START-->
                                    <div class="generic_price_btn clearfix">
                                      <a class="" href="">Sign up</a>
                                    </div>
                                    <!--//BUTTON END-->
                                    
                                </div>
                                <!--//PRICE CONTENT END-->
                                    
                            </div> --}}
                        </div>  
                        <!--//BLOCK ROW END-->
                        
                    </div>
                </section>
            </div>        
        </div>

        </div>
    </section>

    @endsection
    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

        <script>
            toastr.success("Purchase any package to access dashboard");
        </script>
    @endsection

