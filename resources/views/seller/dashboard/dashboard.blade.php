@extends('layouts.seller')
@section('title', 'Dashboard')
@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{ asset('seller') }}/app-assets/images/elements/decore-left.png" class="img-left" alt="card-img-left">
                            <img src="{{ asset('seller') }}/app-assets/images/elements/decore-right.png" class="img-right" alt="card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">{{ siteSetting()['welcome_title'] ?? '' }} {{ auth()->user()->name }},</h1>
                                <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                                <!-- <p>
                                    <button class="btn btn-primary" id="take_screenshoot">Take Screenshot</button>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Analytics end -->
</div>
@endsection