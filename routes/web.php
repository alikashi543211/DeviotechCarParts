<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:clear');
    return 'CACHE CLEARED'; //Return anything
});

//Translation Localization
Route::get('setlocale/{locale}',function($lang){
    App::setLocale($lang);
    session(['site_locale'=>$lang]);
    return back();
})->name('set.language');

Route::get('/', 'HomeController@home')->name('home');
Route::get('/blogs', 'HomeController@blogs')->name('blogs');
Route::get('/blog/{slug?}', 'HomeController@blogDetail')->name('blog.detail');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/term-conditions', 'HomeController@termConditions')->name('terms');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('privacy');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/detail/{slug?}', 'HomeController@detail')->name('detail');
Route::get('/advance/search','HomeController@filtration')->name('advance.search');
Route::get('/seller-profile/{id?}', 'HomeController@sellerProfile')->name('seller_profile');
Route::post('save-review', 'HomeController@saveReview')->name('review.save');
Route::post('contact_us', 'ContactUsController@contact_us')->name('contact_us');

// Authenticated User Routes
Route::prefix('user')->name('user.')->namespace('User')->middleware('auth', 'user')->group(function() {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::get('favourite-advertisement', 'DashboardController@saveFavourite')->name('advertisement.favourite');

    Route::post('update-profile', 'DashboardController@updateProfile')->name('update.profile');
    Route::post('update-password', 'DashboardController@updatePassword')->name('update.password');
});

// START ALL ADMIN ROUTES
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth', 'admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::name('category.')->prefix('/category')->group(function(){
        Route::get('/list', 'CategoryController@index')->name('list');
        Route::get('add', 'CategoryController@add')->name('add');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('save/{id?}', 'CategoryController@save')->name('save');
        Route::get('delete/{id}', 'CategoryController@delete')->name('delete');
    });
   Route::name('subcategory.')->prefix('subcategory')->group(function(){
        Route::get('list', 'SubCategoryController@index')->name('list');
        Route::get('add', 'SubCategoryController@add')->name('add');
        Route::get('edit/{id}', 'SubCategoryController@edit')->name('edit');
        Route::post('save/{id?}', 'SubCategoryController@save')->name('save');
        Route::get('delete/{id}', 'SubCategoryController@delete')->name('delete');
    });
    Route::name('plan.')->prefix('plan')->group(function(){
        Route::get('list', 'PlanController@index')->name('list');
        Route::get('add', 'PlanController@add')->name('add');
        Route::get('edit/{id}', 'PlanController@edit')->name('edit');
        Route::post('save/{id?}', 'PlanController@save')->name('save');
        Route::get('delete/{id}', 'PlanController@delete')->name('delete');
    });
    Route::name('seller.')->prefix('seller')->group(function(){
        Route::get('list', 'SellerController@index')->name('list');
        Route::get('download-excel-file', 'SellerController@downloadExcelFile')->name('excel.download');
        Route::get('change_status/{id}', 'SellerController@changeStatus')->name('change_status');
    });
    Route::name('car_part_advertisement.')->prefix('car-part-advertisement')->group(function(){
        Route::get('list', 'AdvertisementController@carParts')->name('list');
        Route::get('download-excel-file', 'AdvertisementController@downloadExcelFile')->name('excel.download');
        Route::get('change_status/{id}', 'AdvertisementController@changeStatus')->name('change_status');
    });
    Route::name('scrap_yard_advertisement.')->prefix('scrap_yard_advertisement')->group(function()
    {
        Route::get('list', 'ScrapYardAdvertisementController@list')->name('list');
        Route::get('download-excel-file', 'ScrapYardAdvertisementController@downloadExcelFile')->name('excel.download');
        Route::get('approve/{id}', 'ScrapYardAdvertisementController@approve')->name('approve');
        Route::get('change_status/{id}', 'ScrapYardAdvertisementController@changeStatus')->name('change_status');
    });
    Route::name('profile.')->prefix('profile')->group(function(){
        Route::get('','ProfileController@profile')->name('index');
        Route::post('reset_password', 'ProfileController@resetPassword')->name('reset_password');
        Route::post('update_profile', 'ProfileController@updateProfile')->name('update_profile');
    });

    Route::name('order.')->prefix('order')->group(function(){
        Route::get('','OrderController@list')->name('index');
        Route::get('download-excel-file','OrderController@downloadExcelFile')->name('excel.download');
    });
    Route::name('faq.')->prefix('faq')->group(function(){
        Route::get('list', 'FaqController@list')->name('list');
        Route::get('add', 'FaqController@add')->name('add');
        Route::get('edit/{id}', 'FaqController@edit')->name('edit');
        Route::get('delete/{id}', 'FaqController@delete')->name('delete');
        Route::get('status-change/{id}', 'FaqController@status_change')->name('status_change');
        Route::post('save/{id?}', 'FaqController@save')->name('save');
    });

    Route::name('language.')->prefix('language')->group(function(){
        Route::get('list', 'LanguageController@list')->name('list');
        Route::get('add', 'LanguageController@add')->name('add');
        Route::get('edit/{id}', 'LanguageController@edit')->name('edit');
        Route::get('delete/{id}', 'LanguageController@delete')->name('delete');
        Route::get('translate/{id?}', 'LanguageController@translate')->name('translate');
        Route::post('save/{id?}', 'LanguageController@save')->name('save');
    });

    Route::name('faq.')->prefix('faq')->group(function(){
        Route::get('list', 'FaqController@list')->name('list');
        Route::get('add', 'FaqController@add')->name('add');
        Route::get('edit/{id}', 'FaqController@edit')->name('edit');
        Route::get('delete/{id}', 'FaqController@delete')->name('delete');
        Route::get('status-change/{id}', 'FaqController@status_change')->name('status_change');
        Route::post('save/{id?}', 'FaqController@save')->name('save');
    });

    Route::name('testimonial.')->prefix('testimonial')->group(function(){
        Route::get('list', 'TestimonialController@list')->name('list');
        Route::get('add', 'TestimonialController@add')->name('add');
        Route::get('edit/{id}', 'TestimonialController@edit')->name('edit');
        Route::get('delete/{id}', 'TestimonialController@delete')->name('delete');
        Route::get('status-change/{id}', 'TestimonialController@status_change')->name('status_change');
        Route::post('save/{id?}', 'TestimonialController@save')->name('save');
    });

    Route::name('blogs.')->prefix('blogs')->group(function(){
        Route::get('add_category', 'BlogsController@addCategory')->name('add.category');
        Route::post('store_category/{id?}', 'BlogsController@storeCategory')->name('store.category');
        Route::get('list_category', 'BlogsController@categoriesList')->name('list.category');
        Route::get('edit_category/{id?}', 'BlogsController@editCategory')->name('edit.category');
        Route::get('delete_category/{id?}', 'BlogsController@deleteCategory')->name('delete.category');

        Route::get('add', 'BlogsController@add')->name('add');
        Route::post('store_blogs/{id?}', 'BlogsController@store')->name('store');
        Route::get('list', 'BlogsController@list')->name('list');
        Route::get('edit/{id?}', 'BlogsController@edit')->name('edit');
        Route::get('delete/{id?}', 'BlogsController@delete')->name('delete');
        Route::get('visibility/{id}/{visibility}', 'BlogsController@blog_visibility')->name('change.visibility');
    });

    Route::name('contact.')->prefix('contact')->group(function(){
        Route::get('list', 'ContactController@index')->name('list');
        Route::get('delete/{id}', 'ContactController@delete')->name('delete');
    });
    
    // CMS Routes
    Route::get('settings','SettingController@index')->name('settings.index');
    Route::post('settings-store','SettingController@store')->name('settings.store');

});

// START All Seller Routes
Route::get('/seller/register', 'Auth\RegisteredUserController@showSellerRegisterForm')->name('seller.register')->middleware('language');

Route::namespace('Seller')->middleware('auth','seller')->group(function() {
    Route::get('/seller/select-package','PackageController@index')->name("seller.select_package")->middleware('language');
    Route::post('billing/information/{id}','MollieController@__invoke')->name('buy.package');
});

Route::prefix('seller')->name('seller.')->namespace('Seller')->middleware('auth','seller','ensure.package')->group(function() {

        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

        Route::name('profile.')->prefix('profile')->group(function(){

            Route::get('', 'ProfileController@profile')->name("index");
            Route::post('reset_password', 'ProfileController@resetPassword')->name('reset_password');
            Route::post('profile-update', 'ProfileController@profileUpdate')->name('update');
        });

        Route::name('car.part.advertisement.')->prefix('car-part-advertisement')->group(function(){

            Route::get('list', 'CarPartAdvertisementController@list')->name('list');
            Route::get('add', 'CarPartAdvertisementController@add')->name('add');
            Route::get('edit/{id?}', 'CarPartAdvertisementController@edit')->name('edit');
            Route::post('save/{id?}', 'CarPartAdvertisementController@save')->name('save');
            Route::get('delete/{id?}', 'CarPartAdvertisementController@delete')->name('delete');

            Route::get('model/{id?}', 'CarPartAdvertisementController@model')->name('model');
            Route::get('trim/{id?}', 'CarPartAdvertisementController@trim')->name('trim');
            Route::get('sub-category/{id?}', 'CarPartAdvertisementController@subCategory')->name('sub.category');
            Route::get('delete-image/{id?}', 'CarPartAdvertisementController@deleteImage')->name('delete.image');
            Route::get('change-status', 'CarPartAdvertisementController@changeStatus')->name('change.status');
        });

        Route::name('scrap.yard.advertisement.')->prefix('scrap.yard-advertisement')->group(function(){
            Route::get('list', 'ScrapYardAdvertisementController@list')->name('list');
            Route::get('add', 'ScrapYardAdvertisementController@add')->name('add');
            Route::get('edit/{id?}', 'ScrapYardAdvertisementController@edit')->name('edit');
            Route::post('save/{id?}', 'ScrapYardAdvertisementController@save')->name('save');
            Route::get('delete/{id?}', 'ScrapYardAdvertisementController@delete')->name('delete');

            Route::get('model/{id?}', 'ScrapYardAdvertisementController@model')->name('model');
            Route::get('trim/{id?}', 'ScrapYardAdvertisementController@trim')->name('trim');
            Route::get('delete-image/{id?}', 'ScrapYardAdvertisementController@deleteImage')->name('delete.image');
            Route::get('change-status', 'ScrapYardAdvertisementController@changeStatus')->name('change.status');
        });

        Route::name('plan.')->prefix('plan')->group(function(){
            Route::get('list', 'PlanController@list')->name('list');
            Route::get('change-plan/{id}', 'MollieController@changePlan')->name('change');
            Route::get('cancel-plan', 'MollieController@cancelPlan')->name('cancel');
        });

        Route::name('review.')->prefix('review')->group(function(){
            Route::get('list', 'ReviewController@list')->name('list');
            Route::get('change-status/{id}', 'ReviewController@changeStatus')->name('change.status');
            Route::get('delete/{id}', 'ReviewController@delete')->name('delete');
        });

    });

Route::get('/car-part-model/{id?}','CarPartController@model')->name('car.part.model');
Route::get('/car-part-trim/{id?}','CarPartController@trim')->name('car.part.trim');


