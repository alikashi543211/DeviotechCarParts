@extends('layouts.admin')
@section('title','Languages')
@section('nav-title', 'Languages')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('admin.language.add') }}" class="btn btn-success">+ Add </a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Language List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-bordered table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Short Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->short_code }}</td>
                                        <td>
                                            <a href="{{route('admin.language.translate',$item->id)}}" class="btn btn-sm btn-warning text-white">Language Translation</a>
                                            <a href="{{route('admin.language.translate',$item->id)}}?terms=show" class="btn btn-sm btn-primary text-white">Terms Conditions</a>
                                            <a href="{{route('admin.language.translate',$item->id)}}?policy=show" class="btn btn-sm btn-info text-white">Privacy Policy</a>

                                            <a href="{{route('admin.language.edit',$item->id)}}" class="btn btn-sm btn-warning text-white">Edit</a>
                                            <button class="btn btn-sm btn-danger delete" data-url="{{route('admin.language.delete',$item->id)}}">
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


