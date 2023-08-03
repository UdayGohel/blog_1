<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Manageblog;
use App\Http\Controllers\Registration;
use App\Http\Controllers\SadminController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/signin', [Registration::class, 'index'])->name('user_signin');
Route::get('/signup', [Registration::class, 'singup'])->name('user_signup');
Route::post('/registration', [Registration::class, 'register'])->name('user_register');
Route::post('/signin', [Registration::class, 'signin'])->name('user_login');
Route::get('/home', [Registration::class, 'mainpage'])->name('user_home');
Route::get('/signout', [Registration::class, 'logout'])->name('user_signout');

// Routes For Admin Control

Route::get('/admin/dashboard', [Admin::class, 'dashboard'])->name('admin_dashborad');
// User Management
Route::get('/admin/AddUser', [Admin::class, 'AddUser'])->name('admin_AddUser');
Route::post('/admin/user/registration', [Admin::class, 'register'])->name('admin_user_register');
Route::get('/admin/manageUser', [Admin::class, 'manageuser'])->name('admin_manageUser');
Route::get('/admin/manageUser/editUser/{id}', [Admin::class, 'edituser'])->name('admin_editUser');
Route::post('/admin/user/update/{id}', [Admin::class, 'update'])->name('admin_user_update');
Route::get('/admin/deleteUser/{id}', [Admin::class, 'delete'])->name('admin_deleteUser');
Route::get('/admin/Addcategory', [Admin::class, 'Addcategory'])->name('admin_Addcategory');
Route::post('/admin/Addcategory', [Admin::class, 'category_register'])->name('admin_category_register');
Route::get('/admin/managecategory', [Admin::class, 'manage_category'])->name('admin_manage_category');
Route::get('/admin/deletecategory/{id}', [Admin::class, 'delete_category'])->name('admin_deletecategory');
Route::get('/admin/category/update/{id}', [Admin::class, 'edit_category'])->name('admin_edit_category');
Route::post('/admin/category/update/{id}', [Admin::class, 'update_category'])->name('admin_category_update');
Route::get('/admin/Add_post', [Admin::class, 'Add_post'])->name('admin_Add_post');
Route::post('/admin/Add_post', [Admin::class, 'post_register'])->name('admin_post_register');
Route::get('/admin/managepost', [Admin::class, 'manage_post'])->name('admin_manage_post');
Route::get('/admin/managepost/editpost/{id}', [Admin::class, 'editpost'])->name('admin_editpost');
Route::post('/admin/post/update/{id}', [Admin::class, 'update_post'])->name('admin_post_update');
Route::get('/admin/deletepost/{id}', [Admin::class, 'deletepost'])->name('admin_deletepost');

// Route for viewing posts and Category-Post :-
Route::get('/blog', [Manageblog::class, 'blog'])->name('user_blog');
Route::get('/category_post/{id}', [Manageblog::class, 'category_post'])->name('user_category_post');
Route::get('/single_post/{no}', [Manageblog::class, 'single_post'])->name('user_single_post');
Route::get('/about_us', [Manageblog::class, 'about_us'])->name('about_us');
Route::get('/services', [Manageblog::class, 'service'])->name('service');
Route::get('/contact_us', [Manageblog::class, 'contact'])->name('contact_us');
Route::get('/search', [Manageblog::class, 'search'])->name('user_search');

// Route::get('/sendmail', [Registration::class, 'sendmail'])->name('sendmail');

//Group Of Route That Defines All superAdmin Route !!

Route::group(['prefix' => 'Sadmin'], function () {
    Route::get('/dashBoard', [SadminController::class, 'showDashboard'])->name('sAdmin_dash');
    Route::get('/manageAdmin', [SadminController::class, 'manageAdmin'])->name('adminManage');
});