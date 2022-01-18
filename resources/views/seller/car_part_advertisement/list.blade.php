@extends('layouts.seller')
@section('title','Car Parts Advertisement ')
@section('nav-title', 'Car Parts Advertisement')
@section('content')

<div class="content-header row">
    <div class="col-12">
        <h2>Car Part Advertisements</h2>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12 text-right">
                <a href="{{route('seller.car.part.advertisement.add')}}" class="btn btn-primary">Add</a>
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
                                            <th>Title</th>
                                            <th>{{siteSetting()['col_car_make'] ?? ''}}</th>
                                            <th>{{siteSetting()['col_car_model'] ?? ''}}</th>
                                            <th>{{siteSetting()['col_car_trim'] ?? ''}}</th>
                                            <th>{{siteSetting()['col_status'] ?? ''}}</th>
                                            <th class="text-right">{{siteSetting()['action_title'] ?? ''}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carPartAdvertisement as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title ?? '' }}</td>
                                                <td>{{ $item->carMake->name ?? '' }}</td>
                                                <td>{{ $item->carModel->name ?? '' }}</td>
                                                <td>{{ $item->carTrim->name ?? '' }}</td>
                                                <td>
                                                    @if($item->status=='1')
                                                        <span class="badge badge-info">{{ siteSetting()['pending_text'] ?? '' }}</span>
                                                    @elseif($item->status=='2')
                                                        <span class="badge badge-success">{{ siteSetting()['active_text'] ?? '' }}</span>
                                                    @elseif($item->status=='3')
                                                        <span class="badge badge-danger">{{ siteSetting()['sold_text'] ?? '' }}</span>
                                                    @elseif($item->status=='4')
                                                        <span class="badge badge-warning">{{ siteSetting()['reserved_text'] ?? '' }}</span>
                                                    @endif
                                                    <div class="dropdown dropleft float-right">
                                                        <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item adds_status" data-id="{{ $item->id }}" data-value="1" href="javascript:void(0);">
                                                                <div class="media">
                                                                    <div class="media-left" style="width: 25px;"><i class="fa fa-linode" aria-hidden="true"></i></div>
                                                                    <div class="media-body">{{ siteSetting()['pending_text'] ?? '' }}</div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item adds_status" data-id="{{ $item->id }}" data-value="2" href="javascript:void(0)">
                                                                <div class="media">
                                                                    <div class="media-left" style="width: 25px;"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                    <div class="media-body">{{ siteSetting()['active_text'] ?? '' }}</div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item adds_status" data-id="{{ $item->id }}" data-value="3" href="javascript:void(0)">
                                                                <div class="media">
                                                                    <div class="media-left" style="width: 25px;"><i class="fa fa-ravelry" aria-hidden="true"></i></div>
                                                                    <div class="media-body">{{ siteSetting()['sold_text'] ?? '' }}</div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item adds_status" data-id="{{ $item->id }}" data-value="4" href="javascript:void(0)">
                                                                <div class="media">
                                                                    <div class="media-left" style="width: 25px;"><i class="fa fa-wpexplorer" aria-hidden="true"></i></div>
                                                                    <div class="media-body">{{ siteSetting()['reserved_text'] ?? '' }}</div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown dropleft float-right">
                                                        <a type="button" class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('seller.car.part.advertisement.edit', $item->id)}}">
                                                                <div class="media">
                                                                    <div class="media-left" style="width: 25px;"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                                                    <div class="media-body">Edit</div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item del_btn" href="javascript:void(0)" data-href="{{ route('seller.car.part.advertisement.delete', $item->id) }}">
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
</div>
@endsection

@section('js')

    <script>
        $(document).on("click",".adds_status",function(){
            status=$(this).attr('data-value');
            id=$(this).attr('data-id');
            location.href="{{ route('seller.car.part.advertisement.change.status') }}?id="+id+"&status="+status;
        });
    </script>

@endsection
