@extends('layouts.front')
@section('title', 'User Dashboard')
@section('content')
<section class="slider-area slider-2">

    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cars-2-area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-2">
                    <h2 class="title">Welcome {{ auth()->user()->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="cars-wrapper">
        <div class="container">
            <div class="cars-tab-menu">
                <ul class="nav" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#user_profile" role="tab">Porfile</a></li>
                    <li><a data-toggle="tab" href="#user_password" role="tab">Change Password</a></li>
                    <li><a data-toggle="tab" href="#fav_car_part" role="tab">Favourite Car Part Advertisements </a></li>
                    <li><a data-toggle="tab" href="#fav_scrap_yard" role="tab">Favourite Scrap Yard Advertisements </a></li>
                </ul>
            </div>
        </div>
        <div class="container cars-container">
            <div class="tab-content content_row_adds pb-5">
                <div class="tab-pane fade active show" id="user_profile" role="tabpanel">
                	<div class="row">
                		<div class="col-md-3">
                			
                		</div>
                		<div class="col-md-6">
                			<div class="login-register-form">
		                        <form method="POST" action="{{ route('user.update.profile') }}">
		                            @csrf
		                            <div class="single-form">
		                                <input type="text" name="name" placeholder="Name" class="@error('name') is-invalid @enderror" value="{{old('name',auth()->user()->name)}}">
		                                @error('name')
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            <div class="single-form">
		                                <input type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{old('email',auth()->user()->email)}}">
		                                @error('email')
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            <div class="single-form form-btn">
		                                <button class="main-btn btn-block">Update Profile</button>
		                            </div>
		                        </form>
		                    </div>
                		</div>
                		<div class="col-md-3">
                			
                		</div>
                	</div>
                </div>
                <div class="tab-pane fade" id="user_password" role="tabpanel">
                	<div class="row">
                		<div class="col-md-3">
                			
                		</div>
                		<div class="col-md-6">
                			<div class="login-register-form">
		                        <form method="POST" action="{{ route('user.update.password') }}">
		                            @csrf
		                            <div class="single-form">
		                                <input type="password" name="old_password" placeholder="Old Password" class="@error('old_password') is-invalid @enderror">
		                                @error('old_password')
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            <div class="single-form">
		                                <input type="password" name="new_password" placeholder="New Password" class="@error('new_password') is-invalid @enderror">
		                                @error('new_password')
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            <div class="single-form">
		                                <input type="password" name="confirm_password" placeholder="Confirm Password" class="@error('confirm_password') is-invalid @enderror">
		                                @error('confirm_password')
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                            <div class="single-form form-btn">
		                                <button class="main-btn btn-block">Change Password</button>
		                            </div>
		                        </form>
		                    </div>
                		</div>
                		<div class="col-md-3">
                			
                		</div>
                	</div>
                </div>
                <div class="tab-pane fade" id="fav_car_part" role="tabpanel">
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

                    </div>
                </div>
                <div class="tab-pane fade" id="fav_scrap_yard" role="tabpanel">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
