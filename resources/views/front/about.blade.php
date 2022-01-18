@extends('layouts.front')
@section('title', 'About')
@section('content')
<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ siteSetting()['about_banner_section_title'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="choose-area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2 class="title">{{ siteSetting()['about_why_choose_us_title'] ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="choose-wrapper pt-20">
            <div class="row">
                <div class="col-lg-4 cal-md-6">
                    <div class="single-choose d-md-flex">
                        <div class="choose-icon">
                            <i class="ion ion-social-usd"></i>
                            <span class="number">1</span>
                        </div>
                        <div class="choose-content flex-shrink-1">
                            <h4 class="title">{{ siteSetting()['why_choose_heading_1'] ?? '' }}</h4>
                            <p>{{ siteSetting()['why_choose_description_1'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 cal-md-6">
                    <div class="single-choose d-md-flex">
                        <div class="choose-icon">
                            <i class="ion ion-calculator"></i>
                            <span class="number">2</span>
                        </div>
                        <div class="choose-content flex-shrink-1">
                            <h4 class="title">{{ siteSetting()['why_choose_heading_2'] ?? '' }}</h4>
                            <p>{{ siteSetting()['why_choose_description_2'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 cal-md-6">
                    <div class="single-choose d-md-flex">
                        <div class="choose-icon">
                            <i class="ion ion-calculator"></i>
                            <span class="number">3</span>
                        </div>
                        <div class="choose-content flex-shrink-1">
                            <h4 class="title">{{ siteSetting()['why_choose_heading_3'] ?? '' }}</h4>
                            <p>{{ siteSetting()['why_choose_description_3'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dealership-area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="dealership-content">
                    <h4 class="sub-title">{{ siteSetting()['auto_center_section_main_title'] ?? '' }}</h4>
                    <h2 class="main-title">{{ siteSetting()['auto_center_section_title'] ?? '' }}</h2>
                    <p>{{ siteSetting()['auto_center_section_description'] ?? '' }}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dealership-counter d-flex justify-content-around">
                    <div class="dealership-counter-items">
                        <div class="single-counter-item">
                            <span class="count">{{ siteSetting()['auto_center_right_title_1'] ?? '' }}</span>
                            <p>{{ siteSetting()['auto_center_right_description_1'] ?? '' }}</p>
                        </div>
                        <div class="single-counter-item">
                            <span class="count">{{ siteSetting()['auto_center_right_title_3'] ?? '' }}</span>
                            <p>{{ siteSetting()['auto_center_right_description_3'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="dealership-counter-items">
                        <div class="single-counter-item">
                            <span class="count">{{ siteSetting()['auto_center_right_title_2'] ?? '' }}</span>
                            <p>@lang('site.plus_text')</p>
                        </div>
                        <div class="single-counter-item">
                            <span class="count">{{ siteSetting()['auto_center_right_title_4'] ?? '' }}</span>
                            <p>{{ siteSetting()['auto_center_right_description_4'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

@endsection
