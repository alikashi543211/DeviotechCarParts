@extends('layouts.admin')
@section('title','SubCategory')
@section('nav-title', 'SubCategory')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title font-weight-bold">Add SubCategory</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.subcategory.save') }}" method="POST">
                        @csrf
                    <input type="hidden" name="id" value="{{$subcategory->id}}">
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{$subcategory->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                         <div class="form-group">
                             <label for="category">Category</label>
                             <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                             {{-- <option value="" selected disabled>Select Option</option> --}}
                             @foreach ($category as $item)
                                    <option value="{{ $item->id }}" {{$item->id==$subcategory->category_id ?'selected': ''}}>{{ $item->name }}</option>
                            @endforeach
                            </select>
                            @error('category_id')
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
