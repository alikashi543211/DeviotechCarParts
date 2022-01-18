<div class="car_parts">
    <div class="inventory-top d-md-flex justify-content-between align-items-center">
        <div class="inventory-top-right mt-0">
            <p>{{count($carParts)}} Vehicles <span>Matching</span></p>
        </div>
        <div class="inventory-top-left d-sm-flex justify-content-between align-items-center">
            <div class="inventory-select mt-0">
                <form action="#">
                    <select class="optgroup_test">
                        <option value="" selected="selected">SORT BY: Date Last Added </option>
                        <option value="">SORT BY: Date First Added </option>
                        <option value="">SORT BY: Price (Low To High) </option>
                        <option value="">SORT BY: Price (High To Low) </option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if(count($carParts)>0)
            @foreach($carParts as $carPart)
                <div class="col-xl-4 col-md-6">
                    <div class="single-car-item-2 mt-50">
                        <div class="car-image">
                            <a href="{{ route('detail', 'used-2018-audi-s8') }}">
                                @if(count($carPart->carPartImages)=='0')
                                    <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg" alt="">
                                @else
                                    <img src="{{asset($carPart->carPartImages[0]->image)}}" alt="" style="width: 255px;height: 154.91px;">
                                @endif
                            </a>
                            <ul class="car-meta">
                                <li>
                                    <button type="button">
                                        <i class="ion-ios-loop-strong"></i>
                                        <span class="car-tooltip compare">Add To Compare </span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button">
                                        <i class="ion-arrow-expand"></i>
                                        <span class="car-tooltip View">Click To View</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button">
                                        <i class="ion-android-favorite-outline"></i>
                                        <span class="car-tooltip favourite">Add To Favourite</span>
                                    </button>
                                </li>
                            </ul>
                            <span class="status special"><i class="ion-flash"></i> Special</span>
                        </div>
                        <div class="car-content">
                                <span class="price">
                                    <span class="sale-price">$23,000</span>
                                    <span class="regular-price">$28,500</span>
                                    <span class="discount-percentage">Save 35%</span>
                                </span>
                            <span class="body-type"><a href="#">{{ $carPart->carMake->name }} {{ $carPart->carModel->name }}</a></span>
                            <h4 class="car-title"><a href="{{ route('detail', 'used-2018-audi-s8') }}">{{ $carPart->carTrim->name }}</a></h4>

                            <div class="author-meta">
                                <span><i class="ion-android-person"></i> Dealer:  <a href="#">{{$carPart->user->name}}</a></span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="all-pagination">
        {{ $carParts->links() }}
    </div>
</div>
<div class="scrap_yard" style="display: none;">
    <div class="inventory-top d-md-flex justify-content-between align-items-center">
        <div class="inventory-top-right mt-0">
            <p>{{count($scrapYards)}} Vehicles <span>Matching</span></p>
        </div>
        <div class="inventory-top-left d-sm-flex justify-content-between align-items-center">
            <div class="inventory-select mt-0">
                <form action="#">
                    <select class="optgroup_test">
                        <option value="" selected="selected">SORT BY: Date Last Added </option>
                        <option value="">SORT BY: Date First Added </option>
                        <option value="">SORT BY: Price (Low To High) </option>
                        <option value="">SORT BY: Price (High To Low) </option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if(count($scrapYards)>0)
            @foreach($scrapYards as $scrapYard)
                <div class="col-xl-4 col-md-6">
                    <div class="single-car-item-2 mt-50">
                        <div class="car-image">
                            <a href="{{ route('detail', 'used-2018-audi-s8') }}">
                                @if(count($scrapYard->scrapyardImages)=='0')
                                    <img src="{{ asset('theme') }}/assets/images/car-2/car-1.jpg" alt="">
                                @else
                                    <img src="{{asset($scrapYard->scrapYardImages[0]->image)}}" alt="" style="width: 255px;height: 154.91px;">
                                @endif
                            </a>
                            <ul class="car-meta">
                                <li>
                                    <button type="button">
                                        <i class="ion-ios-loop-strong"></i>
                                        <span class="car-tooltip compare">Add To Compare </span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button">
                                        <i class="ion-arrow-expand"></i>
                                        <span class="car-tooltip View">Click To View</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button">
                                        <i class="ion-android-favorite-outline"></i>
                                        <span class="car-tooltip favourite">Add To Favourite</span>
                                    </button>
                                </li>
                            </ul>
                            <span class="status special"><i class="ion-flash"></i> Special</span>
                        </div>
                        <div class="car-content">
                                <span class="price">
                                    <span class="sale-price">$23,000</span>
                                    <span class="regular-price">$28,500</span>
                                    <span class="discount-percentage">Save 35%</span>
                                </span>
                            <span class="body-type"><a href="#">{{ $scrapYard->carMake->name }} {{ $scrapYard->carModel->name }}</a></span>
                            <h4 class="car-title"><a href="{{ route('detail', 'used-2018-audi-s8') }}">{{ $scrapYard->carTrim->name }}</a></h4>

                            <div class="author-meta">
                                <span><i class="ion-android-person"></i> Dealer:  <a href="#">{{$scrapYard->user->name}}</a></span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="all-pagination">
        {{ $scrapYards->links() }}
    </div>
</div>

