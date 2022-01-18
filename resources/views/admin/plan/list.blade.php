@extends('layouts.admin')
@section('title','Plan')
@section('nav-title', 'Plan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('admin.plan.add') }}" class="btn btn-success">+ Add Plan</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Plan List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-bordered table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Inventory</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plan as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->interval }}</td>
                                        <td>
                                            @if($item->subscription_type=='1')
                                            Car Part Advertisement
                                                @elseif($item->subscription_type=='2')
                                            Scrapyard Car Advertisement
                                                @elseif($item->subscription_type=='3')
                                            Ultimate
                                                @else
                                            @endif
                                        </td>
                                        <td>{{ $item->amount }}:USD</td>
                                        <td>
                                          @if($item->status == "active")
                                              <span class="badge badge-success">
                                              Active
                                              </span>
                                          @else
                                              <span class="badge badge-danger">
                                              Disabled
                                              </span>
                                          @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.plan.edit',$item->id)}}" class="btn btn-sm btn-warning text-white">Edit</a>
                                            <button class="btn btn-sm btn-danger delete" data-url="{{route('admin.plan.delete',$item->id)}}">
                                               Delete
                                           </button>
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




