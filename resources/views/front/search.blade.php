@extends('layouts.front')
@section('title', 'Search')
@section('css')
        
@endsection
@section('content')
    <section class="slider-area slider-2">
        <div class="single-slider-2 bg_cover" style="background-image: url({{ asset(fixSetting()['banner_image']) }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-content-2">
                            <h2 class="main-title">{{ siteSetting()['search_page_title'] ?? '' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inventory-area pt-4 pb-5">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="search-box-wrapper-2 pt-2">
                        <div class="search-header d-md-flex align-items-center justify-content-between">
                            <div class="search-title-field d-lg-flex align-items-center">
                                <h3 class="title">Search</h3>
                                <div class="search-field">
                                    @if(isset(request()->show) &&  request()->show=='carpart')
                                        <div class="search-field-radio" style="background-color: #5C7284;">
                                            <input name="search-radio" class="search-radio" value="3" type="radio"
                                                   id="radio3" checked="">
                                            <label for="radio3"><span>{{ siteSetting()['carpart_tab_text'] ?? '' }}</span></label>
                                        </div>
                                    @elseif(isset(request()->show) &&  request()->show=='scrapyard')
                                        <div class="search-field-radio" style="background-color: #5C7284;">
                                            <input name="search-radio" class="search-radio" value="1" type="radio"
                                               id="radio1" checked="">
                                            <label for="radio1"><span>{{ siteSetting()['scrapyard_tab_text'] ?? '' }}</span></label>

                                        </div>
                                    @else
                                        <div class="search-field-radio" style="background-color: #5C7284;">
                                            <input name="search-radio" class="search-radio" value="3" type="radio"
                                                   id="radio3" checked="">
                                            <label for="radio3"><span>{{ siteSetting()['carpart_tab_text'] ?? '' }}</span></label>
                                        </div>
                                        <div class="search-field-radio" style="background-color: #5C7284;">
                                            <input name="search-radio" class="search-radio" value="1" type="radio"
                                               id="radio1">
                                            <label for="radio1"><span>{{ siteSetting()['scrapyard_tab_text'] ?? '' }}</span></label>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div id="search-result">
                            <div class="car_parts">
                                <div class="inventory-top d-md-flex justify-content-between align-items-center">
                                    <div class="inventory-top-right mt-0">
                                        @if($noCarParts==true)

                                        @else
                                            <p>{{count($carParts)}} Vehicles <span>Matching</span></p>
                                        @endif
                                    </div>
                                    @if($noCarParts==false)
                                        <div class="inventory-top-left d-sm-flex justify-content-between align-items-center">
                                            <div class="inventory-select mt-0">
                                                <form action="" class="car_part_sorting_form">
                                                    <!-- Searched attributes -->
                                                    <input type="hidden" name="make" value="{{ request()->make ?? '' }}">
                                                    <input type="hidden" name="model" value="{{ request()->model ?? '' }}">
                                                    <input type="hidden" name="trim" value="{{ request()->trim ?? '' }}">
                                                    <input type="hidden" name="price" value="{{ request()->price ?? '' }}">
                                                    <input type="hidden" name="show" value="{{ request()->show ?? '' }}">

                                                    <input type="hidden" name="type" value="2">
                                                    <select class="optgroup_test sorting_option" name="sort">
                                                        <option value="1" selected="selected">{{siteSetting()['sort_by_option_1_text'] ?? ''}}
                                                        </option>
                                                        <option value="2">{{siteSetting()['sort_by_option_2_text'] ?? ''}}</option>
                                                        <option value="3">{{siteSetting()['sort_by_option_3_text'] ?? ''}}</option>
                                                        <option value="4">{{siteSetting()['sort_by_option_4_text'] ?? ''}}</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row pb-3 content_row_adds">
                                    @if($noCarParts==true)
                                        <div class="col-12 text-center">
                                            <img src="{{ asset('theme/assets/images/no_search.svg') }}" width="80px" class="img-fluid" alt="">
                                            <h3 class="text-dark">{{ siteSetting()['not_found_heading'] ?? '' }}</h3>
                                            <p>{{ siteSetting()['not_found_sub_heading'] ?? '' }}</p>
                                        </div>
                                        <h3 class="mt-5">{{ siteSetting()['other_advertisement_title'] ?? '' }}</h3>
                                    @endif
                                    @foreach($carParts as $carPart)
                                            <div class="col-xl-4 col-md-6">
                                                <div class="single-car-item-2 mt-50">
                                                    <div class="car-image">
                                                        <a href="{{ route('detail', $carPart->slug) }}">
                                                            @if(count($carPart->carPartImages)=='0')
                                                                <img src="{{ asset('theme/assets/images/car-2/car-1.jpg') }}"
                                                                     alt="">
                                                            @else
                                                                <img src="{{asset($carPart->carPartImages[0]->image)}}"
                                                                     alt="" style="width: 255px;height: 154.91px;">
                                                            @endif
                                                        </a>
                                                        <ul class="car-meta">
                                                            <li>
                                                                <button type="button">
                                                                    <i class="ion-android-favorite-outline"></i>
                                                                    <span class="car-tooltip favourite">{{ siteSetting()['add_to_fav_text'] ?? '' }}</span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="car-content">
                                                        <span class="price">
                                                            <span class="sale-price">${{ $carPart->price ?? '' }}</span>
                                                        </span>
                                                        <span class="body-type"><a
                                                                    href="{{ route('detail', $carPart->slug) }}">{{ isset($carPart->carMake) ? $carPart->carMake->name : '---' }} {{ isset($carPart->carModel) ? $carPart->carModel->name : '---' }}</a></span>
                                                        <h4 class="car-title"><a
                                                                    href="{{ route('detail', $carPart->slug) }}">{{ $carPart->carMake->name ?? '' }} {{ $carPart->carModel->name ?? '' }}</a>
                                                        </h4>
                                                        <div class="author-meta">
                                                            <span><i class="ion-android-person"></i> {{ siteSetting()['dealer_text'] ?? '' }}:  <a
                                                                        href="{{ route('seller_profile',$carPart->user->id) }}">{{$carPart->user->name}}</a></span>
                                                        </div>
                                                        <div class="author-meta detail_button">
                                                            <a class="main-btn" href="{{ route('detail',$carPart->slug) }}">Detail</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                                <div class="all-pagination">
                                    {{ $carParts->links() }}
                                </div>
                            </div>
                            <div class="scrap_yard" style="display: none;">
                                <div class="inventory-top d-md-flex justify-content-between align-items-center">
                                    <div class="inventory-top-right mt-0">
                                        @if($noScrapYards==true)
                                        @else
                                            <p>{{count($scrapYards)}} Vehicles <span>Matching</span></p>
                                        @endif
                                    </div>
                                    @if($noScrapYards==false)
                                        <div class="inventory-top-left d-sm-flex justify-content-between align-items-center">
                                            <div class="inventory-select mt-0">
                                                <form action="" class="scrap_yard_sorting_form">
                                                    <!-- Searched attributes -->
                                                    <input type="hidden" name="make" value="{{ request()->make ?? '' }}">
                                                    <input type="hidden" name="model" value="{{ request()->model ?? '' }}">
                                                    <input type="hidden" name="trim" value="{{ request()->trim ?? '' }}">
                                                    <input type="hidden" name="price" value="{{ request()->price ?? '' }}">
                                                    <input type="hidden" name="type" value="1">
                                                    <input type="hidden" name="show" value="{{ request()->show ?? '' }}">
                                                    
                                                    <select class="optgroup_test sorting_option" name="sort">
                                                        <option value="1" selected="selected">{{siteSetting()['sort_by_option_1_text'] ?? ''}}
                                                        </option>
                                                        <option value="2">{{siteSetting()['sort_by_option_2_text'] ?? ''}}</option>
                                                        <option value="3">{{siteSetting()['sort_by_option_3_text'] ?? ''}}</option>
                                                        <option value="4">{{siteSetting()['sort_by_option_4_text'] ?? ''}}</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row pb-3 content_row_adds">
                                    @if($noScrapYards==true)
                                        <div class="col-12 text-center">
                                            <img src="{{ asset('theme/assets/images/no_search.svg') }}" width="80px" class="img-fluid" alt="">
                                            <h3 class="text-dark">{{ siteSetting()['not_found_heading'] ?? '' }}</h3>
                                            <p>{{ siteSetting()['not_found_sub_heading'] ?? '' }}</p>
                                        </div>
                                        <h3 class="mt-5">{{ siteSetting()['other_advertisement_title'] ?? '' }}</h3>
                                    @endif
                                        @foreach($scrapYards as $scrapYard)
                                            <div class="col-xl-4 col-md-6">
                                                <div class="single-car-item-2 mt-50">
                                                    <div class="car-image">
                                                        <a href="{{ route('detail',$scrapYard->slug) }}">
                                                            @if(count($scrapYard->scrapyardImages)=='0')
                                                                <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg"
                                                                     alt="">
                                                            @else
                                                                <img src="{{asset($scrapYard->scrapYardImages[0]->image)}}"
                                                                     alt="" style="width: 255px;height: 154.91px;">
                                                            @endif
                                                        </a>
                                                        <ul class="car-meta">
                                                            <li>
                                                                <button type="button">
                                                                    <i class="ion-android-favorite-outline"></i>
                                                                    <span class="car-tooltip favourite">{{ siteSetting()['add_to_fav_text'] ?? '' }}</span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                         {{siteSetting()['special_text'] ?? ''}}</span>
                                                    </div>
                                                    <div class="car-content">
                                                        <span class="price">
                                                            <span class="sale-price">${{ $scrapYard->price ?? '' }}</span>
                                                        </span>
                                                        <span class="body-type"><a
                                                                    href="{{ route('detail', $scrapYard->slug) }}">{{ isset($scrapYard->carMake) ? $scrapYard->carMake->name : '---'}} {{ isset($scrapYard->carModel) ? $scrapYard->carModel->name : '---'}}</a></span>
                                                        <h4 class="car-title"><a href="{{ route('detail', $scrapYard->slug) }}"> {{$scrapYard->carMake->name}} {{$scrapYard->carModel->name}} </a></h4>

                                                        <div class="author-meta">
                                                            <span><i class="ion-android-person"></i> {{ siteSetting()['dealer_text'] ?? '' }}:  <a
                                                                        href="{{ route('seller_profile',$scrapYard->user->id) }}">{{$scrapYard->user->name}}</a></span>
                                                        </div>
                                                        <div class="author-meta detail_button">
                                                            <a class="main-btn" href="{{ route('detail',$scrapYard->slug) }}">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                                <div class="all-pagination">
                                    {{ $scrapYards->links() }}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="inventory-sidebar">
                        <h3 class="title">{{ siteSetting()['search_filter_title'] ?? '' }}</h3>

                        <div class="sidebar-select">
                            <form id="advance-filteration">
                                <!-- Filtered Attributes -->
                                <input type="hidden" name="make" value="{{ request()->make ?? '' }}">
                                <input type="hidden" name="model" value="{{ request()->model ?? '' }}">
                                <input type="hidden" name="trim" value="{{ request()->trim ?? '' }}">
                                <input type="hidden" name="type" value="{{ request()->type ?? '' }}">
                                <input type="hidden" name="show" value="{{ request()->show ?? '' }}">

                                <div class="single-field">
                                    <select class="optgroup_test" name="make" id="car_make">
                                        <option value="all">{{siteSetting()['search_filter_one_placeholder'] ?? ''}}</option>
                                        @foreach($maker as $make)
                                            <option value="{{$make->id_car_make}}"
                                                    @if(request()->make==$make->id_car_make) selected @endif>{{$make->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-field">
                                    <select class="optgroup_test" name="model" id="car_model">
                                        <option value="all">{{siteSetting()['search_filter_two_placeholder'] ?? ''}}</option>
                                        @foreach($models as $model)
                                            <option value="{{$model->id_car_model}}"
                                                    @if(request()->model==$model->id_car_model) selected @endif>{{$model->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-field">
                                    <select id="car_trim" class="optgroup_test" name="trim">
                                        <option value="all">{{siteSetting()['search_filter_three_placeholder'] ?? ''}}</option>
                                        @foreach($trims as $trim)
                                            <option value="{{$trim->id_car_trim}}"
                                                    @if(request()->trim==$trim->id_car_trim) selected @endif>{{$trim->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-field">
                                    <select class="optgroup_test" name="price">
                                        <option value="">{{siteSetting()['search_filter_four_title'] ?? ''}}</option>
                                        <option value="3000-5000">$3,000-$5,000</option>
                                        <option value="10000-15000">$10,000-$15,000</option>
                                        <option value="20000-25000">$20,000-$25,000</option>
                                        <option value="30000-35000">$30,000-$35,000</option>
                                        <option value="40000-45000">$40,000-$45,000</option>
                                        <option value="50000-60000">$50,000-$60,000</option>
                                        <option value="80000-100000">$80,000-$100,000</option>
                                        <option value="125000-150000">$125,000-$150,000</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="main-btn btn-block">{{siteSetting()['search_filter_button_text'] ?? ''}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $(".search-radio").change(function (e) {
                e.preventDefault();
                var val = $(this).val();
                if (val == 1) {
                    $(".scrap_yard").show();

                    $(".car_parts").hide();
                }

                if (val == 3) {
                    $(".scrap_yard").hide();

                    $(".car_parts").show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            new Kentekenplaat();
        });
        $(document).ready(function () {

            $('#car_make').on('change', function () {
                console.log('stop');
                var id = this.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('car.part.model') }}/" + id,
                    method: "GET",
                    success: function (data) {
                        console.log(data);
                        if (data[1] > 0) {
                            console.log('grater');
                            $('#car_model')[0].sumo.unload();
                            $('#car_model').html('<option value="all">All Model</option>');
                            $('#car_model').append(data[0]);
                            $('#car_model').SumoSelect();

                        }
                        else {
                            $("#car_model").html("");
                        }
                    }
                });
            });

            $('#car_model').on('change', function () {

                var id = this.value;
                $.ajax({
                    url: "{{ route('car.part.trim') }}/" + id,
                    method: "GET",
                    success: function (data) {
                        if (data[1] > 0) {
                            console.log(data);
                            $('#car_trim')[0].sumo.unload();

                            $('#car_trim').html('<option value="all">All Trim</option>');
                            $('#car_trim').append(data[0]);
                            $('#car_trim').SumoSelect();
                            console.log('end');


                        } else {
                            $("#car_trim").html("");

                        }
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#advance-filteration').on('submit',function (event) {
            $('#advance-filteration').on('submit', function (event) {

                $.ajax({
                    type: "GET",
                    route: "/advance/search",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        });

        $(document).on("change",".sorting_option",function(e){
            e.preventDefault();
            $('.scrap_yard_sorting_form').submit();
        });

        $price = "{{ request()->price }}";
        
        $('select[name="price"]').find('option[value="'+$price+'"]').attr("selected",true);
    </script>
@endsection
