@extends('layouts.front')
@section('title', 'Seller Profile')

@section('css')
    <style>
        .inventory_pane
        {
            /*border: 1px solid #d7dce6;*/
        }
        .theme_bg
        {
            background-color: #f5f6f6;
        }
    </style>
@endsection

@section('content')
    <section class="slider-area slider-2">
        <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content-2">
                            <h2 class="main-title">{{siteSetting()['profile_page_title'] ?? ''}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Dealer Details Start ======-->

    <section class="dealer-details-page">
        <div class="container">
            <div class="dealer-details-title-social d-lg-flex justify-content-between">
                <div class="dealer-title">
                    <h2 class="title">{{ $seller->user->name }}</h2>
                    <p></p>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-8">
                    <div class="dealer-details-content">
                        <div class="dealer-details-image">
                            <img src="assets/images/dealer-details.jpg" alt="">
                        </div>
                        <div class="details-content">
                            <div class="details-title">
                                <h3 class="title">{{siteSetting()['introduce_title'] ?? ''}}</h3>
                            </div>

                            <p>
                                @if($seller->introductio)

                                {!! $seller->introduction !!}

                                @else
                                    Where sales and service are made EASY! We are proud to be family owned and have served drivers from all over the state since 1989. In fact, it’s our straightforward, no stress shopping process that continues to bring our customers back for their second, third and fourth vehicles.Here you will find an incredible selection of pre-owned vehicles from a variety of brands including Lexus, Acura, Audi, Toyota, Honda, Ford, Mercedes-Benz and many more. At Carify Auto we specialize in one owner; pre-owned vehicles. We search the country looking for the finest vehicles to add to our inventory. At Carify Auto, only the very best will do for our customers.
                                @endif
                            </p>
                        </div>

                        <div class="details-inventory">
                            <div class="details-title">
                                <h3 class="title">{{siteSetting()['inventory_title'] ?? ''}}</h3>
                            </div>
                            <div class="cars-wrapper">
                                <div class="cars-tab-menu">
                                    <ul class="nav" role="tablist">
                                        @if($seller->subscription_type==3)
                                           <li><a class="active" data-toggle="tab" href="#scrap_yarded_cars" role="tab">{{ siteSetting()['seller_sidebar_menu_3'] ?? '' }}</a></li>
                                            <li><a data-toggle="tab" href="#car_parts" role="tab">{{ siteSetting()['seller_sidebar_menu_2'] ?? '' }} </a></li>
                                        @elseif($seller->subscription_type==2)
                                            <li><a class="active" data-toggle="tab" href="#scrap_yarded_cars" role="tab">{{ siteSetting()['seller_sidebar_menu_3'] ?? '' }}</a></li>
                                        @elseif($seller->subscription_type==1)
                                            <li><a class="active" data-toggle="tab" href="#car_parts" role="tab">{{ siteSetting()['seller_sidebar_menu_2'] ?? '' }} </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content content_row_adds mt-2 pb-5 theme_bg">
                                <div class="tab-pane fade active show" id="scrap_yarded_cars" role="tabpanel">
                                    <div class="row inventory_pane mt-3">
                                        @if(count($scrapYardAdvertisements)>0)
                                            @foreach($scrapYardAdvertisements as $scrapYard)
                                                <div class="col-md-4">
                                                    <div class="single-car-item-2 mt-50">
                                                        <div class="car-image">
                                                            <a href="{{ route('detail', $scrapYard->slug) }}">
                                                                @if(count($scrapYard->scrapYardImages)=='0')
                                                                <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg" alt="">
                                                                @else
                                                                    <img src="{{asset($scrapYard->scrapYardImages[0]->image)}}" alt="">
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
                                                            <h4 class="car-title"><a href="{{ route('detail', $scrapYard->slug) }}"> {{$scrapYard->carMake->name ?? '' }} {{$scrapYard->carModel->name ?? '' }} </a></h4>

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
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="car_parts" role="tabpanel">
                                    <div class="row inventory_pane mt-3">
                                        @if(count($carPartAdvertisements)>0)
                                            @foreach($carPartAdvertisements as $carPart)
                                                <div class="col-md-4">
                                                    <div class="single-car-item-2 mt-50">
                                                        <div class="car-image">

                                                            <a href="{{ route('detail', $carPart->slug) }}">
                                                                @if(count($carPart->carPartImages)=='0')
                                                                    <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg" alt="" style="width:321px;height: 195px;">
                                                                @else
                                                                    <img src="{{asset($carPart->carPartImages[0]->image)}}" alt="" style="width:321px;height: 195px;">
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
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="inventory-more">
                            </div>
                        </div>
                        
                        
                            <div class="details-review">
                            <div class="details-title">
                                <h3 class="title">{{siteSetting()['reviews_title_text'] ?? ''}}</h3>
                            </div>

                            <div class="consumer-reviews">    
                                <div class="point-rating">
                                    <div class="rating-score">
                                        <h5 class="score-title">{{siteSetting()['average_rating_text'] ?? ''}}</h5>
                                        <span class="score-point">{{ $average_star }}</span>
                                        <div class="score-star">
                                            <ul class="star">
                                                @for($i=1;$i<5;$i++)
                                                    <li class="@if($i<=$average_star) rating-on @endif"><i class="ion-android-star"></i></li>
                                                @endfor
                                                <li><i class="ion-android-star"></i></li>
                                            </ul>
                                            <span>({{ $total_reviews }} {{siteSetting()['reviews_title_text'] ?? ''}})</span>
                                        </div>
                                    </div>
    
                                    <div class="rating-progress">
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>5 {{siteSetting()['star_text'] ?? ''}}</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $five_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $five_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>4 {{siteSetting()['star_text'] ?? ''}}</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $four_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $four_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>3 {{siteSetting()['star_text'] ?? ''}}</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $three_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $three_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>2 {{siteSetting()['star_text'] ?? ''}}</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $two_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $two_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>1 {{siteSetting()['star_text'] ?? ''}}</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $one_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $one_star_percent  }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="reviews-comment">
                                    <ul class="reviews-comments-items">
                                        @foreach($review_list as $review)
                                            <li>
                                                <div class="single-reviews-comment">
                                                    <div class="comment-content">
                                                        <div class="rating-name">
                                                            <ul class="author-rating">
                                                                @for($i=1;$i<=5;$i++)
                                                                    <li class="@if($i<=$review->stars)rating-on @endif"><i class="ion-android-star"></i></li>
                                                                @endfor
                                                            </ul>
                                                            <div class="author-name">
                                                                <h4 class="name">{{$review->subject}}</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="meta">
                                                            <li>by <a href="javascript:void(0);">{{$review->name}}</a></li>
                                                            <li>{{ $review->created_at->diffForHumans() }}</li>
                                                        </ul>
                                                        <p>{{$review->review}}</p>
                                                        <!-- <a href="#" class="replay">Replay</a> -->
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
    
                                    <div class="more-reviews">
                                        @if($total_reviews > 4 && !isset(request()->reviews))
                                            <a href="{{ request()->url }}?reviews=all" class="more">{{siteSetting()['see_more_reviews_text'] ?? ''}} ({{ $total_reviews-4 }}) <i class="ion-ios-arrow-down"></i></a>
                                        @endif
                                    </div>
                                </div>
                                @auth
                                    <div class="reviews-form">
                                        <form class="review_submission_form" action="{{ route('review.save') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="stars" class="star_input" value="">
                                            <input type="hidden" name="user_id" value="{{ $seller->user_id }}">
                                            <h4 class="form-title">{{siteSetting()['review_form_title_text'] ?? ''}}</h4>
        
                                            <div class="your-rating">
                                                <p>{{siteSetting()['star_rating_label_text'] ?? ''}}</p>
                                                <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class="ion-android-star"></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class="ion-android-star"></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class="ion-android-star"></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class="ion-android-star"></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class="ion-android-star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            @error('stars')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror

                                            <div class="form-input-items">
                                                <div class="row gx-4">
                                                    <div class="col-md-4">
                                                        <div class="single-input">
                                                            <input type="text" name="name" placeholder="{{siteSetting()['profile_full_name_label'] ?? ''}}" required>
                                                            @error('name')
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="single-input">
                                                            <input type="email" name="email" placeholder="{{siteSetting()['profile_email_label'] ?? ''}}" required>
                                                            @error('email')
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="single-input">
                                                            <input type="text" name="subject" placeholder="{{siteSetting()['review_form_subject_text'] ?? ''}}" required>
                                                            @error('subject')
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <textarea name="review" placeholder="{{siteSetting()['review_form_email_text'] ?? ''}}"></textarea required>
                                                            @error('review')
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <button class="main-btn">{{siteSetting()['submit_review_btn_text'] ?? ''}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-md-12 mt-3">
                                        <div class="single-input">
                                            <a href="{{ route('login') }}" class="main-btn">{{siteSetting()['login_to_review_button'] ?? ''}}</a>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-dealer-info">
                            <div class="dealer-title">
                                <h4 class="sidebar-title">{{siteSetting()['seller_info_title'] ?? ''}}</h4>
                            </div>
                            <div class="dealer-info">
                                <div class="dealer-profile">
                                    <div class="profile-image">
                                        <img src="{{ asset($seller->picture) }}" width="65" alt="">
                                    </div>
                                    <div class="profile-content">
                                        <h5 class="name"><a href="{{ route('seller_profile',$seller->user->id) }}">{{ $seller->user->name }}</a> @if($seller->is_certified) <img src="{{ asset('theme') }}/assets/images/certified.png" width="80" alt=""> @endif</h5>
                                        <div class="profile-rating">
                                            <ul class="star">
                                                @for($i=1;$i<=5;$i++)
                                                    <span class="fa fa-star @if($i<=$average_star) star-checked @endif"></span>
                                                @endfor
                                            </ul>
                                            <span>({{ ceil($average_star) }} Rating)</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="info-items">
                                    <li>
                                        <i class="ion-ios-location"></i>
                                        <span>{{ $seller->street_address }}, {{ $seller->city }}, {{$seller->state}}</span>
                                    </li>
                                    <li>
                                        <i class="ion-ios-telephone"></i>
                                        <span><a class="call" href="tel:{{$seller->phone}}">{{$seller->phone}}</a></span>
                                    </li>
                                    <li>
                                        <i class="ion-android-mail"></i>
                                        <span><a href="mailto:{{$seller->email}}">{{$seller->user->email}}</a></span>
                                    </li>
                                    <li>
                                        <i class="ion-android-globe"></i>
                                        <span>
                                            @if($seller->website)
                                                <a class="site" target="_blank" href="{{ $seller->website }}">{{ $seller->website }}</a>
                                            @else
                                                N/A
                                            @endif
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-banner">
                            <a href="#">
                                <img src="assets/images/banner-1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Dealer Details Ends ======-->
@endsection

@section('js')

    
    <script>
        $(document).on("click",".star",function(){
            var star=$(this).attr('data-value');
            $(".star_input").val(star);
        });
    </script>

@endsection