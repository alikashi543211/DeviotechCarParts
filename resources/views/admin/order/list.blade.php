@extends('layouts.admin')
@section('title','Order')
@section('nav-title', 'Order ')
@section('content')
    <div class="container-fluid">
        <div class="float-right" style="margin-top: -40px;"><a href="{{route('admin.order.excel.download')}}" class="btn btn-primary btn-sm">Download in Excel</a>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title font-weight-bold">Order</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET" class="filter-form">
                            <input type="hidden" name="filter" value="filter">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control filter_field datepicker" type="text" value="{{ request()->from_date }}" name="from_date" readonly placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control filter_field datepicker" type="text" value="{{ request()->to_date }}" name="to_date" readonly placeholder="To Date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-danger btn-sm bold float-right clear" type="button">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table datatable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>User Name</th>
                                    <th>Total pay</th>
                                    <th>Payment Id</th>
                                    <th>Status</th>
                                    {{--<th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $order->owner->name }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->mollie_payment_id }}</td>
                                        <td>
                                            @if($order->mollie_payment_status == 'paid')
                                                <span class="badge badge-success">Paid</span>
                                            @else
                                                <span class="badge badge-info">Unpaid</span>
                                            @endif
                                        </td>
                                        {{--<td class="text-center">--}}
                                            {{--@if($item->is_active==false)--}}
                                                {{--<a href="{{route('admin.scrap_yard_advertisement.change_status',$item->id)}}" class="btn btn-primary btn-sm">Approve</a>--}}
                                            {{--@else--}}
                                                {{--<a href="{{route('admin.scrap_yard_advertisement.change_status',$item->id)}}" class="btn btn-danger btn-sm">Disapprove</a>--}}
                                            {{--@endif--}}
                                        {{--</td>--}}
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
@endsection

@section('js')

    <script type="text/javascript">

        var deleteID = document.querySelectorAll(".delete");
        deleteID.forEach(function(e) {
            e.addEventListener("click", function(event) {
                event.preventDefault();
                $url=$(this).attr("data-url");
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = $url;
                        }
                        else {
                            swal("Your category is safe!",{
                                icon: "success",
                            });
                        }
                    });
            });
        });

    </script>
@endsection





