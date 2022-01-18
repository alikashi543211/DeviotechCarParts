@extends('layouts.admin')
@section('title',' Add Language')
@section('nav-title', 'Add Language')
@section('css')
  <style type="text/css">
      .form-group input[type=file] {
            opacity: 1 !important;
            position: static !important;
      }
  </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Add Language</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.language.save')}}" method="POST"
                      enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Short Code</label>
                                    <input type="text" id="name" class="form-control @error('short_code') is-invalid @enderror" name="short_code" autocomplete="off" value="{{old('short_code')}}">
                                    @error('short_code')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
 <script type="text/javascript">


 </script>
@endsection


