<?php

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
*/use App\Models\Plan;

Route::get('/', function () {
    $plans = Plan::all();
    return view('welcome')->with('plans',$plans);
});

Auth::routes();

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LocalizationControlloer@index']);

Route::group(['middleware' => 'auth', 'middleware' => 'subscribed'], function() {
    Route::get('/dashboard/{course_id}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', App\Http\Controllers\Superadmin\UserController::class);
   
    Route::get('serarch', [App\Http\Controllers\Superadmin\UserController::class, 'search'])->name('user.search');

    Route::get('/profile', [App\Http\Controllers\Superadmin\UserController::class , 'profile'])->name('user.profile');

    Route::post('/profile', [App\Http\Controllers\Superadmin\UserController::class , 'postProfile'])->name('user.postProfile');

    Route::get('/password/change', [App\Http\Controllers\Superadmin\UserController::class , 'getPassword'])->name('userGetPassword');

    Route::post('/password/change', [App\Http\Controllers\Superadmin\UserController::class , 'postPassword'])->name('userPostPassword');

    //permission
    Route::resource('permission', App\Http\Controllers\Superadmin\PermissionController::class);

    //roles
    Route::resource('roles', App\Http\Controllers\Superadmin\RoleController::class);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plans.index');
    Route::get('/plan/{plan}', [App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');
    Route::post('/subscription', [App\Http\Controllers\SubscriptionController::class, 'create'])->name('subscription.create');

    //Routes for create Plan
    Route::get('create/plan', [App\Http\Controllers\SubscriptionController::class, 'createPlan'])->name('create.plan');
    Route::post('store/plan', [App\Http\Controllers\SubscriptionController::class, 'storePlan'])->name('store.plan');

    //Routes for email
    Route::resource('/email', App\Http\Controllers\EmailController::class);
    Route::get('sms', [App\Http\Controllers\SendSMSController::class, 'index']);
    Route::post('sendSms', [App\Http\Controllers\SendSMSController::class, 'sendSms']);
});

Route::group(['middleware' => 'auth', 'middleware' => 'subscribed'], function() { 
    Route::resource('/courses', App\Http\Controllers\CourseController::class);
    Route::get('/choose-course', [App\Http\Controllers\CourseController::class, 'chooseCourse'])->name('courses.choose');
    Route::get('/new-course', [App\Http\Controllers\CourseController::class, 'newCourse'])->name('courses.new');
    Route::post('/new-course', [App\Http\Controllers\CourseController::class, 'save'])->name('courses.save');

    Route::resource('/members', App\Http\Controllers\MemberController::class);
    Route::post('/import' ,[App\Http\Controllers\MemberController::class , 'import']);
    Route::get('export', [App\Http\Controllers\MemberController::class, 'export'])->name('export');
    Route::put('/paid/{member_id}', [App\Http\Controllers\MemberController::class, 'paid'])->name('paid');
});