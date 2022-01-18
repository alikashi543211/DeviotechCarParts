@extends('layouts.front')
@section('title', 'FAQs')
@section('content')
<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ siteSetting()['faqs_page_banner_title'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-page pt-5 pb-5">
    <div class="container">
        <div class="page-title">
            <h4 class="title">{{ siteSetting()['faqs_page_question_section_title'] ?? '' }}</h4>
            <p>{{ siteSetting()['faqs_page_question_section_sub_title'] ?? '' }}</p>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="faq-accordion">
                    @foreach($faq_list as $item)
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <a href="#" class="@if($loop->iteration!=1) collapsed @endif" data-toggle="collapse" data-target="#collapseOne{{ $loop->iteration }}">{{ $loop->iteration }}. {{ $item->question }}</a>
                                </div>

                                <div id="collapseOne{{ $loop->iteration }}" class="collapse @if($loop->iteration==1) show @endif" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>{!! $item->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ5y0EF8dE6qwc03FcbXHJfXr4vEa7z54"></script>
    <script src="{{ asset('theme') }}/assets/js/map-script.js"></script>
@endsection
