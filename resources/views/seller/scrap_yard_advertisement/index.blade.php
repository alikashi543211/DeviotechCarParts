@extends('layouts.seller')
@section('title','Car Parts Advertisement ')
@section('nav-title', 'Scrap Yard Advertisement')
@section('content')

<div class="row">
    <div class="col-lg-5 col-md-4 col-md-3 col-sm-12 mb-3">
        <div class="page-heading">
            <h3 class="float-left">Scrap Yard Advertisement</h3>
        </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-4">
        
    </div>
    <div class="col-lg-4 col-md-5 col-sm-12 mb-3">
        
    </div>
        
</div>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row mt-1 mx-2">
                    <div class="col-md-12 text-right">
                        <a href="{{route('seller.scrap.yard.advertisement.add')}}" class="btn btn-primary">Add</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                            <button class="btn btn-white filter-btn dropdown-toggle border text-dark waves-effect waves-light" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 - <span class="table_length">10</span> of <span class="table_count"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(118px, 49px, 0px);">
                                <a class="dropdown-item custom-filter" data-value="10" href="#">10</a>
                                <a class="dropdown-item custom-filter" data-value="25" href="#">25</a>
                                <a class="dropdown-item custom-filter" data-value="50" href="#">50</a>
                                <a class="dropdown-item custom-filter" data-value="100" href="#">100</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table zero-configuration table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>car make</th>
                                        <th>car Model</th>
                                        <th>Car trim</th>
                                        <th>Description </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scrapYardAdvertisement as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{$item->carMake->name}}</td>
                                            <td>{{ $item->carModel->name}}</td>
                                            <td>{{ $item->carTrim->name}}</td>
                                            <td>{!! $item->description !!}</td>
                                            <td class="text-center">
                                                <div class="dropdown dropleft float-right">
                                                    <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('seller.car.part.advertisement.edit',$item->id) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                <div class="media-body">Edit</div>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item" href="{{ route('seller.car.part.advertisement.delete', $item->id) }}">
                                                            <div class="media">
                                                                <div class="media-left" style="width: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                                                <div class="media-body">Delete</div>
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
@endsection
