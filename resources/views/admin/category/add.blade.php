@extends('layouts.admin')
@section('title','Category')
@section('nav-title', 'Category')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" autocomplete="off" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
