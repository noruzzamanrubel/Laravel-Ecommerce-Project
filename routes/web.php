<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\category\BrandController;
use App\Http\Controllers\category\SubCategoryController;
use App\Http\Controllers\category\CouponController;
use App\Http\Controllers\post\PostCategoryController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [MainAdminController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [MainAdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [MainAdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/password/edit', [MainAdminController::class, 'AdminPasswordEdit'])->name('admin.password.edit');
Route::post('/admin/password/update', [MainAdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

//User All Route
Route::get('/user/logout', [MainUserController::class, 'Logout'])->name('user.logout');
Route::get('/dashboard', [MainUserController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/dashboard/edit', [MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
Route::post('/user/profile/store', [MainUserController::class, 'UserProfileStore'])->name('profile.store');
Route::get('/user/dashboard/password/edit', [MainUserController::class, 'UserPasswordEdit'])->name('user.password.edit');
Route::post('/user/password/update', [MainUserController::class, 'UserPasswordUpdate'])->name('password.update');

// All Category Route
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/admin/store/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/delete/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit/category/{category}', [CategoryController::class, 'edit']);
Route::post('/update/category/{category}', [CategoryController::class, 'update'])->name('category.update');

// All Brand Route
Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand');
Route::post('/admin/store/brand', [BrandController::class, 'store'])->name('brand.store');
Route::get('/edit/brand/{id}', [BrandController::class, 'edit']);
Route::get('/delete/brand/{id}', [BrandController::class, 'destroy']);
Route::post('/update/brand/{id}', [BrandController::class, 'update'])->name('brand.update');

// All SubCategory Route
Route::get('/admin/subcategory', [SubCategoryController::class, 'index'])->name('subcategory');
Route::post('/admin/store/subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'edit']);
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'destroy']);
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

// All Coupon Route
Route::get('/admin/coupon', [CouponController::class, 'index'])->name('coupon');
Route::post('/admin/store/coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::get('/edit/coupon/{id}', [CouponController::class, 'edit']);
Route::get('/delete/coupon/{id}', [CouponController::class, 'destroy']);
Route::post('/update/coupon/{id}', [CouponController::class, 'update'])->name('coupon.update');

// All Newsletter Route
Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('newsletter');
Route::post('/admin/store/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::get('/delete/newsletter/{id}', [NewsletterController::class, 'destroy']);

// All Product Route
Route::get('/admin/all/product', [ProductController::class, 'index'])->name('all.product');
Route::get('/admin/add/product', [ProductController::class, 'create'])->name('add.product');
Route::post('/admin/store/product', [ProductController::class, 'store'])->name('store.product');
Route::get('/admin/edit/product/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::get('/admin/view/product/{id}', [ProductController::class, 'show'])->name('view.product');
Route::get('/admin/delete/product/{id}', [ProductController::class, 'destroy'])->name('delete.product');
Route::post('/update/product/withoutphoto/{id}', [ProductController::class, 'UpdateProductWithoutPhoto']);
Route::post('/update/product/photo/{id}', [ProductController::class, 'UpdateProductPhoto']);
Route::get('/active/product/{id}', [ProductController::class, 'active']);
Route::get('/inactive/product/{id}', [ProductController::class, 'inactive']);

// All Post Category Route
Route::get('/all/post/category', [PostCategoryController::class, 'index'])->name('all.post.category');
Route::post('/post/category/store', [PostCategoryController::class, 'store'])->name('post.category.store');
Route::get('/edit/post/category/{id}', [PostCategoryController::class, 'edit']);
Route::get('/delete/post/category/{id}', [PostCategoryController::class, 'destroy']);
Route::post('/update/post/category/{id}', [PostCategoryController::class, 'update'])->name('post.category.update');

//All Post Route
Route::get('/admin/all/post', [PostController::class, 'index'])->name('all.post');
Route::post('/admin/store/post', [PostController::class, 'store'])->name('store.post');
Route::get('/admin/add/post', [PostController::class, 'create'])->name('add.post');
Route::get('/admin/edit/post/{id}', [PostController::class, 'edit']);
Route::get('/admin/view/post/{id}', [PostController::class, 'show'])->name('view.post');
Route::get('/admin/delete/post/{id}', [PostController::class, 'destroy']);
Route::post('/update/post/withoutphoto/{id}', [PostController::class, 'UpdatepostWithoutPhoto']);
Route::post('/update/post/photo/{id}', [PostController::class, 'UpdatepostPhoto']);


// Category
// Route::group([
//     'prefix' => 'categories',
// ], function () {
//     Route::post('/', [CategoryController::class, 'index'])->name('categories.index');
//     Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
//     Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
//     Route::post('/{category}', [CategoryController::class, 'update'])->name('categories.update');
//     Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// });