@extends('layouts.admin')
@section('title','Testimonials')
@section('nav-title', 'Testimonials')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('admin.testimonial.add') }}" class="btn btn-success">+ Add</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Testimonial List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Review</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{!! \Str::limit($item->review, 20) !!}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success">Visible</span>
                                            @else
                                                <span class="badge badge-danger">Hidden</span>
                                            @endif 
                                        </td>
                                        <td>
                                          <a href="{{ route('admin.testimonial.status_change', $item->id) }}" class="btn btn-warning btn-sm status_change-btn">
                                              @if ($item->status == 0)
                                                  Show
                                              @else
                                                  Hide
                                              @endif
                                          </a>
                                          <a data-url="{{ route('admin.testimonial.delete', $item->id) }}" class="btn btn-danger text-white btn-sm delete">
                                              <i class="material-icons">delete</i>
                                          </a>
                                          <a href="{{ route('admin.testimonial.edit', $item->id) }}" class="btn btn-primary btn-sm edit-btn">
                                              <i class="material-icons">edit</i>
                                          </a>
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

