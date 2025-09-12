<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\CheckInController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\HouseKeepingController;
use App\Http\Controllers\Admin\LaundryController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
// Route::get('/', function () {
//     return view('frontend.index_one');
// });
// Route::get('/about', function () {
//     return view('frontend.about');
// });
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/rooms', function () {
    return view('frontend.rooms');
});
Route::get('/packages', function () {
    return view('frontend.packages');
});
Route::get('/packages/details/{id}', function () {
    return view('frontend.packages');
})->name('package.details');
// Route::get('/packages/details/{id}', [PackageController::class, 'create'])->name('package.details');
Route::get('/terms-and-conditions', function () {
    return view('frontend.termsConditions');
});
Route::get('/faq', function () {
    return view('frontend.faq');
});
Route::get('/gallery', function () {
    return view('frontend.gallery');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/room', RoomController::class);
    Route::resource('/rooms/type', RoomTypeController::class);
    Route::resource('/rooms/amenities', AmenitiesController::class);
    Route::resource('/checkIn', CheckInController::class);
    Route::get('/checkIn/page2/create/{id}', [CheckInController::class, 'page2Create'])->name('checkIn.page2.create');
    Route::post('/checkIn/page2/store', [CheckInController::class, 'page2Store'])->name('checkIn.page2.store');
    Route::get('/checkOut/create/{id}', [CheckInController::class, 'checkoutPage'])->name('checkout.create');
    Route::match(['PUT','PATCH'],'/checkOut/update/{id}', [CheckInController::class, 'getCheckoutInfo'])->name('checkout.update');
    Route::resource('/house-keeping', HouseKeepingController::class);
    Route::resource('/laundry', LaundryController::class);
    Route::resource('/vendors', VendorController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/frontend/aboutUs', AboutUsController::class);
    Route::resource('/package', PackageController::class);
    Route::get('/package/details/{id}', [PackageController::class, 'create'])->name('package.details');
    Route::resource('/package-category', PackageCategoryController::class);
    Route::resource('/slider', SliderController::class);
    
});

Route::resource('/frontend/menu', MenuController::class);

Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    return 'Optimization caches cleared!';
});

require __DIR__.'/auth.php';
