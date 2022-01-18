@extends('layouts.front')
@section('title', 'Contact')
@section('content')
<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ siteSetting()['contact_page_banner_title'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="contact-map-area">
    <div id="contact-map"></div>
</div>


<section class="contact-area">
    <div class="container">
        <div class="contact-info">
            <h3 class="contact-title">{{ siteSetting()['contact_info_section_title'] ?? '' }}</h3>

            <div class="contact-info-wrapper">
                <div class="row gx-5">
                    <div class="col-lg-4">
                        <div class="single-contact-info">
                            <h4 class="info-title">{{ siteSetting()['contact_section_heading_1'] ?? '' }} <i class="ion-android-mail"></i></h4>
                            <p><a href="mailto:{{ siteSetting()['contact_section_email'] ?? '' }}">{{ siteSetting()['contact_section_email'] ?? '' }}</a></p>
                            <p><a href="tel:+05683458-868">{{ siteSetting()['contact_section_contact_no'] ?? '' }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-contact-info">
                            <h4 class="info-title">{{ siteSetting()['contact_section_heading_2'] ?? '' }} <i class="ion-android-pin"></i></h4>
                            <p> {{ siteSetting()['contact_section_description_2'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-contact-info">
                            <h4 class="info-title">{{ siteSetting()['contact_section_heading_3'] ?? '' }} <i class="ion-briefcase"></i></h4>
                            <p>{{ siteSetting()['contact_section_description_3'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <h2 class="form-title">{{ siteSetting()['contact_form_section_title'] ?? '' }}</h2>

            <form id="" action="{{ route('contact_us') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-form">
                            <input type="text" name="name" placeholder="{{ siteSetting()['contact_form_name_placeholder'] ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-form">
                            <input type="email" name="email" placeholder="{{ siteSetting()['contact_form_email_placeholder'] ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-form">
                            <input type="text" name="subject" placeholder="{{ siteSetting()['contact_form_subject_placeholder'] ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-form">
                            <textarea name="message" placeholder="{{ siteSetting()['contact_form_message_placeholder'] ?? '' }}" required></textarea>
                        </div>
                    </div>
                    <p class="form-message"></p>
                    <div class="col-lg-12">
                        <div class="single-form">
                            <button type="submit" class="main-btn">{{ siteSetting()['post_car_submit_button'] ?? '' }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ5y0EF8dE6qwc03FcbXHJfXr4vEa7z54"></script>
    <script src="{{ asset('theme') }}/assets/js/map-script.js"></script>
@endsection
