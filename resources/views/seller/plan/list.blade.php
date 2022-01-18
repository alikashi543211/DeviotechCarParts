@extends('layouts.seller')
@section('title','Plans ')
@section('nav-title', 'Plans')
@section('css')
   <link rel="stylesheet" type="text/css" href="{{asset('seller')}}/assets/css/pricing_table.css">
@endsection
@section('content')

<div class="content-header row">
    <div class="col-12">
        <h2>{{siteSetting()['plan_page_title'] ?? ''}}</h2>
    </div>
</div>
<div class="content-body">
    <section class="pricing-table">
            <div class="container">
                <div class="row justify-content">
                    <div class="col-md-5 col-lg-4">
                        <div class="item">
                            <div class="ribbon">{{siteSetting()['purchased_text'] ?? ''}}</div>
                            <div class="heading">
                                <h3>@if($plan->subscription_type=='1') 
                                    {{ siteSetting()['carpart_tab_text'] ?? '' }}

                                @elseif($plan->subscription_type=='2')  
                                    {{ siteSetting()['scrapyard_tab_text'] ?? '' }}
                                @elseif($plan->subscription_type=='3')
                                    {{siteSetting()['plan_ultimate_text'] ?? ''}}
                                @endif</h3>
                            </div>
                            <div class="price">
                                <h4>${{$plan->amount}}</h4>
                            </div>
                            <div class="features">
                                <h4><span class="value">
                                    @if ($plan->interval=='month')
                                        {{siteSetting()['plan_interval_month_text'] ?? ''}}
                                    @elseif ($plan->interval=='year')
                                        {{siteSetting()['plan_interval_year_text'] ?? ''}}
                                    @endif
                                </span></h4>
                            </div>
                            <p>{!! $plan->description !!}</p>
                            <!-- <button type="button" class="btn btn-primary" type="submit">BUY NOW</button> -->
                            <a href="{{route('seller.plan.cancel')}}" class="btn btn-block btn-outline-primary" type="submit">{{siteSetting()['cancel_subscription_button_text'] ?? ''}}</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection
