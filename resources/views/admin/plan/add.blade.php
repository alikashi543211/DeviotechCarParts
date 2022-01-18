@extends('layouts.admin')
@section('title',' Add Plan')
@section('nav-title', 'Add Plan')
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
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                @foreach($languages as $index => $language)
                                    <li class="nav-item">
                                        <a class="nav-link {{$index !== 0 ?: 'active'}}" href="#language_{{$language->short_code}}" data-toggle="tab">
                                            {{$language->name}}
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.plan.save')}}" method="POST"
                                  enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="tab-content">
                            @foreach($languages as $index => $language)
                                <div class="tab-pane {{$index !== 0 ?: "active"}}"" id="language_{{$language->short_code}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name <small>({{$language->short_code}})</small>:</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="{{$language->short_code}}[name]" autocomplete="off" value="{{old('name')}}">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description<small>({{$language->short_code}})</small>:</label>
                                                <textarea  id="description" name="{{$language->short_code}}[description]" class="form-control @error('description') is-invalid @enderror"
                                                           rows="8" cols="4">{{old('description')}}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row">
                                <input type="hidden" name="currency" value="{{ 'USD' }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Type</label>
                                        <select id="subscription_type" class="form-control" name="subscription_type">
                                            <option value="" selected disabled>Select Option</option>
                                            <option value="1">Car Parts Advertisement</option>
                                            <option value="2">ScrapYard Car Advertisement</option>
                                            <option value="3">Ultimate Advertisement</option>

                                        </select>
                                        @error('subscription_type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="interval">Interval</label>
                                        <select id="interval" class="form-control" name="interval">
                                            <option value="" selected disabled>Select Option</option>
                                            <option value="month">Monthly</option>
                                            <option value="year">Yearly</option>
                                        </select>
                                        @error('interval')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <input type="hidden" name="currency" value="USD">
                                            <div class="col-12 col-md-12">
                                                <label for="amount">Amount</label>
                                                <input type="number" step=".02" id="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{old('amount')}}">
                                                @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
 <script type="text/javascript">


 </script>
@endsection


