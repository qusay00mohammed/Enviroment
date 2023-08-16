<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Website\ProgramController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\PrincipleController;
use App\Http\Controllers\Website\ObjectiveController;
use App\Http\Controllers\Website\ReportAndPublicationController;
use App\Http\Controllers\Website\VisualLibraryController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\RequestController;
use App\Http\Controllers\Website\DonateController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', [HomePageController::class, 'index'])->name('homePage');
        Route::get('news_details/{id}', [NewsController::class, 'show'])->name('news_details');
        Route::get('news', [NewsController::class, 'index'])->name('news');
        Route::get('program_details/{id}', [ProgramController::class, 'show'])->name('program_details');
        Route::get('programs', [ProgramController::class, 'index'])->name('programs');
        Route::get('about_association/{id}', [AboutController::class, 'index'])->name('about_association');
        Route::get('principles', [PrincipleController::class, 'index'])->name('principles');
        Route::get('objectives', [ObjectiveController::class, 'index'])->name('objectives');

        Route::get('publications', [ReportAndPublicationController::class, 'publication'])->name('publications');
        Route::get('reports', [ReportAndPublicationController::class, 'report'])->name('reports');


        Route::get('visualLibrary/{id}', [VisualLibraryController::class, 'show'])->name('visualLibrary.show');
        Route::get('visualLibrary', [VisualLibraryController::class, 'index'])->name('visualLibrary.index');


        Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
        Route::post('contact_us', [ContactUsController::class, 'store'])->name('contact_us.store');

        Route::get('company_request', [RequestController::class, 'company_index'])->name('company.index');
        Route::post('company_request', [RequestController::class, 'company_store'])->name('company.store');

        Route::get('job_request', [RequestController::class, 'job_index'])->name('job.index');
        Route::post('job_request', [RequestController::class, 'job_store'])->name('job.store');

        Route::get('volunteer_request', [RequestController::class, 'volunteer_index'])->name('volunteer.index');
        Route::post('volunteer_request', [RequestController::class, 'volunteer_store'])->name('volunteer.store');

        Route::get('donate', [DonateController::class, 'index'])->name('donate.index');
        Route::post('donate', [DonateController::class, 'store'])->name('donate.store');
        Route::any('success/{id}', [DonateController::class, 'success'])->name('success');
        Route::any('cancel/{id}', [DonateController::class, 'cancel'])->name('cancel');
    });
