@extends('layouts.admin')
@section('title',' Add FAQ')
@section('nav-title', 'Add FAQ')
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
                    <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#english-form" data-toggle="tab">
                                             En
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#french-form" data-toggle="tab">
                                             Fr
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.faq.save') }}">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="english-form">
                                <div class="form-group">
                                    <label>Question (EN)</label>
                                    <input type="text" class="form-control @error('question') is-invalid @enderror" name="en_question">
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Answer (EN)</label>
                                    <textarea name="en_answer" class="form-control @error('answer') is-invalid @enderror" rows="5"></textarea>
                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane" id="french-form">
                                <div class="form-group">
                                    <label>Question (FR)</label>
                                    <input type="text" class="form-control @error('question') is-invalid @enderror" name="fr_question">
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Answer (FR)</label>
                                    <textarea name="fr_answer" class="form-control @error('answer') is-invalid @enderror" rows="5"></textarea>
                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <button class="btn btn-primary">Save</button>
                        <a class="btn btn-danger text-white" href="{{ route('admin.dashboard') }}">Cancel</a>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection


