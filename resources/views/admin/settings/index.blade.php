@extends('layouts.admin')
@section('title','CMS Settings')
@section('nav-title', 'Website Settings')

@section('css')

<style>
    .testimonial_img_div
    {
        width: 80px;
        height: 80px;
    }
    .testimonial_img_div img
    {
        height: 100%;
        width: 100%;
        border-radius: 100%;
    }
</style>

@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{route('admin.settings.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="fix_setting" value="1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Banner Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Light Logo</label>
                                            <div class="testimonial_img_div">
                                                <label for="testimonial_img_input">
                                                    @if(isset($fix_setting['logo']))
                                                        <img src="{{ asset($fix_setting['logo']) }}" id="testimonial_image">
                                                    @else
                                                        <img src="{{ asset('images') }}/default.png" id="testimonial_image">
                                                    @endif
                                                </label>
                                                <input id="testimonial_img_input" class="d-none" type="file" accept="image/*" name="logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dark Logo</label>
                                            <div class="testimonial_img_div">
                                                <label for="testimonial_img_input_second">
                                                    @if(isset($fix_setting['dark_logo']))
                                                        <img src="{{ asset($fix_setting['dark_logo']) }}" id="testimonial_image_second">
                                                    @else
                                                        <img src="{{ asset('images') }}/default.png" id="testimonial_image_second">
                                                    @endif
                                                </label>
                                                <input id="testimonial_img_input_second" class="d-none" type="file" accept="image/*" name="dark_logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <label>Banner Image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="banner_image" data-default-file="{{ asset($fix_setting['banner_image'] ?? '')  }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group pull-right mb-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('js')

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function(e) {
                $('#testimonial_image').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        function readURLSecond(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function(e) {
                $('#testimonial_image_second').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#testimonial_img_input").change(function() {
            readURL(this);
        });

        $("#testimonial_img_input_second").change(function() {
            readURLSecond(this);
        });
</script>

@endsection
