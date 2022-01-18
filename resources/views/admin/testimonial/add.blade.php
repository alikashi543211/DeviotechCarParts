@extends('layouts.admin')
@section('title',' Add Testimonial')
@section('nav-title', 'Add Testimonial')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/star_rating.css')}}">
    <style type="text/css">
        .form-group input[type=file] {
            opacity: 1 !important;
            position: static !important;
        }
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title font-weight-bold">Add Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.testimonial.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="testimonial_img_div">
                                            <label for="testimonial_img_input"><img src="{{ asset('images') }}/default.png" id="testimonial_image"></label>
                                            <input id="testimonial_img_input" class="d-none" type="file" accept="image/*" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation">
                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <label>Rating</label><br>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    @if($errors->has('rating'))
                                        <br>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('rating')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Review</label>
                                <textarea name="review" class="form-control @error('review') is-invalid @enderror" rows="5"></textarea>
                                @error('review')
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

        $("#testimonial_img_input").change(function() {
            readURL(this);
        });
        
    </script>
@endsection


