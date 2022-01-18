@extends('layouts.admin')
@section('title','Category')
@section('nav-title', 'Category')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('admin.category.add') }}" class="btn btn-success">+ Add Category</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Category List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-bordered table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>              
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-sm btn-warning text-white">Edit</a>
                                            <button class="btn btn-sm btn-danger delete" data-url="{{route('admin.category.delete',$item->id)}}">
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

