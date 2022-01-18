@extends('layouts.seller')
@section('title',' Edit Car Part Advertisement')
@section('content')
<div class="content-header row">
    <div class="col-12">
        <h2>Edit Car Part Advertisements</h2>
    </div>
</div>
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('seller.car.part.advertisement.save', $carPartAdvertisement->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="sub_category_id">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $carPartAdvertisement->title ?? '' }}" placeholder="Title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="car_make">{{siteSetting()['post_car_make_title']}}</label>
                                        <select id="car_make" class="form-control @error('car_make') is-invalid @enderror" name="car_make">
                                            <option value="" selected disabled>{{siteSetting()['post_car_make_placeholder']}}</option>
                                            @foreach($carMake as $item)
                                                <option value="{{ $item->id_car_make }}" {{ $carPartAdvertisement->car_make_id == $item->id_car_make ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('car_make')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="car_model">{{siteSetting()['post_car_model_title']}}</label>
                                        <select id="car_model" class="form-control @error('car_model') is-invalid @enderror" name="car_model">
                                            <option value="" selected disabled>{{siteSetting()['post_car_model_placeholder']}}</option>
                                            @foreach($carModel as $item)
                                                <option value="{{ $item->id_car_model }}" {{ $carPartAdvertisement->car_model_id == $item->id_car_model ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('car_model')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="car_trim">{{siteSetting()['post_car_trim_title']}}</label>
                                        <select id="car_trim" class="form-control @error('car_trim') is-invalid @enderror" name="car_trim">
                                            <option value="" selected disabled>{{siteSetting()['post_car_trim_placeholder']}}</option>
                                            @foreach($carTrim as $item)
                                                <option value="{{ $item->id_car_trim }}" {{ $carPartAdvertisement->car_trim_id == $item->id_car_trim ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('car_model')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="category_id">{{siteSetting()['post_car_category_title']}}</label>
                                        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            <option value="" selected disabled>{{siteSetting()['post_car_category_placeholder']}}</option>
                                            @foreach($category as $item)
                                                <option value="{{ $item->id }}" {{ $carPartAdvertisement->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sub_category_id">{{siteSetting()['post_car_sub_category_title']}}</label>
                                        <select id="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror" name="sub_category_id">
                                            <option value="" selected disabled>{{siteSetting()['post_car_sub_category_placeholder']}}</option>
                                            @foreach($subCategory as $item)
                                                <option value="{{ $item->id }}" {{ $carPartAdvertisement->sub_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sub_category_id">{{siteSetting()['post_car_price_title']}}</label>
                                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $carPartAdvertisement->price }}" placeholder="{{siteSetting()['post_car_price_placeholder']}}">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">{{siteSetting()['post_car_description_title']}}</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="8" cols="4">{{ $carPartAdvertisement->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{siteSetting()['post_car_image_title']}}</label>
                                <div class="row">
                                    @foreach ($carPartAdvertisement->carPartImages as $item)
                                    <div class="col-lg-2 col-4">
                                        <div class="img-uploader">
                                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                        </div>
                                        <span class="delete-img" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></span>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row mt-2" id="gallery-container">
                                    <div class="col-lg-2 col-4 mb-2">
                                        <div class="img-uploader"><input type="file" name="images[]" class="dropify" data-height="100"></div>
                                        <span class="add-img"><i class="fa fa-plus-square"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{siteSetting()['post_car_submit_button']}}</button>
                            </div>
                        </form>
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
    $(document).ready(function(){

        $('#car_make').on('change', function(){
            $("#car_model").prop("disabled", true);
            $("#car_trim").prop("disabled", true);
            var id = this.value;
            $.ajax({
                url: "{{ route('seller.car.part.advertisement.model') }}/"+id,
                method: "GET",
                success: function(data) {
                    console.log(data);
                    if(data[1] > 0){
                        $('#car_model').html(data[0]);
                        $("#car_model").prop("disabled", false);
                    } else{
                        $("#car_model").prop("disabled", true);
                    }
                }
            });
        });

        $('#car_model').on('change', function(){
            $("#car_trim").prop("disabled", true);
            var id = this.value;
            $.ajax({
                url: "{{ route('seller.car.part.advertisement.trim') }}/"+id,
                method: "GET",
                success: function(data) {
                    if(data[1] > 0){
                        $('#car_trim').html(data[0]);
                        $("#car_trim").prop("disabled", false);
                    } else{
                        $("#car_trim").html('<option value="" selected disabled>Select Car Trim</option>')
                        $("#car_trim").prop("disabled", true);
                    }
                }
            });
        });

        $('#category_id').on('change', function(){
            var id = this.value;
            $.ajax({
                url: "{{ route('seller.car.part.advertisement.sub.category') }}/"+id,
                method: "GET",
                success: function(data) {
                    console.log(data);
                    if(data[1]>0)
                    {
                        $('#sub_category_id').html(data[0]);
                        $("#sub_category_id").prop("disabled", false);
                    }
                    else{
                        $("#sub_category_id").html('<option value="" selected disabled>Select Sub Category</option>')
                        $('#sub_category_id').prop("disabled",true)
                    }
                }
            });
        });

        $(".delete-img").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $(this).closest('.col-2').remove();
            $.ajax({
                type: "GET",
                url: "{{ route('seller.car.part.advertisement.delete.image') }}/"+id,
                success: function (response) {
                    toastr.success(response.success);
                }
            });
        });
    });

    // Images Add
    $(document).on('click', '.add-img', function(){
        $('#gallery-container').append(
        '<div class="col-lg-2 col-4 mb-2">\
            <div class="img-uploader"><input type="file" name="images[]" class="dropify" data-height="100"></div>\
            <span class="remove-img"><i class="fa fa-trash"></i></span>\
            <span class="add-img"><i class="fa fa-plus-square"></i></span>\
        </div>');
        $('.dropify').dropify();
    });

    $(document).on('click', '.remove-img', function(){
        $(this).closest('.col-lg-2').remove();
    });

 </script>
@endsection

