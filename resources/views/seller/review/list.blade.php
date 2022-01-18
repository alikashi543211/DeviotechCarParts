@extends('layouts.seller')
@section('title','Reviews ')
@section('nav-title', 'Reviews')
@section('css')
   <link rel="stylesheet" type="text/css" href="{{asset('seller')}}/assets/css/pricing_table.css">
   <style>
       .checked
       {
            color:orange !important;
       }
   </style>
@endsection
@section('content')

<div class="content-header row">
    <div class="col-12">
        <h2>Reviews</h2>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12 text-right">
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ siteSetting()['reviews_col_name'] }}</th>
                                            <th>{{ siteSetting()['reviews_col_subject'] }}</th>
                                            <th>{{ siteSetting()['reviews_col_stars'] }}</th>
                                            <th>Review</th>
                                            <th class="text-right">{{ siteSetting()['action_title'] }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($review_list as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->subject }}</td>
                                                <td>
                                                    @for($i=1;$i<=5;$i++)
                                                        <span class="fa fa-star @if($i<=$item->stars) checked @endif"></span>
                                                    @endfor
                                                </td>
                                                <td>
                                                    {{ $item->review }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown dropleft float-right">
                                                        <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item del_btn" href="javascript:void(0)" data-href="{{ route('seller.review.delete', $item->id) }}">
                                                                <div class="media">
                                                                    <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                    <div class="media-body">{{ siteSetting()['delete_button'] }}</div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
