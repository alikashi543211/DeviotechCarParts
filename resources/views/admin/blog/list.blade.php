@extends('layouts.admin')
@section('title','Blog')
@section('nav-title', 'Blog')

@section('content')
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{ route('admin.blogs.add') }}" class="btn btn-success  btn-sm">+ Add Blog</a>
    </div>
    <div class="col-md-12">
        <div class="card">
            
            
            <div class="card-header card-header-primary">
                <h4 class="card-title">Blogs List</h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Posted At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                                <td> @if($blog->visibility == "showed")
                                    <span class="badge badge-success">Visible</span>
                                    @else
                                    <span class="badge badge-danger">Hidden</span>
                                    @endif</td>
                                <td>
                                    <a href="{{route('admin.blogs.edit',['id'=>$blog->id] )}}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a data-url="{{route('admin.blogs.delete',['id'=>$blog->id] )}}"
                                        class="btn btn-danger text-white btn-sm delete">Delete</a>
                                    @if($blog->visibility == "hidden")
                                        <a href="{{route('admin.blogs.change.visibility', [$blog->id, 'showed'] )}}"
                                        class="btn btn-info btn-sm ">Show</a>
                                    @else
                                        <a href="{{route('admin.blogs.change.visibility', [$blog->id, 'hidden'] )}}"
                                        class="btn btn-info btn-sm ">Hide</a>
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
@endsection