<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    //HomeController
    Route::get('/universityNetwork', [HomeController::class, 'universityNetwork'])->name('universityNetwork');
    Route::get('/postProject', [HomeController::class, 'postProject'])->name('postProject');
    Route::post('/postProject', [HomeController::class, 'addPostProject']);
    Route::get('/profile', [HomeController::class, 'getProfile'])->name('getProfile');
    Route::post('/profile', [HomeController::class, 'editPostProfile'])->name('editPostProfile');
    Route::get('/session', [HomeController::class, 'session'])->name('session');
    Route::get('/addProfile', [HomeController::class, 'addProfile'])->name('addProfile');
    Route::post('/addProfileStudent', [HomeController::class, 'addProfileStudent'])->name('addProfileStudent');
    Route::post('/addProfileAcademic', [HomeController::class, 'addProfileAcademic'])->name('addProfileAcademic');
    Route::get('/myProjects', [HomeController::class, 'myProjects'])->name('myProjects');
    Route::get('/viewProject/{project_id}', [HomeController::class, 'viewProject'])->name('viewProject');
    Route::get('/editProject/{project_id}', [HomeController::class, 'editProject'])->name('editProject');
    Route::post('/editProject/{project_id}', [HomeController::class, 'editPostProject'])->name('editProject');
    Route::get('/applyProject/{project_id}', [HomeController::class, 'applyProject'])->name('applyProject');
    Route::post('/profileAcademic', [HomeController::class, 'editProfileAcademic'])->name('editProfileAcademic');
    Route::get('/profileAcademic', [HomeController::class, 'getProfileAcademic'])->name('getProfileAcademic');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('/eliminarStudent', [HomeController::class, 'deletProfileStudent'])->name('deletProfileStudent');
    Route::get('/eliminarAcademico', [HomeController::class, 'deletProfileAcademic'])->name('deletProfileAcademic');
    Route::get('/eliminarCuenta', [HomeController::class, 'deletAccount'])->name('deletAccount');

    Route::get('/applycants/{project_id}', [HomeController::class, 'getApplycants'])->name('getApplycants');
    Route::get('/team', [HomeController::class, 'team'])->name('team');
    Route::get('/acceptRequest/{request_id}', [HomeController::class, 'acceptRequest'])->name('acceptRequest');
    Route::post('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/profile/{user_id}', [HomeController::class, 'viewProfile'])->name('viewProfile');
    Route::get('/profileAcademic/{user_id}', [HomeController::class, 'viewProfileAcademic'])->name('viewProfile');
    Route::get('/addAcademic', [HomeController::class, 'addAcademic'])->name('addAcademic');
    Route::get('/addAcademic/{user_id}', [HomeController::class, 'addPostAcademic'])->name('addAcademic');
});
