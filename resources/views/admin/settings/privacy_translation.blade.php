@extends('layouts.admin')
@section('title','CMS Settings')
@section('nav-title', 'Website Settings')


@section('content')
<section>
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{route('admin.settings.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="language_id" value="{{ $id }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Privacy & Policy</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Privacy & Policy</label>
                                            <textarea name="privacy">{{ $language_setting['privacy'] ?? '' }}</textarea>
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
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script>
  CKEDITOR.replace('privacy');
</script>
@endsection