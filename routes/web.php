<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Multipic;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ChangePassword;
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

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Admin all route
Route::get('/home/slider/', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider/', [HomeController::class, 'AddSlider'])->name('add');
Route::post('/store/slider/', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::put('/slider/update/{id}', [HomeController::class, 'UpdateSlider'])->name('slider.update');
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $about = DB::table('home_abouts')->first();
    $images = Multipic::all();
    return view('home', compact('brands', 'about', 'images'));
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout', [BrandController::class, 'LogOut'])->name('user.logout');

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::get('/softdelete/update/{id}', [CategoryController::class, 'Softdelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/category/pdelete/{id}', [CategoryController::class, 'PDelete']);

// Brand Route

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/store', [BrandController::class, 'AddBrand'])->name('brand.store');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::put('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// Multi Image Url
Route::get('/multi/image', [BrandController::class, 'AllImage'])->name('multi.image');
Route::post('/multi/store', [BrandController::class, 'StoreImage'])->name('store.image');

// Home About All Routes
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'Edit']);
Route::put('/about/update/{id}', [AboutController::class, 'Update']);
Route::get('/about/delete/{id}', [AboutController::class, 'Delete']);

// Portfolio route
Route::get('/portfolio', [AboutController::class, 'Porfolio'])->name('portfolio');

// Admin contact page route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('contact');
Route::get('/add/contact', [ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/contact/store', [ContactController::class, 'StoreContact'])->name('contact.store');
Route::get('/contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::put('/contact/update/{id}', [ContactController::class, 'UpdateContact']);
Route::get('/contact/delete/{id}', [ContactController::class, 'Delete']);
Route::get('/contact/page/', [ContactController::class, 'ContactPage'])->name('contact.page');
Route::get('/admin/message/', [ContactController::class, 'AdminMessage'])->name('admin.message');


// home conatct page route
Route::post('/contact/form', [ContactFormController::class, 'FormSubmit'])->name('contact.form');

// Change password and user profile route
                        
Route::get('/user/password', [ChangePassword::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePassword::class, 'UpdatePassword'])->name('password.update');

// User profile
Route::get('/user/profile', [ChangePassword::class, 'Profile'])->name('profile');
Route::post('/user/profile/update', [ChangePassword::class, 'UpdateProfile'])->name('update.user.profile');