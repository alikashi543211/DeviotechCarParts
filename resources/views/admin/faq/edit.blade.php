@extends('layouts.admin')
@section('title',' Edit FAQ')
@section('nav-title', 'Edit FAQ')
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
                    <h4 class="card-title font-weight-bold">Edit FAQ</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.faq.save',$item->id) }}">
                        @csrf
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $item->question }}">
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Answer</label>
                            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" value="{{ $item->question }}" rows="5">{{ $item->answer }}</textarea>
                            @error('answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script>
  CKEDITOR.replace('answer');
</script>
@endsection


