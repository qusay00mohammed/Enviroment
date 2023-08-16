<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PrincipleController;
use App\Http\Controllers\Admin\SecondaryGoalController;
use App\Http\Controllers\Admin\GoalController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReceivedRequestController;
use App\Http\Controllers\Admin\JobRequestController;
use App\Http\Controllers\Admin\VolunteerRequestController;
use App\Http\Controllers\Admin\PartnerRequestController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\DonateController;
use App\Http\Controllers\HomeController;

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


Route::get('admin/ar', [LoginController::class, 'create_ar'])->name('login.create_ar')->middleware('guest');
Route::get('admin/en', [LoginController::class, 'create_en'])->name('login.create_en')->middleware('guest');
Route::post('admin_login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');


Route::prefix('admin/')->middleware('auth')->group(function(){

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('logUser', [UserController::class, 'logUser'])->name('logUser');


    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::resource('news', NewsController::class);

    Route::post('news/status', [NewsController::class, 'status'])->name('status');

    Route::any('image/delete/{id}', [NewsController::class, 'deleteImage'])->name('admin.image.delete');

    Route::get('getNewsDatatable', [NewsController::class, 'getNewsDatatable'])->name('getNewsDatatable');
    Route::get('getVolunteerDatatable', [VolunteerRequestController::class, 'getVolunteerDatatable'])->name('getVolunteerDatatable');
    Route::get('getMessageDatatable', [MessageController::class, 'getMessageDatatable'])->name('getMessageDatatable');
    Route::get('getDonateDatatable', [DonateController::class, 'getDonateDatatable'])->name('getDonateDatatable');
    Route::get('getJobDatatable', [JobRequestController::class, 'getJobDatatable'])->name('getJobDatatable');
    Route::get('getPartnerDatatable', [PartnerRequestController::class, 'getPartnerDatatable'])->name('getPartnerDatatable');

    Route::resource('about-us', AboutController::class);

    Route::resource('principles', PrincipleController::class);

    Route::resource('goals', GoalController::class);

    Route::resource('list-goal', SecondaryGoalController::class);

    Route::resource('socials', SocialController::class);

    Route::resource('contact-details', ContactDetailController::class);

    Route::resource('libraries', LibraryController::class);

    Route::resource('publications', PublicationController::class);

    Route::resource('reports', ReportController::class);

    Route::resource('achievements', AchievementController::class);

    Route::resource('partners', PartnerController::class);

    Route::resource('programs', ProgramController::class);

    Route::resource('slider', SliderController::class);

    Route::resource('organizations', OrganizationTypeController::class);

    Route::resource('users', UserController::class);


    Route::resource('job-requests', JobRequestController::class);

    Route::resource('partner-requests', PartnerRequestController::class);

    Route::resource('volunteer-requests', VolunteerRequestController::class);

    Route::resource('messages', MessageController::class);

    Route::resource('donates', DonateController::class);
});



// Route::get('/{page}', [AdminController::class, 'index']);







