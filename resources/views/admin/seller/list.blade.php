@extends('layouts.admin')
@section('title','Seller')
@section('nav-title', 'Seller')
@section('content')
<div class="container-fluid">
    <div class="float-right" style="margin-top: -39px;"><a href="{{route('admin.seller.excel.download')}}" class="btn btn-primary btn-sm">Download in Excel</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Seller List</h4>

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
                            <thead class="text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Full Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Email Address</th>
                                    <th>Street Address</th>
                                    <th>House Number</th>
                                    <th>Extension</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seller_list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->street_address }}</td>
                                        <td>{{ $item->house_number }}</td>
                                        <td>{{ $item->extension }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td>{{ $item->zip_code }}</td>
                                        <td>{{ $item->extension }}</td>
                                        <td>
                                            @if($item->is_certified==false)
                                                <span class="badge badge-info">Pending</span>
                                            @else
                                                <span class="badge badge-success">Certified</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->is_certified==false)
                                                <a href="{{route('admin.seller.change_status',$item->id)}}" class="btn btn-primary btn-sm">Approve</a>
                                            @else
                                                <a href="{{route('admin.seller.change_status',$item->id)}}" class="btn btn-danger btn-sm">Disapprove</a>
                                            @endif
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

