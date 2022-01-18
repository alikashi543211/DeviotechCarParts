@extends('layouts.front')
@section('title', 'Register')
@section('content')
<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image']) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ siteSetting()['menu_become_seller_button'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dealer-register-page pt-5">
    <div class="container">
        <div class="page-title">
            <h4 class="title"> {{ siteSetting()['seller_reg_main_heading'] ?? '' }}</h4>
            <p>{{ siteSetting()['seller_register_sub_heading'] ?? '' }}</p>

            <p class="register-text">{{siteSetting()['already_seller_text'] ?? ''}} <a href="{{ route('login') }}">{{siteSetting()['click_here_text'] ?? ''}}</a></p>
        </div>

        <form action="{{ route('register') }}" method="POST"  data-parsley-validate>
            @csrf
            <input type="hidden" name="role" value="seller">
            <div class="login-register-form dealer-register-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="{{siteSetting()['profile_full_name_label'] ?? ''}}" name="name" required>
                            <i class="ion-android-person"></i>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" placeholder="{{siteSetting()['seller_profile_company_name_label'] ?? ''}}" name="company_name" >
                            <i class="ion-briefcase"></i>
                            @error('company_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="{{siteSetting()['profile_phone_label'] ?? ''}}" name="phone" required>
                            <i class="ion-android-call"></i>
                            @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="{{siteSetting()['profile_email_label'] ?? ''}}" required>
                            <i class="ion-android-mail"></i>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="password" class="@error('password') is-invalid @enderror" placeholder="{{siteSetting()['password_placeholder'] ?? ''}}" name="password" required>
                            <i class="ion-locked"></i>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="password" class="@error('password_confirmation') is-invalid @enderror" placeholder="{{siteSetting()['profile_confirm_password'] ?? ''}}" name="password_confirmation" required>
                            <i class="ion-locked"></i>
                            @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('street_address') is-invalid @enderror" value="{{old('street_address')}}" placeholder="{{siteSetting()['profile_street_address'] ?? ''}}" name="street_address" required>
                            <i class="ion-pin"></i>
                            @error('street_address')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('website') is-invalid @enderror" value="{{old('website')}}" placeholder="{{siteSetting()['profile_website_label'] ?? ''}}" name="website" >
                            <i class="ion-android-globe"></i>
                            @error('website')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('extension') is-invalid @enderror" value="{{old('extension')}}" placeholder="{{siteSetting()['profile_extension_label'] ?? ''}}" name="extension" >
                            <i class="ion-arrow-expand"></i>
                            @error('extension')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('house_number') is-invalid @enderror" value="{{old('house_number')}}" placeholder="{{siteSetting()['profile_house_no_label'] ?? ''}}" name="house_number" required>
                            <i class="ion-home"></i>
                            @error('house_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="{{siteSetting()['profile_city_label'] ?? ''}}" name="city" required>
                            <i class="fas fa-building mt-1"></i>
                            @error('city')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('state') is-invalid @enderror" value="{{ old('state') }}" placeholder="{{siteSetting()['profile_state_label'] ?? ''}}" name="state" required>
                            <i class="fas fa-flag-usa mt-1"></i>
                            @error('state')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="single-form form-icon">
                            <input type="text" class="@error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}" placeholder="{{siteSetting()['profile_zip_code_label'] ?? ''}}" name="zip_code" required>
                            <i class="fas fa-map mt-1"></i>
                            @error('zip_code')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>



                <div class="checkbox-forgot">
                    <div class="single-form">
                        <input id="checkbox3" name="subscribe_newsletter" type="checkbox">
                        <label for="checkbox3"><span></span> {{siteSetting()['subscribe_text'] ?? ''}} </label>
                    </div>
                </div>
                <div class="checkbox-forgot">
                    <div class="single-form">
                        <input id="checkbox2" type="checkbox" required>
                        <label for="checkbox2"><span></span> {{siteSetting()['i_accept_text'] ?? ''}} <a href="{{ route('terms') }}" target="_blank">{{siteSetting()['term_of_use_text'] ?? ''}}</a> & <a href="{{ route('privacy') }}" target="_blank">{{siteSetting()['privacy_policy_text'] ?? ''}}</a></label>
                    </div>
                </div>
                <div class="single-form">
                    <button class="main-btn" type="submit">{{siteSetting()['submit_now_button'] ?? ''}}</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
