@extends('layouts.seller')
@section('title','Profile')

@section('content')
<div class="content-header row">
    <div class="col-12">
        <h2>{{siteSetting()['profile_page_heading'] ?? ''}}</h2>
    </div>
</div>
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-toggle="tab">
                                            {{siteSetting()['profile_tab'] ?? ''}}
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" data-toggle="tab">
                                            {{siteSetting()['change_password_tab'] ?? ''}}
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
                                <form action="{{route('seller.profile.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_full_name_label'] ?? ''}}</label>
                                                <input type="text" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror" name="name">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('name')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['seller_profile_company_name_label'] ?? ''}}</label>
                                                <input type="text" value="{{ seller()->company_name }}" class="form-control @error('company_name') is-invalid @enderror" name="company_name">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('company_name')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_phone_label'] ?? ''}}</label>
                                                <input type="text" value="{{ seller()->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('phone')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating @error('email') is-invalid @enderror">{{siteSetting()['profile_email_label'] ?? ''}}</label>
                                                <input type="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror" name="email" readonly>
                                                <span class="invalid-feedback" role="alert">
                                                    @error('email')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img id="image-preview" src="@if(isset(auth()->user()->sellerProfile->picture)) {{asset(auth()->user()->sellerProfile->picture)}} @else {{asset('default.png')}} @endif" class="rounded-circle" alt="profile image" height="64" width="64">
                                        </div>

                                        <div class="col-md-6">
                                            <label>{{siteSetting()['profile_picture_label'] ?? ''}}</label><br>
                                            <input type="file" name="picture" accept="image/*" id="account-upload" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating @error('street_address') is-invalid @enderror">{{siteSetting()['profile_street_address'] ?? ''}}</label>
                                                <input type="text" value="{{ seller()->street_address }}" class="form-control @error('street_address') is-invalid @enderror" name="street_address">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('street_address')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating @error('house_number') is-invalid @enderror">{{siteSetting()['profile_house_no_label'] ?? ''}}</label>
                                                <input type="text" value="{{ seller()->house_number }}" class="form-control @error('house_number') is-invalid @enderror" name="house_number">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('house_number')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating @error('extension') is-invalid @enderror">{{siteSetting()['profile_extension_label'] ?? ''}}</label>
                                                <input type="text" value="{{ seller()->extension }}" class="form-control @error('extension') is-invalid @enderror" name="extension">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('extension')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating @error('extension') is-invalid @enderror">{{siteSetting()['profile_website_label'] ?? ''}}</label>
                                                <input type="text" value="{{ seller()->website }}" class="form-control @error('website') is-invalid @enderror" name="website">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('website')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_city_label'] ?? ''}}</label>
                                                <input type="text" name="city" placeholder="City" class="form-control @error('city') is-invalid @enderror" autocomplete="off" value="{{seller()->city ?? ''}}">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('city')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_state_label'] ?? ''}}</label>
                                                <input type="text" name="state" placeholder="State" class="form-control @error('state') is-invalid @enderror" autocomplete="off" value="{{seller()->state ?? ''}}">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('state')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_zip_code_label'] ?? ''}}</label>
                                                <input type="text" name="zip_code" placeholder="Zip Code" class="form-control @error('zip_code') is-invalid @enderror" autocomplete="off" value="{{auth()->user()->sellerProfile->zip_code ?? ''}}">
                                                <span class="invalid-feedback" role="alert">
                                                    @error('zip_code')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">{{siteSetting()['profile_introduction_label'] ?? ''}}</label>
                                                <textarea id="description" name="introduction" class="form-control @error('introduction') is-invalid @enderror" rows="8" cols="4">{{ auth()->user()->sellerProfile->introduction }}</textarea>
                                                @error('introduction')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-left">Update</button>
                                </form>
                            </div>

                            <div class="tab-pane" id="messages">
                                <form action="{{ route('seller.profile.reset_password') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_old_password'] ?? ''}}</label>
                                                <input type="text" class="form-control" name="old_password">
                                                @error('old_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_new_password'] ?? ''}}</label>
                                                <input type="text" class="form-control" name="new_password">
                                                @error('new_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{siteSetting()['profile_confirm_password'] ?? ''}}</label>
                                                <input type="text" class="form-control" name="confirm_password">
                                                @error('confirm_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-left">{{siteSetting()['update_button'] ?? ''}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    CKEDITOR.replace( 'description' );
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#account-upload").change(function() {
        readURL(this);
    });

</script>

@endsection
