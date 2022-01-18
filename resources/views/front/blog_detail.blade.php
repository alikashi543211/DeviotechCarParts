@extends('layouts.front')
@section('title', $blog->title)
@section('content')
<section class="slider-area slider-2">
    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ $blog->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="single-post-main-content pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="post-content-inner single-post-left">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">{{ $blog->title }}</li>
                        <li class="breadcrumb-item">{{ $blog->written_by }}</li>
                        <li class="breadcrumb-item active">{{ $blog->created_at->diffForHumans() }}</li>
                    </ul>
                    <div class="body-content">
                        <p class="has-text">{{ $blog->title }}</p>

                        <p class="has-drop-cap">{!! $blog->description !!}</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
