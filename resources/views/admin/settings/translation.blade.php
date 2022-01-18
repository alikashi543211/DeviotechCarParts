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
                                <h4 class="card-title">Home / Top Main Menu Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Top Header Right Title</label>
                                            <input type="text" value="{{$language_setting['top_header_right_title'] ?? ''}}" name="top_header_right_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Contact No</label>
                                            <input type="text" value="{{$language_setting['top_header_right_contact_no'] ?? ''}}" name="top_header_right_contact_no" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Main Menu Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / Home</label>
                                            <input type="text" value="{{$language_setting['menu_home'] ?? ''}}" name="menu_home" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / About</label>
                                            <input type="text" value="{{$language_setting['menu_about'] ?? ''}}" name="menu_about" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / Blog</label>
                                            <input type="text" value="{{$language_setting['menu_blog'] ?? ''}}" name="menu_blog" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / FAQs</label>
                                            <input type="text" value="{{$language_setting['menu_faqs'] ?? ''}}" name="menu_faqs" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / Contact</label>
                                            <input type="text" value="{{$language_setting['menu_contact'] ?? ''}}" name="menu_contact" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / Dashboard Button</label>
                                            <input type="text" value="{{$language_setting['menu_dashboard_button'] ?? ''}}" name="menu_dashboard_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu / Become Seller Button</label>
                                            <input type="text" value="{{$language_setting['menu_become_seller_button'] ?? ''}}" name="menu_become_seller_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Banner Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Heading</label>
                                            <input type="text" value="{{$language_setting['banner_heading'] ?? ''}}" name="banner_heading" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Search Filter Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading / Search Using</label>
                                            <input type="text" value="{{$language_setting['search_using_title'] ?? ''}}" name="search_using_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tab / Manual</label>
                                            <input type="text" value="{{$language_setting['search_tab_manual'] ?? ''}}" name="search_tab_manual" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tab / Car Plate No</label>
                                            <input type="text" value="{{$language_setting['search_tab_carplate_no'] ?? ''}}" name="search_tab_carplate_no" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tab / VIN No</label>
                                            <input type="text" value="{{$language_setting['search_tab_vin_no'] ?? ''}}" name="search_tab_vin_no" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 1 Title</label>
                                            <input type="text" value="{{$language_setting['search_filter_one_title'] ?? ''}}" name="search_filter_one_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 1 Placeholder</label>
                                            <input type="text" value="{{$language_setting['search_filter_one_placeholder'] ?? ''}}" name="search_filter_one_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 2 Title</label>
                                            <input type="text" value="{{$language_setting['search_filter_two_title'] ?? ''}}" name="search_filter_two_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 2 Placeholder</label>
                                            <input type="text" value="{{$language_setting['search_filter_two_placeholder'] ?? ''}}" name="search_filter_two_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 3 Title</label>
                                            <input type="text" value="{{$language_setting['search_filter_three_title'] ?? ''}}" name="search_filter_three_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 3 Placeholder</label>
                                            <input type="text" value="{{$language_setting['search_filter_three_placeholder'] ?? ''}}" name="search_filter_three_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 4 Title</label>
                                            <input type="text" value="{{$language_setting['search_filter_four_title'] ?? ''}}" name="search_filter_four_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter 4 Placeholder</label>
                                            <input type="text" value="{{$language_setting['search_filter_four_placeholder'] ?? ''}}" name="search_filter_four_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Search Button Text</label>
                                            <input type="text" value="{{$language_setting['search_filter_button_text'] ?? ''}}" name="search_filter_button_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / How It Work ?</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['home_how_work_section_title'] ?? ''}}" name="home_how_work_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>1st Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['how_work_heading_1'] ?? ''}}" name="how_work_heading_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['how_work_description_1'] ?? ''}}" name="how_work_description_1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>2nd Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['how_work_heading_2'] ?? ''}}" name="how_work_heading_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['how_work_description_2'] ?? ''}}" name="how_work_description_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>3rd Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['how_work_heading_3'] ?? ''}}" name="how_work_heading_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['how_work_description_3'] ?? ''}}" name="how_work_description_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Advertisement Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['home_ads_section_title'] ?? ''}}" name="home_ads_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Testimonial Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['home_testimonial_section_title'] ?? ''}}" name="home_testimonial_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / News & Reviews Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['home_reviews_section_title'] ?? ''}}" name="home_reviews_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Become A Vendor Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['home_become_vendor_section_title'] ?? ''}}" name="home_become_vendor_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Main Caption</label>
                                            <input type="text" value="{{$language_setting['become_vendor_main_caption'] ?? ''}}" name="become_vendor_main_caption" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Caption</label>
                                            <input type="text" value="{{$language_setting['become_vendor_sub_caption'] ?? ''}}" name="become_vendor_sub_caption" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Learn More Button Text</label>
                                            <input type="text" value="{{$language_setting['become_vendor_learn_button'] ?? ''}}" name="become_vendor_learn_button" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Find Car Button Text</label>
                                            <input type="text" value="{{$language_setting['become_vendor_find_car_button'] ?? ''}}" name="become_vendor_find_car_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home / Footer Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">CopyRight text</label>
                                            <input type="text" value="{{$language_setting['home_footer_copyright_text'] ?? ''}}" name="home_footer_copyright_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Follow us text</label>
                                            <input type="text" value="{{$language_setting['home_footer_follow_us_text'] ?? ''}}" name="home_footer_follow_us_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Page -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">About / Banner Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['about_banner_section_title'] ?? ''}}" name="about_banner_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">About / Why Choose us?</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['about_why_choose_us_title'] ?? ''}}" name="about_why_choose_us_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>1st Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['why_choose_heading_1'] ?? ''}}" name="why_choose_heading_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['why_choose_description_1'] ?? ''}}" name="why_choose_description_1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>2nd Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['why_choose_heading_2'] ?? ''}}" name="why_choose_heading_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['why_choose_description_2'] ?? ''}}" name="why_choose_description_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>3rd Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['why_choose_heading_3'] ?? ''}}" name="why_choose_heading_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['why_choose_description_3'] ?? ''}}" name="why_choose_description_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">About / Auto Center Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['auto_center_section_main_title'] ?? ''}}" name="auto_center_section_main_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" value="{{$language_setting['auto_center_section_title'] ?? ''}}" name="auto_center_section_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['auto_center_section_description'] ?? ''}}" name="auto_center_section_description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_title_1'] ?? ''}}" name="auto_center_right_title_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_description_1'] ?? ''}}" name="auto_center_right_description_1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_title_2'] ?? ''}}" name="auto_center_right_title_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_description_2'] ?? ''}}" name="auto_center_right_description_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_title_3'] ?? ''}}" name="auto_center_right_title_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_description_3'] ?? ''}}" name="auto_center_right_description_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_title_4'] ?? ''}}" name="auto_center_right_title_4" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['auto_center_right_description_4'] ?? ''}}" name="auto_center_right_description_4" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Blog / Banner Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['blog_page_banner_title'] ?? ''}}" name="blog_page_banner_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">FAQs / Banner Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['faqs_page_banner_title'] ?? ''}}" name="faqs_page_banner_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">FAQs / Question Answer Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['faqs_page_question_section_title'] ?? ''}}" name="faqs_page_question_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Sub Title</label>
                                            <input type="text" value="{{$language_setting['faqs_page_question_section_sub_title'] ?? ''}}" name="faqs_page_question_section_sub_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Contact / Banner Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['contact_page_banner_title'] ?? ''}}" name="contact_page_banner_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Page -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Contact Page / Contact Info Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['contact_info_section_title'] ?? ''}}" name="contact_info_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>1st Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['contact_section_heading_1'] ?? ''}}" name="contact_section_heading_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" value="{{$language_setting['contact_section_email'] ?? ''}}" name="contact_section_email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Contact No</label>
                                            <input type="text" value="{{$language_setting['contact_section_contact_no'] ?? ''}}" name="contact_section_contact_no" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>2nd Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['contact_section_heading_2'] ?? ''}}" name="contact_section_heading_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['contact_section_description_2'] ?? ''}}" name="contact_section_description_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="font-weight-bold"><strong>3rd Heading</strong></h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Heading</label>
                                            <input type="text" value="{{$language_setting['contact_section_heading_3'] ?? ''}}" name="contact_section_heading_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" value="{{$language_setting['contact_section_description_3'] ?? ''}}" name="contact_section_description_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Contact / Contact Form Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Title</label>
                                            <input type="text" value="{{$language_setting['contact_form_section_title'] ?? ''}}" name="contact_form_section_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name Placeholder</label>
                                            <input type="text" value="{{$language_setting['contact_form_name_placeholder'] ?? ''}}" name="contact_form_name_placeholder" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email Placeholder</label>
                                            <input type="text" value="{{$language_setting['contact_form_email_placeholder'] ?? ''}}" name="contact_form_email_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subject Placeholder</label>
                                            <input type="text" value="{{$language_setting['contact_form_subject_placeholder'] ?? ''}}" name="contact_form_subject_placeholder" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Message Placeholder</label>
                                            <input type="text" value="{{$language_setting['contact_form_message_placeholder'] ?? ''}}" name="contact_form_message_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Sidebar</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu 1</label>
                                            <input type="text" value="{{$language_setting['seller_sidebar_menu_1'] ?? ''}}" name="seller_sidebar_menu_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu 2</label>
                                            <input type="text" value="{{$language_setting['seller_sidebar_menu_2'] ?? ''}}" name="seller_sidebar_menu_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu 3</label>
                                            <input type="text" value="{{$language_setting['seller_sidebar_menu_3'] ?? ''}}" name="seller_sidebar_menu_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu 4</label>
                                            <input type="text" value="{{$language_setting['seller_sidebar_menu_4'] ?? ''}}" name="seller_sidebar_menu_4" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu 5</label>
                                            <input type="text" value="{{$language_setting['seller_sidebar_menu_5'] ?? ''}}" name="seller_sidebar_menu_5" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Menu 6</label>
                                            <input type="text" value="{{$language_setting['seller_sidebar_menu_6'] ?? ''}}" name="seller_sidebar_menu_6" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Dashboard</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Welcome Title</label>
                                            <input type="text" value="{{$language_setting['welcome_title'] ?? ''}}" name="welcome_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Online Title</label>
                                            <input type="text" value="{{$language_setting['online_title'] ?? ''}}" name="online_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Car Part</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title / List</label>
                                            <input type="text" value="{{$language_setting['carpart_list_title'] ?? ''}}" name="carpart_list_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title / Add</label>
                                            <input type="text" value="{{$language_setting['carpart_add_title'] ?? ''}}" name="carpart_add_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title / Edit</label>
                                            <input type="text" value="{{$language_setting['carpart_edit_title'] ?? ''}}" name="carpart_edit_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Scrap Yard</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title / List</label>
                                            <input type="text" value="{{$language_setting['scrap_yard_list_title'] ?? ''}}" name="scrap_yard_list_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title / Add</label>
                                            <input type="text" value="{{$language_setting['scrap_yard_add_title'] ?? ''}}" name="scrap_yard_add_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title / Edit</label>
                                            <input type="text" value="{{$language_setting['scrap_yard_edit_title'] ?? ''}}" name="scrap_yard_edit_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Car Part Listing</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Car Make</label>
                                            <input type="text" value="{{$language_setting['col_car_make'] ?? ''}}" name="col_car_make" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Car Model</label>
                                            <input type="text" value="{{$language_setting['col_car_model'] ?? ''}}" name="col_car_model" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Car Trim</label>
                                            <input type="text" value="{{$language_setting['col_car_trim'] ?? ''}}" name="col_car_trim" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Status</label>
                                            <input type="text" value="{{$language_setting['col_status'] ?? ''}}" name="col_status" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Profile Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Heading</label>
                                            <input type="text" value="{{$language_setting['profile_page_heading'] ?? ''}}" name="profile_page_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Profile Tab</label>
                                            <input type="text" value="{{$language_setting['profile_tab'] ?? ''}}" name="profile_tab" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Change Password Tab</label>
                                            <input type="text" value="{{$language_setting['change_password_tab'] ?? ''}}" name="change_password_tab" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Full Name Label</label>
                                            <input type="text" value="{{$language_setting['profile_full_name_label'] ?? ''}}" name="profile_full_name_label" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Company Name Label</label>
                                            <input type="text" value="{{$language_setting['seller_profile_company_name_label'] ?? ''}}" name="seller_profile_company_name_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone Label</label>
                                            <input type="text" value="{{$language_setting['profile_phone_label'] ?? ''}}" name="profile_phone_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email Label</label>
                                            <input type="text" value="{{$language_setting['profile_email_label'] ?? ''}}" name="profile_email_label" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Picture Label</label>
                                            <input type="text" value="{{$language_setting['profile_picture_label'] ?? ''}}" name="profile_picture_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Street Address Label</label>
                                            <input type="text" value="{{$language_setting['profile_street_address'] ?? ''}}" name="profile_street_address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">House No Label</label>
                                            <input type="text" value="{{$language_setting['profile_house_no_label'] ?? ''}}" name="profile_house_no_label" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Extension Label</label>
                                            <input type="text" value="{{$language_setting['profile_extension_label'] ?? ''}}" name="profile_extension_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Website Label</label>
                                            <input type="text" value="{{$language_setting['profile_website_label'] ?? ''}}" name="profile_website_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">City Label</label>
                                            <input type="text" value="{{$language_setting['profile_city_label'] ?? ''}}" name="profile_city_label" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">State Label</label>
                                            <input type="text" value="{{$language_setting['profile_state_label'] ?? ''}}" name="profile_state_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Zip Code Label</label>
                                            <input type="text" value="{{$language_setting['profile_zip_code_label'] ?? ''}}" name="profile_zip_code_label" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Introduction Label</label>
                                            <input type="text" value="{{$language_setting['profile_introduction_label'] ?? ''}}" name="profile_introduction_label" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Old Password Label</label>
                                            <input type="text" value="{{$language_setting['profile_old_password'] ?? ''}}" name="profile_old_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">New Password Label</label>
                                            <input type="text" value="{{$language_setting['profile_new_password'] ?? ''}}" name="profile_new_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Confirm Password Label</label>
                                            <input type="text" value="{{$language_setting['profile_confirm_password'] ?? ''}}" name="profile_confirm_password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Update Button Label</label>
                                            <input type="text" value="{{$language_setting['update_button'] ?? ''}}" name="update_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Plan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['plan_page_title'] ?? ''}}" name="plan_page_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Login</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Login Title</label>
                                            <input type="text" value="{{$language_setting['login_titlel'] ?? ''}}" name="login_titlel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Title</label>
                                            <input type="text" value="{{$language_setting['login_sub_title'] ?? ''}}" name="login_sub_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Username Placeholder</label>
                                            <input type="text" value="{{$language_setting['username_placeholder'] ?? ''}}" name="username_placeholder" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password Placeholder</label>
                                            <input type="text" value="{{$language_setting['password_placeholder'] ?? ''}}" name="password_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Remember me</label>
                                            <input type="text" value="{{$language_setting['remember_me'] ?? ''}}" name="remember_me" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Forgot    </label>
                                            <input type="text" value="{{$language_setting['forgot_title'] ?? ''}}" name="forgot_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Register link text</label>
                                            <input type="text" value="{{$language_setting['register_link'] ?? ''}}" name="register_link" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Forgot Password Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Main Heading</label>
                                            <input type="text" value="{{$language_setting['forgot_main_heading'] ?? ''}}" name="forgot_main_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Heading</label>
                                            <input type="text" value="{{$language_setting['forgot_sub_heading'] ?? ''}}" name="forgot_sub_heading" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password Reset Button</label>
                                            <input type="text" value="{{$language_setting['password_reset_button'] ?? ''}}" name="password_reset_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Reset Password Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Main Heading</label>
                                            <input type="text" value="{{$language_setting['reset_main_heading'] ?? ''}}" name="reset_main_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Heading</label>
                                            <input type="text" value="{{$language_setting['reset_sub_heading'] ?? ''}}" name="reset_sub_heading" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Reset Button</label>
                                            <input type="text" value="{{$language_setting['reset_button_text'] ?? ''}}" name="reset_button_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Register</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Main Heading</label>
                                            <input type="text" value="{{$language_setting['seller_reg_main_heading'] ?? ''}}" name="seller_reg_main_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Heading</label>
                                            <input type="text" value="{{$language_setting['seller_register_sub_heading'] ?? ''}}" name="seller_register_sub_heading" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Already seller Text</label>
                                            <input type="text" value="{{$language_setting['already_seller_text'] ?? ''}}" name="already_seller_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subscribe Text</label>
                                            <input type="text" value="{{$language_setting['subscribe_text'] ?? ''}}" name="subscribe_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Click here text</label>
                                            <input type="text" value="{{$language_setting['click_here_text'] ?? ''}}" name="click_here_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">I accept</label>
                                            <input type="text" value="{{$language_setting['i_accept_text'] ?? ''}}" name="i_accept_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Terms of use text</label>
                                            <input type="text" value="{{$language_setting['term_of_use_text'] ?? ''}}" name="term_of_use_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Privacy policy text</label>
                                            <input type="text" value="{{$language_setting['privacy_policy_text'] ?? ''}}" name="privacy_policy_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Submit Now Button text</label>
                                            <input type="text" value="{{$language_setting['submit_now_button'] ?? ''}}" name="submit_now_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Reviews</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['reviews_page_title'] ?? ''}}" name="reviews_page_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" value="{{$language_setting['reviews_col_name'] ?? ''}}" name="reviews_col_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" value="{{$language_setting['reviews_col_email'] ?? ''}}" name="reviews_col_email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subject</label>
                                            <input type="text" value="{{$language_setting['reviews_col_subject'] ?? ''}}" name="reviews_col_subject" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Status</label>
                                            <input type="text" value="{{$language_setting['reviews_col_status'] ?? ''}}" name="reviews_col_status" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Review</label>
                                            <input type="text" value="{{$language_setting['reviews_col_review'] ?? ''}}" name="reviews_col_review" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Action</label>
                                            <input type="text" value="{{$language_setting['action_title'] ?? ''}}" name="action_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Stars</label>
                                            <input type="text" value="{{$language_setting['reviews_col_stars'] ?? ''}}" name="reviews_col_stars" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Buttons</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Add Button</label>
                                            <input type="text" value="{{$language_setting['add_button'] ?? ''}}" name="add_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Edit Button</label>
                                            <input type="text" value="{{$language_setting['edit_button'] ?? ''}}" name="edit_button" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Delete Button</label>
                                            <input type="text" value="{{$language_setting['delete_button'] ?? ''}}" name="delete_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Change Status</label>
                                            <input type="text" value="{{$language_setting['change_status_button'] ?? ''}}" name="change_status_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard / Post Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Car Make Title</label>
                                            <input type="text" value="{{$language_setting['post_car_make_title'] ?? ''}}" name="post_car_make_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Car Make Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_make_placeholder'] ?? ''}}" name="post_car_make_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Modal Title</label>
                                            <input type="text" value="{{$language_setting['post_car_model_title'] ?? ''}}" name="post_car_model_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Model Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_model_placeholder'] ?? ''}}" name="post_car_model_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Trim Title</label>
                                            <input type="text" value="{{$language_setting['post_car_trim_title'] ?? ''}}" name="post_car_trim_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Trim Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_trim_placeholder'] ?? ''}}" name="post_car_trim_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Title</label>
                                            <input type="text" value="{{$language_setting['post_car_category_title'] ?? ''}}" name="post_car_category_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_category_placeholder'] ?? ''}}" name="post_car_category_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Category Title</label>
                                            <input type="text" value="{{$language_setting['post_car_sub_category_title'] ?? ''}}" name="post_car_sub_category_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub Category Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_sub_category_placeholder'] ?? ''}}" name="post_car_sub_category_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price Title</label>
                                            <input type="text" value="{{$language_setting['post_car_price_title'] ?? ''}}" name="post_car_price_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_price_placeholder'] ?? ''}}" name="post_car_price_placeholder" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description Title</label>
                                            <input type="text" value="{{$language_setting['post_car_description_title'] ?? ''}}" name="post_car_description_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Image Title</label>
                                            <input type="text" value="{{$language_setting['post_car_image_title'] ?? ''}}" name="post_car_image_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Image Placeholder</label>
                                            <input type="text" value="{{$language_setting['post_car_image_placeholder'] ?? ''}}" name="post_car_image_placeholder" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Submit Button</label>
                                            <input type="text" value="{{$language_setting['post_car_submit_button'] ?? ''}}" name="post_car_submit_button" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Search Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['search_page_title'] ?? ''}}" name="search_page_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Filter Title</label>
                                            <input type="text" value="{{$language_setting['search_filter_title'] ?? ''}}" name="search_filter_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Other Advertisement Title</label>
                                            <input type="text" value="{{$language_setting['other_advertisement_title'] ?? ''}}" name="other_advertisement_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Not Found Heading</label>
                                            <input type="text" value="{{$language_setting['not_found_heading'] ?? ''}}" name="not_found_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Not Found Sub Heading</label>
                                            <input type="text" value="{{$language_setting['not_found_sub_heading'] ?? ''}}" name="not_found_sub_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">CarPart Tab Text</label>
                                            <input type="text" value="{{$language_setting['carpart_tab_text'] ?? ''}}" name="carpart_tab_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ScrapYard Tab Text</label>
                                            <input type="text" value="{{$language_setting['scrapyard_tab_text'] ?? ''}}" name="scrapyard_tab_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Add To Fav Text</label>
                                            <input type="text" value="{{$language_setting['add_to_fav_text'] ?? ''}}" name="add_to_fav_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Dealer Text</label>
                                            <input type="text" value="{{$language_setting['dealer_text'] ?? ''}}" name="dealer_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sort By Option 1 Text</label>
                                            <input type="text" value="{{$language_setting['sort_by_option_1_text'] ?? ''}}" name="sort_by_option_1_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sort By Option 2 Text</label>
                                            <input type="text" value="{{$language_setting['sort_by_option_2_text'] ?? ''}}" name="sort_by_option_2_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sort By Option 3 Text</label>
                                            <input type="text" value="{{$language_setting['sort_by_option_3_text'] ?? ''}}" name="sort_by_option_3_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sort By Option 4 Text</label>
                                            <input type="text" value="{{$language_setting['sort_by_option_4_text'] ?? ''}}" name="sort_by_option_4_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Dashboard</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Pending Status Text</label>
                                            <input type="text" value="{{$language_setting['pending_text'] ?? ''}}" name="pending_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Active Status Text</label>
                                            <input type="text" value="{{$language_setting['active_text'] ?? ''}}" name="active_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sold Status Text</label>
                                            <input type="text" value="{{$language_setting['sold_text'] ?? ''}}" name="sold_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Reserved Status Text</label>
                                            <input type="text" value="{{$language_setting['reserved_text'] ?? ''}}" name="reserved_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Plan Interval Month text</label>
                                            <input type="text" value="{{$language_setting['plan_interval_month_text'] ?? ''}}" name="plan_interval_month_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Plan Interval Year text</label>
                                            <input type="text" value="{{$language_setting['plan_interval_year_text'] ?? ''}}" name="plan_interval_year_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Plan Ultimate text</label>
                                            <input type="text" value="{{$language_setting['plan_ultimate_text'] ?? ''}}" name="plan_ultimate_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Cancel Subscription Button Text</label>
                                            <input type="text" value="{{$language_setting['cancel_subscription_button_text'] ?? ''}}" name="cancel_subscription_button_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Purchased Text</label>
                                            <input type="text" value="{{$language_setting['purchased_text'] ?? ''}}" name="purchased_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Buy Now Button Text</label>
                                            <input type="text" value="{{$language_setting['buy_now_button_text'] ?? ''}}" name="buy_now_button_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Buy Package Text</label>
                                            <input type="text" value="{{$language_setting['buy_package_text'] ?? ''}}" name="buy_package_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Please Select Plan Text</label>
                                            <input type="text" value="{{$language_setting['please_plan_text'] ?? ''}}" name="please_plan_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Logout Text</label>
                                            <input type="text" value="{{$language_setting['logout_text'] ?? ''}}" name="logout_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Seller Profile Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Page Title</label>
                                            <input type="text" value="{{$language_setting['profile_page_title'] ?? ''}}" name="profile_page_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Seller Info Title</label>
                                            <input type="text" value="{{$language_setting['seller_info_title'] ?? ''}}" name="seller_info_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Introduce Title Text</label>
                                            <input type="text" value="{{$language_setting['introduce_title'] ?? ''}}" name="introduce_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Inventory Title Text</label>
                                            <input type="text" value="{{$language_setting['inventory_title'] ?? ''}}" name="inventory_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Reviews Title Text</label>
                                            <input type="text" value="{{$language_setting['reviews_title_text'] ?? ''}}" name="reviews_title_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Average Rating Text</label>
                                            <input type="text" value="{{$language_setting['average_rating_text'] ?? ''}}" name="average_rating_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Star Text</label>
                                            <input type="text" value="{{$language_setting['star_text'] ?? ''}}" name="star_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Review Form Title Text</label>
                                            <input type="text" value="{{$language_setting['review_form_title_text'] ?? ''}}" name="review_form_title_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subject Label Text</label>
                                            <input type="text" value="{{$language_setting['review_form_subject_text'] ?? ''}}" name="review_form_subject_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Star Rating Label Text</label>
                                            <input type="text" value="{{$language_setting['star_rating_label_text'] ?? ''}}" name="star_rating_label_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Review Placeholder Text</label>
                                            <input type="text" value="{{$language_setting['review_form_email_text'] ?? ''}}" name="review_form_email_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Submit Review Button Text</label>
                                            <input type="text" value="{{$language_setting['submit_review_btn_text'] ?? ''}}" name="submit_review_btn_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Login To Review Button Text</label>
                                            <input type="text" value="{{$language_setting['login_to_review_button'] ?? ''}}" name="login_to_review_button" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">See More Reviews Text</label>
                                            <input type="text" value="{{$language_setting['see_more_reviews_text'] ?? ''}}" name="see_more_reviews_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Advertisement Detail Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description Text</label>
                                            <input type="text" value="{{$language_setting['detail_description_text'] ?? ''}}" name="detail_description_text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Similar Listing Text</label>
                                            <input type="text" value="{{$language_setting['similar_listing_text'] ?? ''}}" name="similar_listing_text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Footer Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Footer Description</label>
                                            <input type="text" value="{{$language_setting['footer_description'] ?? ''}}" name="footer_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone</label>
                                            <input type="text" value="{{$language_setting['phone'] ?? ''}}" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" value="{{$language_setting['email'] ?? ''}}" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Fax</label>
                                            <input type="text" value="{{$language_setting['fax'] ?? ''}}" name="fax" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Address</label>
                                            <input type="text" value="{{$language_setting['address'] ?? ''}}" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Copyright</label>
                                            <input type="text" value="{{$language_setting['copyright'] ?? ''}}" name="copyright" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Social Links</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Facebook</label>
                                            <input type="text" value="{{$language_setting['facebook'] ?? ''}}" name="facebook" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Instagram</label>
                                            <input type="text" value="{{$language_setting['instagram'] ?? ''}}" name="instagram" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Twitter</label>
                                            <input type="text" value="{{$language_setting['twitter'] ?? ''}}" name="twitter" class="form-control">
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

@endsection