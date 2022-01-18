@extends('layouts.front')
@section('title', 'Blog')
@section('content')
<section class="slider-area slider-2">

    <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image'] ?? '') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content-2">
                        <h2 class="main-title">{{ siteSetting()['blog_page_banner_title'] ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-area pt-5 pb-5">
    <div class="container">
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
        <div class="all-pagination">
            @if ($blog_list->lastPage() > 1)
                <ul class="pagination justify-content-center">
                    <li class="{{ ($blog_list->currentPage() == 1) ? ' disabled' : '' }}"><a class="previous" href="{{ $blog_list->url(1) }}"><i class="ion-ios-arrow-back"></i> <span>@lang('site.prev_pagination')</span></a></li>
                    @for ($i = 1; $i <= $blog_list->lastPage(); $i++)
                        <li><a class="{{ ($blog_list->currentPage() == $i) ? ' active' : '' }}" href="{{ $blog_list->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="{{ ($blog_list->currentPage() == $blog_list->lastPage()) ? ' disabled' : '' }}"><a class="next" href="{{ $blog_list->url($blog_list->currentPage()+1) }}"><span>@lang('site.next_pagination')</span> <i class="ion-ios-arrow-forward"></i></a></li>
                </ul>
            @endif
        </div>
    </div>
</section>
@endsection
