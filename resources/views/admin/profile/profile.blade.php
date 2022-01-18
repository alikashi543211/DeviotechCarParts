@extends('layouts.admin')
@section('title','Profile')
@section('css')
    <style>
        .nav-tabs .nav-item .nav-link.active 
        {
            background-color: rgb(157 54 179) !important;
            color: #fff !important;
        }
    </style>
@endsection
@section('nav-title', 'Profile')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-toggle="tab">
                                            <i class="material-icons">bug_report</i> Profile
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" data-toggle="tab">
                                            <i class="material-icons">code</i> Change Password
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <form action="{{route('admin.profile.update_profile')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input type="text" value="{{ auth()->user()->name }}" class="form-control" name="name">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email</label>
                                                <input type="email" value="{{ auth()->user()->email }}" class="form-control" name="email">
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-left">Add</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger pull-left">Close</a>
                                </form>
                            </div>
                            <div class="tab-pane" id="messages">
                                <div class="clearfix">
                                    <form action="{{route('admin.profile.reset_password')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Old Password</label>
                                                    <input type="text" class="form-control" name="old_password">
                                                    @error('old_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">New Password</label>
                                                    <input type="text" class="form-control" name="new_password">
                                                    @error('new_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Confirm New Password</label>
                                                    <input type="text" class="form-control" name="confirm_password">
                                                    @error('confirm_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-left">Add</button>
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger pull-left">Close</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
