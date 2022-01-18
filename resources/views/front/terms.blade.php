@extends('layouts.front')
@section('title', 'Terms & Conditions')
@section('css')
    <style>
        .faq-page p{
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }
        .faq-page ul {
            padding-left: 1rem;
        }
        .faq-page ul li{
            list-style: circle;
        }
    </style>
@endsection
@section('content')
<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image']) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">Terms & Conditions</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-page pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! siteSetting()['terms'] ?? '' !!}
            </div>
        </div>
    </div>
</section>

@endsection
