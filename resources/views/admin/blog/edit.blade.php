@extends('layouts.admin')
@section('title','Edit Blog')
@section('nav-title', 'Edit Blog')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Blog</h4>
      </div>
      <div class="card-body">
        <form action="{{route('admin.blogs.store',$blog->id)}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Image*</label>
                <input type="file" class="form-control dropify" name="image" data-default-file="{{asset($blog->image ?? '')}}" max-length="190">
                @if($errors->has('image'))
                {{ $errors->first('image') }}
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Title*</label>
                <input type="text" class="form-control" name="title" value="{{$blog->title ?? ''}}" max-length="190">
                @if($errors->has('title'))
                {{ $errors->first('title') }}
                @endif
              </div>
            </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Meta Title</label>
                <input type="text" class="form-control" name="meta_title" value="{{$blog->meta_title ?? ''}}" max-length="190">
                @if($errors->has('meta_title'))
                {{ $errors->first('meta_title') }}
                @endif
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_keywords" value=" {{$blog->meta_keywords ?? ''}}">
                  @if($errors->has('meta_keywords'))
                  {{ $errors->first('meta_keywords') }}
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Written By</label>
                  <input type="text" class="form-control" name="written_by" value="{{$blog->written_by ?? ''}}" max-length="190">
                  @if($errors->has('written_by'))
                  {{ $errors->first('written_by') }}
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Tags</label>
                    <input type="text" class="form-control" name="tags" value="{{$blog->tags ?? ''}}">
                    @if($errors->has('tags'))
                    {{ $errors->first('tags') }}
                    @endif
                  </div>
                </div>
                
            <div class="col-md-12">
              <div class="form-group">
                <label>Description*</label>
                <textarea type="text" rows="3" class="form-control" name="description">{!! $blog->description ?? '' !!}</textarea>
                @if($errors->has('description'))
                  {{ $errors->first('description') }}
                @endif
              </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea type="text" rows="3" class="form-control" name="meta_description">{{$blog->meta_description ?? ''}}</textarea>
                  @if($errors->has('meta_description'))
                  {{ $errors->first('meta_description') }}
                  @endif
                </div>
              </div>
              
            
          </div>
          <button type="submit" class="btn btn-primary pull-left">Save</button>
          <a href="{{route('admin.dashboard')}}" class="btn btn-danger">Close</a>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
@section('js')
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description');
</script>
@endsection
<script>
    $('#category').val('{{$blog->category_id ?? ''}}');
</script>

@endsection
