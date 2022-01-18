@extends('layouts.front')
@section('title', $slug)
@section('css')
<link href="{{asset('seller/slider/style.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css'><link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <style>
        .single-image-thumb.slick-slide.slick-current{
            width: 87px!important;
        }
        .single-image-thumb.slick-slide.slick-active{
            width: 87px!important;
        }
        .sizing{
            font-size: 12px!important;
            letter-spacing: 0px!important;
            padding: 0 10px!important;
            height: 35px!important;
            line-height: 38px!important;
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
                        <h2 class="main-title">{{ $data->carMake->name ?? '' }} {{ $data->carModel->name ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inventory-single-area">
    <div class="container">
        <div class="inventory-single-content ">
            <div class="row justify-content-between">
                <div class="col-lg-8">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        @if($is_carpart)
                            <div class="card p-4" style="background-color: #f5f6f6;border-radius: 7px;">
                                <div class="card-header">
                                    <h4>{{$data->carMake->name}} {{$data->carModel->name}} {{$data->carTrim->name ?? ''}}</h4>
                                    <div class="row mt-3">
                                        <div class="col-md-4"><span><i class="ion-android-favorite-outline"></i>
                                            {{count(\App\Models\FavouriteAdvertisement::where('car_part_advertisement_id',$data->id)->get())}}  x {{siteSetting()['add_to_fav_text'] ?? ''}}
                                            </span>
                                        </div>
                                        <div class="col-md-4"><span><i class="fa fa-tachometer mr-2"></i>
                                           Sinds {{$data->created_at->format('d M Y H:m')}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body mt-4">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <a href="{{ route('user.advertisement.favourite',['id'=>$data->id,'type'=>'2']) }}"  class="main-btn sizing float-left">
                                                <i class="ion-android-favorite-outline"></i>
                                                <span class="car-tooltip favourite">{{siteSetting()['add_to_fav_text'] ?? ''}}</span>
                                            </a>
                                            <h6 class="float-right pt-2">${{number_format($data->price,2)}}</h6>
                                        </div>
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach($data->carPartImages as $image)

                                            <div class="carousel-item @if($loop->iteration-1==0) active @endif" data-slide-number="{{$loop->iteration-1}}">
                                                @if(is_video($image->image))
                                                    <video controls loop style="height: 400px;width:100%;">
                                                        <source src="{{asset($image->image)}}" type="video/mp4">
                                                    </video>
                                                @else
                                                    <img src="{{ asset($image->image) }}" data-remote="{{ asset($image->image) }}" style="height: 400px; width: 100%!important;" alt="">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @if(count($data->carPartImages)>6)
                                                <div class="carousel-item active">
                                                    <div class="row mx-0">
                                                        @for($i=0;$i<6;$i++)
                                                            <div id="carousel-selector-{{$i}} " class="thumb col-4 col-sm-2 px-1 py-2 @if($i==0) selected @endif" data-target="#myCarousel" data-slide-to="{{$i}}">
                                                                @if(is_video($data->carPartImages[$i]->image))
                                                                    <video controls loop style="height: 400px;width:100%;">
                                                                        <source src="{{asset($image->image)}}" type="video/mp4">
                                                                    </video>
                                                                @else
                                                                    <img src="{{ asset($data->carPartImages[$i]->image) }}" style="height: 90px;width: 100%; " alt="">
                                                                @endif
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row mx-0">  <div class="col-2 px-1 py-2"></div>
                                                        <div class="col-2 px-1 py-2"></div>
                                                        @if($data->scrapYardImages)
                                                            @for($i=6;$i<count($data->scrapYardImages);$i++)
                                                                <div id="carousel-selector-{{$i}} " class="thumb col-4 col-sm-2 px-1 py-2 @if($i==0) selected @endif" data-target="#myCarousel" data-slide-to="{{$i}}">
                                                                    <img src="@if(is_video($image->image)) {{ asset('images/thumbnail.png') }} @else {{ asset($image->image) }} @endif" style="height: 90px;width: 100%; " alt="">
                                                                </div>
                                                            @endfor
                                                        @endif
                                                        <div class="col-2 px-1 py-2"></div>
                                                        <div class="col-2 px-1 py-2"></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="carousel-inner">
                                                    @foreach($data->carPartImages as $image)
                                                        <div class="carousel-item " data-slide-number="{{$loop->iteration-1}}">
                                                            <img src="{{ asset($image->image) }}"  class="d-block w-100" alt="..."  data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                                        </div>

                                                    @endforeach
                                                </div>
                                                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div class="row mx-0">
                                                                @foreach($data->carPartImages as $image)
                                                                    <div id="carousel-selector-{{$loop->iteration-1}}" class="thumb col-4 col-sm-2 px-1 py-2 " data-target="#myCarousel" data-slide-to="{{$loop->iteration-1}}">
                                                                        <img src="@if(is_video($image->image)) {{ asset('images/video_thumbnail.png') }} @else {{ asset($image->image) }} @endif" style="height: 90px;width: 100%; " alt="">
                                                                    </div>
                                                                @endforeach
                                                                <div class="col-2 px-1 py-2"></div>
                                                                <div class="col-2 px-1 py-2"></div>
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        @else
                            <div class="card p-4" style="background-color: #f5f6f6;border-radius: 7px;">
                                <div class="card-header">
                                    <h4>{{$data->carMake->name}} {{$data->carModel->name}} {{$data->carTrim->name ?? ''}}</h4>
                                    <div class="row mt-3">
                                        <div class="col-md-4"><span><i class="ion-android-favorite-outline"></i>
                                            {{count(\App\Models\FavouriteAdvertisement::where('scrap_yard_advertisement_id',$data->id)->get())}}  x {{siteSetting()['add_to_fav_text'] ?? ''}}
                                            </span>
                                        </div>
                                        <div class="col-md-4"><span><i class="fa fa-tachometer mr-2"></i>
                                           Sinds {{$data->created_at->format('d M Y H:m')}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body mt-4">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <a href="{{ route('user.advertisement.favourite',['id'=>$data->id,'type'=>'1']) }}" class="main-btn sizing float-left">
                                                    <i class="ion-android-favorite-outline"></i>
                                                    <span class="car-tooltip favourite">{{siteSetting()['add_to_fav_text'] ?? ''}}</span>
                                                </a>
                                                <h6 class="float-right pt-2">${{number_format($data->price,2)}}</h6>
                                            </div>
                                        </div>
                                    <div class="carousel-inner">
                                        @foreach($data->scrapYardImages as $image)

                                            <div class="carousel-item @if($loop->iteration-1==0) active @endif" data-slide-number="{{$loop->iteration-1}}">
                                                @if(!is_video($image->image))
                                                    <img src="@if(is_video($image->image)) {{ asset('images/video_thumbnail.png') }} @else {{ asset($image->image) }} @endif" data-remote="@if(is_video($image->image)) {{ asset('images/video_thumbnail.png') }} @else {{ asset($image->image) }} @endif" style="height: 400px; width: 100%!important;" alt="">
                                                @else
                                                    <video controls loop style="height: 400px;width:100%;">
                                                        <source src="{{asset($image->image)}}" type="video/mp4">
                                                    </video>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @if(count($data->scrapYardImages)>6)
                                                <div class="carousel-item active">
                                                    <div class="row mx-0">
                                                        @for($i=0;$i<6;$i++)
                                                            <div id="carousel-selector-{{$i}} " class="thumb col-4 col-sm-2 px-1 py-2 @if($i==0) selected @endif" data-target="#myCarousel" data-slide-to="{{$i}}">
                                                                @if(is_video($data->scrapYardImages[$i]->image))
                                                                    <video controls loop>
                                                                         <source src="{{ $data->scrapYardImages[$i]->image ?? '' }}" data-remote="{{ asset($data->scrapYardImages[$i]->image) }}" style="height: 90px;width: 100%; " type="video/mp4">
                                                                    </video>       
                                                                @else
                                                                    <img src="{{ asset($data->scrapYardImages[$i]->image) }}" style="height: 90px;width: 100%; " alt="">
                                                                @endif

                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <div class="row mx-0">  <div class="col-2 px-1 py-2"></div>
                                                        <div class="col-2 px-1 py-2"></div>
                                                        @for($i=6;$i<count($data->scrapYardImages);$i++)
                                                            <div id="carousel-selector-{{$i}} " class="thumb col-4 col-sm-2 px-1 py-2 @if($i==0) selected @endif" data-target="#myCarousel" data-slide-to="{{$i}}">
                                                                <img src="@if(is_video($image->image)) {{ asset('images/video_thumbnail.png') }} @else {{ asset($image->image) }} @endif" style="height: 90px;width: 100%; " alt="">
                                                            </div>
                                                        @endfor
                                                        <div class="col-2 px-1 py-2"></div>
                                                        <div class="col-2 px-1 py-2"></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="carousel-inner">
                                                    @foreach($data->scrapYardImages as $image)
                                                        <div class="carousel-item " data-slide-number="{{$loop->iteration-1}}">
                                                            <img src="@if(is_video($image->image)) {{ asset('images/video_thumbnail.png') }} @else {{ asset('$image->image') }} @endif"  class="d-block w-100" alt="..."  data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                                        </div>

                                                    @endforeach
                                                </div>
                                                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div class="row mx-0">
                                                                @foreach($data->scrapYardImages as $image)
                                                                    <div id="carousel-selector-{{$loop->iteration-1}}" class="thumb col-4 col-sm-2 px-1 py-2 " data-target="#myCarousel" data-slide-to="{{$loop->iteration-1}}">
                                                                        <img src="@if(is_video($image->image)) {{ asset('images/video_thumbnail.png') }} @else {{ asset($image->image) }} @endif" style="height: 90px;width: 100%; " alt="">
                                                                    </div>
                                                                @endforeach
                                                                <div class="col-2 px-1 py-2"></div>
                                                                <div class="col-2 px-1 py-2"></div>
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                    <div class="overview">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                        <h5 class="singe-title">{{siteSetting()['detail_description_text'] ?? ''}}</h5>

                        <p>{!! $data->description !!}</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-dealer-info mt-lg-0">
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
                                            <span>({{ $average_star }} Rating)</span>
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
                    </div>
                </div>
            </div>
            @if(count($similar_list)>0)
                <div class="col-md-12">
                <div class="sidebar-similar-listing">
                    <h4 class="sidebar-title">{{ siteSetting()['similar_listing_text'] ?? '' }}</h4>
                        <div class="row justify-content-center">
                            @foreach($similar_list as $item)
                                <div class="car-col col-lg-3 col-sm-6 col-6">
                                    <div class="single-car-item-2 mt-4">
                                        <div class="car-image">
                                            <a href="{{ route('detail', $item->slug) }}">
                                                @if($is_carpart)
                                                    @if($item->carPartImages->count() > 0)
                                                        <img src="{{ asset($item->carPartImages[0]->image) }}" alt="">
                                                    @else
                                                        <img src="{{ asset('theme/assets/images/f1.jpg') }}" alt="" style="width: 255px;height: 154.91px;">
                                                    @endif
                                                @else
                                                    @if($item->scrapYardImages->count() > 0)
                                                        <img src="{{ asset($item->scrapYardImages[0]->image) }}" alt="">
                                                    @else
                                                        <img src="{{ asset('theme/assets/images/f1.jpg') }}" alt="" style="width: 255px;height: 154.91px;">
                                                    @endif
                                                @endif
                                            </a>
                                        </div>
                                        <div class="car-content">
                                    <span class="price">
                                        <span class="price-amount">${{ $item->price ?? '' }}</span>
                                    </span>
                                            <span class="body-type"><a href="#">{{ $item->carMake->name }}</a></span>
                                            <h4 class="car-title"><a href="{{ route('detail', $item->slug) }}">{{ $item->carMake->name ?? '' }} {{ $item->carModel->name ?? '' }}</a> </h4>

                                            <div class="author-meta">
                                                <span><i class="ion-android-person"></i> {{siteSetting()['dealer_text'] ?? ''}}:  <a href="{{ route('seller_profile',$item->user->id) }}">{{$item->user->name}}</a></span>
                                            </div>
                                            <div class="author-meta detail_button">
                                                <a class="main-btn" href="{{ route('detail',$item->slug) }}">Detail</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>


                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@section('js')

    <script src="{{asset('seller/slider/script.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js'></script>
    @endsection
