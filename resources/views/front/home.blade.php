@extends('layouts.front')
@section('title', 'Home')
@section('content')
<!--====== Slider Start ======-->

<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }}); background-blend-mode: multiply; background-color: #666666;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ siteSetting()['banner_heading'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
            <div class="search-box-wrapper-2">
                <div class="search-header d-md-flex align-items-center justify-content-between">
                    <div class="search-title-field d-lg-flex align-items-center">
                        <h3 class="title">{{siteSetting()['search_using_title'] ?? ''}}</h3>
                        <div class="search-field">
                            <div class="search-field-radio">
                                <input name="search-radio" class="search-radio" value="3" type="radio" id="radio3" checked>
                                <label for="radio3"><span>{{siteSetting()['search_tab_manual'] ?? ''}}</span></label>
                            </div>
                            <div class="search-field-radio">
                                <input name="search-radio" class="search-radio" value="1" type="radio" id="radio1" >
                                <label for="radio1"><span>{{siteSetting()['search_tab_carplate_no'] ?? ''}}</span></label>
                            </div>
                            {{-- <div class="search-field-radio">
                                <input name="search-radio" class="search-radio" value="2" type="radio" id="radio2">
                                <label for="radio2"><span>{{siteSetting()['search_tab_vin_no'] ?? ''}}</span></label>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <form action="{{ route('search') }}" method="GET" class="manual">
                    <div class="search-body">
                        <div class="search-form-wrapper d-flex flex-wrap align-items-end">
                            <div class="search-field">
                                <div class="row">
                                    <div class="single-field col-lg-4 col-sm-6">
                                        <label class="field-label">{{siteSetting()['search_filter_one_title'] ?? ''}}</label>
                                        <select class="optgroup_test" name="make" id="car_make">
                                            <option value="all">{{siteSetting()['search_filter_one_placeholder'] ?? ''}}</option>
                                            @foreach($maker as $make)
                                            <option value="{{$make->id_car_make}}">{{$make->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="single-field col-lg-4 col-sm-6">
                                        <label class="field-label">{{siteSetting()['search_filter_two_title'] ?? ''}}</label>
                                        <select class="optgroup_test" name="model" id="car_model" disabled="true">
                                            <option value="all">{{siteSetting()['search_filter_two_placeholder'] ?? ''}}</option>
                                            @foreach($models as $model)
                                                <option value="{{$model->id_car_model}}">{{$model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="single-field col-lg-4 col-sm-6">
                                        <label class="field-label">{{siteSetting()['search_filter_three_title'] ?? ''}}</label>
                                        <select id="car_trim" disabled="true" class="optgroup_test" name="trim">
                                            <option value="all">{{siteSetting()['search_filter_three_placeholder'] ?? ''}}</option>
                                            @foreach($trims as $trim)
                                            <option value="{{$trim->id_car_trim}}">{{$trim->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="single-field col-lg-3 col-sm-6 d-none">
                                        <label class="field-label">{{siteSetting()['search_filter_four_title'] ?? ''}}</label>

                                        <select class="optgroup_test" name="price">
                                            <option value="">{{siteSetting()['search_filter_four_placeholder'] ?? ''}}</option>
                                            <option value="3000-5000">$3,000-$5,000</option>
                                            <option value="10000-15000">$10,000-$15,000</option>
                                            <option value="20000-25000">$20,000-$25,000</option>
                                            <option value="30000-35000">$30,000-$35,000</option>
                                            <option value="40000-45000">$40,000-$45,000</option>
                                            <option value="50000-60000">$50,000-$60,000</option>
                                            <option value="80000-100000">$80,000-$100,000</option>
                                            <option value="125000-150000">$125,000-$150,000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="search-btn">
                                <button type="submit" class="main-btn btn-block">{{siteSetting()['search_filter_button_text'] ?? ''}}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ route('search') }}" method="GET" class="car-plate-number" style="display: none;">
                    <div class="search-body">
                        <div class="search-form-wrapper d-flex flex-wrap align-items-end">
                            <div class="search-field">
                                <div class="row">
                                    <div class="api-field red-border is-invalid car-plate-api col-lg-4 col-sm-6">
                                        <input type="text" class="kentekenplaat" id="plate" name="plate_number" maxlength="8" placeholder="CA-RT-L1" autocomplete="off">
                                        <span class="error-icon" style="display: none;"><i class="fa fa-exclamation-triangle"></i></span>
                                    </div>
                                    <div class="single-field car-plate-remain col-lg-4 col-sm-6" style="display: none">
                                        <label class="field-label">{{siteSetting()['search_filter_one_title'] ?? ''}}</label>
                                        <input type="text" name="make" class="car_plate_make" placeholder="" readonly autocomplete="off"/>
                                    </div>
                                    <div class="single-field car-plate-remain col-lg-4 col-sm-6" style="display: none">
                                        <label class="field-label">{{siteSetting()['search_filter_two_title'] ?? ''}}</label>
                                        <input type="text" name="model" class="car_plate_model" placeholder="" readonly autocomplete="off"/>
                                    </div>
                                    {{-- <div class="single-field car-plate-remain col-lg-3 col-sm-6" style="display: none">
                                        <label class="field-label">{{siteSetting()['search_filter_three_title'] ?? ''}}</label>
                                        <input type="text" name="trim" class="car_plate_trim" placeholder="" readonly autocomplete="off"/>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="search-btn">
                                <button type="submit" class="main-btn btn-block">{{siteSetting()['search_filter_button_text'] ?? ''}}</button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <form action="{{ route('search') }}" method="GET" class="vin-number" style="display: none;">
                    <div class="search-body">
                        <div class="search-form-wrapper d-flex flex-wrap align-items-end">
                            <div class="search-field">
                                <div class="row">
                                    <div class="single-field api-field vin-api col-lg-3 col-sm-6">
                                        <label class="field-label">{{siteSetting()['search_tab_vin_no'] ?? ''}} </label>
                                        <input type="text" name="vin_number" placeholder="3N1AB7AP7JY274759"  autocomplete="off"/>
                                        <span class="submit-api" style="display: none;"><i class="fa fa-search"></i></span>
                                    </div>
                                    <div class="single-field col-lg-3 col-sm-6" style="display: none;">
                                        <label class="field-label">{{siteSetting()['search_filter_one_title'] ?? ''}}</label>
                                        <input type="text" name="make" placeholder=""  readonly autocomplete="off"/>
                                    </div>
                                    <div class="single-field col-lg-3 col-sm-6" style="display: none;">
                                        <label class="field-label">{{siteSetting()['search_filter_two_title'] ?? ''}}</label>
                                        <input type="text" name="model" placeholder=""  readonly autocomplete="off"/>
                                    </div>
                                    <div class="single-field col-lg-3 col-sm-6" style="display: none;">
                                        <label class="field-label">{{siteSetting()['search_filter_three_title'] ?? ''}}</label>
                                        <input type="text" name="trim" placeholder=""  readonly autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                            <div class="search-btn">
                                <button type="submit" class="main-btn btn-block">{{siteSetting()['search_filter_button_text'] ?? ''}}</button>
                            </div>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</section>

<!--====== Slider Ends ======-->

<!--====== How It Work Start ======-->

<section class="how-work-area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-2 pb-10">
                    <h2 class="title">{{siteSetting()['home_how_work_section_title'] ?? ''}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-work d-sm-flex mt-50">
                    <div class="work-icon">
                        <i class="ion-android-search"></i>
                        <span class="number">1</span>
                    </div>
                    <div class="work-content">
                        <h4 class="title">{{ siteSetting()['how_work_heading_1'] ?? '' }}</h4>
                        <p>{{ siteSetting()['how_work_description_1'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-work d-sm-flex mt-50">
                    <div class="work-icon">
                        <i class="ion-android-checkmark-circle"></i>
                        <span class="number">2</span>
                    </div>
                    <div class="work-content">
                        <h4 class="title">{{ siteSetting()['how_work_heading_2'] ?? '' }}</h4>
                        <p>{{ siteSetting()['how_work_description_2'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-work d-sm-flex mt-50">
                    <div class="work-icon">
                        <i class="ion-android-calendar"></i>
                        <span class="number">3</span>
                    </div>
                    <div class="work-content">
                        <h4 class="title">{{ siteSetting()['how_work_heading_3'] ?? '' }}</h4>
                        <p>{{ siteSetting()['how_work_description_3'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== How It Work Ends ======-->

<!--====== Cars Start ======-->

<section class="cars-2-area pt-5 pb-5 news-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-2">
                    <h2 class="title">{{ siteSetting()['home_ads_section_title'] ?? '' }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="cars-wrapper">
        <div class="container">
            <div class="cars-tab-menu">
                <ul class="nav" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#scrap_yarded_cars" role="tab">{{ siteSetting()['seller_sidebar_menu_3'] ?? '' }}</a></li>
                    <li><a data-toggle="tab" href="#car_parts" role="tab">{{ siteSetting()['seller_sidebar_menu_2'] ?? '' }} </a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="scrap_yarded_cars" role="tabpanel">
                    <div class="row car-row">

                        @foreach($scrapYardAdvertisements as $scrapYard)

                            <div class="car-col col-lg-3">
                                <div class="single-car-item-2 mt-50">
                                    <div class="car-image">

                                        <a href="{{ route('detail', $scrapYard->slug) }}">
                                            @if(count($scrapYard->scrapYardImages)=='0')
                                                <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg" alt="">
                                            @else
                                            <img src="{{asset($scrapYard->scrapYardImages[0]->image)}}" alt="" style="width: 255px;height: 154.91px;">
                                            @endif
                                        </a>
                                        <ul class="car-meta">
                                            <li>
                                                <a href="{{ route('user.advertisement.favourite',['id'=>$scrapYard->id,'type'=>'1']) }}">
                                                    <button type="button">
                                                    <i class="ion-android-favorite-outline"></i>
                                                    <span class="car-tooltip favourite">{{siteSetting()['add_to_fav_text'] ?? ''}}</span>
                                                    </button>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    <div class="car-content">
                                    <span class="price">
                                        <span class="sale-price">${{ $scrapYard->price ?? '' }}</span>
                                    </span>
                                        <span class="body-type"><a href="{{ route('detail', $scrapYard->slug) }}">{{$scrapYard->carMake->name}}</a></span>
                                        <h4 class="car-title"><a href="{{ route('detail', $scrapYard->slug) }}"> {{$scrapYard->carMake->name ?? ''}} {{$scrapYard->carModel->name ?? ''}} </a></h4>

                                        <div class="author-meta">
                                            <span><i class="ion-android-person"></i> {{siteSetting()['dealer_text'] ?? ''}}:  <a href="{{ route('seller_profile',$scrapYard->user->id) }}">{{$scrapYard->user->name}}</a></span>
                                        </div>
                                        <div class="author-meta detail_button">
                                            <a class="main-btn" href="{{ route('detail',$scrapYard->slug) }}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="car-col col-lg-12 mt-3">
                            <a class="main-btn float-right" href="{{ route('search',['show'=>'scrapyard']) }}">All Advertisements</a>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="car_parts" role="tabpanel">
                    <div class="row car-row">
                        @foreach($carPartAdvertisements as $carPart)
                        <div class="car-col col-lg-3">
                            <div class="single-car-item-2 mt-50">
                                <div class="car-image">

                                    <a href="{{ route('detail', $carPart->slug) }}">
                                        @if(count($carPart->carPartImages)=='0')
                                            <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg" alt="">
                                        @else
                                            <img src="{{asset($carPart->carPartImages[0]->image)}}" alt="" style="width: 255px;height: 154.91px;">
                                        @endif                                    
                                    </a>
                                    <ul class="car-meta">
                                        <li>
                                            <a href="{{ route('user.advertisement.favourite',['id'=>$carPart->id,'type'=>'2']) }}">
                                                <button type="button">
                                                <i class="ion-android-favorite-outline"></i>
                                                <span class="car-tooltip favourite">{{siteSetting()['add_to_fav_text'] ?? ''}}</span>
                                                </button>
                                            </a>    
                                        </li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <span class="price">
                                        <span class="price-amount">${{ $carPart->price ?? '' }}</span>
                                    </span>
                                    <span class="body-type"><a href="{{ route('detail', $carPart->slug) }}">{{ $carPart->carMake->name }}</a></span>
                                    <h4 class="car-title"><a href="{{ route('detail', $carPart->slug) }}">{{ $carPart->carMake->name ?? '' }} {{ $carPart->carModel->name ?? '' }}</a> <i class="ion-android-checkmark-circle"></i></h4>

                                    <div class="author-meta">
                                        <span><i class="ion-android-person"></i> {{siteSetting()['dealer_text'] ?? ''}}:  <a href="{{ route('seller_profile',$carPart->user->id) }}">{{$carPart->user->name}}</a></span>
                                    </div>
                                    <div class="author-meta detail_button">
                                        <a class="main-btn" href="{{ route('detail',$carPart->slug) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="car-col col-lg-12 mt-3">
                            <a class="main-btn float-right" href="{{ route('search',['show'=>'carpart']) }}">All Advertisements</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== Cars Ends ======-->


<!--====== Testimonial Brand 2 Start ======-->

<section class="testimonial-brand-area-2 pt-5 pb-5">
    <div class="testimonial-area pt-2 pb-2">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-2">
                        <h2 class="title">{{ siteSetting()['home_testimonial_section_title'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-wrapper">
                <div class="testimonial-content-active">
                    @foreach($testimonial_list as $item)
                        <div class="single-testimonial-content">
                            <div class="title-rating d-flex align-items-center">
                                <h3 class="testimonial-title">
                                    @if($item->rating==5)
                                    Excellent
                                    @elseif($item->rating==4)
                                    Very Good
                                    @elseif($item->rating==3)
                                    Good
                                    @elseif($item->rating==2)
                                    Fair
                                    @else
                                    Inspiration
                                    @endif
                                </h3>
                                <ul class="testimonial-rating d-flex">
                                    @for($i=1;$i<=5;$i++)
                                        <li class="@if($i<=$item->rating) rating-on @endif"><i class="ion-ios-star"></i></li>
                                    @endfor
                                </ul>
                            </div>
                            <p>{!! $item->review !!}</p>
                        </div>
                    @endforeach
                    
                </div>

                <div class="testimonial-author-active">
                    @foreach($testimonial_list as $item)
                        <div class="single-testimonial-author d-flex align-items-center">
                            <div class="author-image">
                                <img src="{{ asset($item->image) }}" width="64" height="63" alt="">
                            </div>
                            <div class="author-content media-body">
                                <h4 class="author-name">{{ $item->name }}</h4>
                                <div class="designation">{!! \Str::limit($item->review, 20) !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="testimonial-more">
                <!-- <a class="more" href="#">@lang('site.see_all_reviews') <i class="ion-ios-arrow-right"></i></a> -->
            </div>
        </div>
    </div>
</section>

<!--====== Testimonial Brand 2 Ends ======-->

<!--====== News Start ======-->

<section class="news-area news-bg pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-2">
                    <h2 class="title">{{ siteSetting()['home_reviews_section_title'] ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="news-wrapper">
            <div class="row">
                @foreach($blog_list as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-news mt-50">
                            <div class="news-image">
                                <a href="{{ route('blog.detail', $item->slug) }}">
                                    <img src="{{ asset($item->image) }}" alt="" width="370" height="230">
                                </a>
                            </div>
                            <div class="news-content">
                                <h3 class="news-title"><a href="{{ route('blog.detail', $item->slug) }}">{{ $item->title }}</a></h3>
                                <div class="news-meta">
                                    <span class="meta-cat"><a href="javascript:void(0);">{{ $item->written_by }}</a></span>
                                    <span class="meta-date"><a href="#">{{ $item->created_at->diffForHumans() }}</a></span>
                                </div>
                                <p>{{ \Str::limit(html_entity_decode(strip_tags($item->description)), "100", '...') }} @if(strlen(html_entity_decode(strip_tags($item->description))) >= 100) <a href="{{ route('blog.detail', $item->slug) }}" target="_blank" class="font-weight-bold">Read More</a> @endif</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!--====== News Ends ======-->

<!--====== Call To Action Start ======-->

<section class="call-to-action-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="call-to-action-content">
                    <h2 class="title">{{ siteSetting()['ads_heading'] ?? '' }}</h2>
                    <p>{{ siteSetting()['ads_description'] ?? '' }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="call-to-action-btn text-lg-right">
                    <ul>
                        <li><a class="main-btn main-btn-2" href="#">{{ siteSetting()['become_vendor_learn_button'] ?? '' }}</a></li>
                        <li><a class="main-btn main-btn-3" href="{{ route('seller.register') }}"><i class="ion-model-s"></i>{{ siteSetting()['become_vendor_find_car_button'] ?? '' }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== Call To Action Ends ======-->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(".search-radio").change(function (e) {
                e.preventDefault();
                var val = $(this).val();
                if (val == 1) {
                    $(".car-plate-number").show();
                    $(".vin-number").hide();
                    $(".manual").hide();
                }
                if(val == 2) {
                    $(".car-plate-number").hide();
                    $(".manual").hide();
                    $(".vin-number").show();
                }
                if(val == 3) {
                    $(".car-plate-number").hide();
                    $(".vin-number").hide();
                    $(".manual").show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            new Kentekenplaat();
        });
        $(document).ready(function(){

            $('#car_make').on('change', function(){
                console.log('stop');
                var id = this.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('car.part.model') }}/"+id,
                    method: "GET",
                    success: function(data) {
                        console.log(data);
                        if(data[1] > 0)
                        {
                            console.log('grater');
                            $('#car_model')[0].sumo.unload();
                            $('#car_model').html('<option value="all">All Models</option>');
                            $('#car_model').append(data[0]);
                            $('#car_model').attr('disabled',false);
                            $('#car_model').SumoSelect();
                        }
                        else{
                            $("#car_model").html("");
                        }
                    }
                });
            });

            $('#car_model').on('change', function(){

                var id = this.value;
                $.ajax({
                    url: "{{ route('car.part.trim') }}/"+id,
                    method: "GET",
                    success: function(data) {
                        if(data[1] > 0)
                        {
                            console.log(data);
                            $('#car_trim')[0].sumo.unload();

                            $('#car_trim').html('<option value="all">All Trim</option>');
                            $('#car_trim').append(data[0]);
                            $('#car_trim').attr('disabled',false);
                            $('#car_trim').SumoSelect();
                            console.log('end');


                        } else{
                            $("#car_trim").html("");

                        }
                    }
                });
            });

        });
    </script>
@endsection

