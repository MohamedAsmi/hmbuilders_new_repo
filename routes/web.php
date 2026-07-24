<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('main');




Route::get('/about', [App\Http\Controllers\UserController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\UserController::class, 'service'])->name('services');
Route::get('/projects', [App\Http\Controllers\UserController::class, 'projects'])->name('projects');
Route::get('/contacts', [App\Http\Controllers\UserController::class, 'contact'])->name('contacts');

Route::get('/projects/{id}', [App\Http\Controllers\UserController::class, 'listprojects'])->name('project.images');
Route::post('/contacts/message', [App\Http\Controllers\UserController::class, 'savemessage'])->name('save.contact.message');
Route::post('/inquires/message', [App\Http\Controllers\UserController::class, 'saveinquiresmessage'])->name('save.inquires.message');

Route::get('/home', [App\Http\Controllers\TeamController::class, 'index'])->name('home');


Route::get('/plans', [App\Http\Controllers\UserController::class, 'plans'])->name('modern-projects');
Route::get('/plan/{id}', [App\Http\Controllers\UserController::class, 'listPlans'])->name('plan.images');


Route::get('/Admin/AddPlans', [App\Http\Controllers\ProjectController::class, 'viewplans'])->name('AddPlans');
Route::get('/Admin/plan/List', [App\Http\Controllers\ProjectController::class, 'planlist'])->name('plan.list');
Route::get('/Admin/modal/plan/{id?}', [App\Http\Controllers\ProjectController::class, 'plansModal'])->name('plan.modal');
Route::post('/Admin/plan/save', [App\Http\Controllers\ProjectController::class, 'storeplan'])->name('save.plan');
Route::post('/Admin/plan/update/{id}', [App\Http\Controllers\ProjectController::class, 'updateplan'])->name('update.plan');
Route::delete('/Admin/AddPlan/delete/{id}', [App\Http\Controllers\ProjectController::class, 'deleteplan'])->name('delete.plan');



// TeamController 

Route::get('/Admin/AddTeam', [App\Http\Controllers\TeamController::class, 'AddTeam'])->name('AddOurTeam');
Route::get('/Admin/Team/List', [App\Http\Controllers\TeamController::class, 'teamlist'])->name('team.list');
Route::get('/Admin/modal/team/{id?}', [App\Http\Controllers\TeamController::class, 'team'])->name('team.modal');
Route::post('/Admin/team/save', [App\Http\Controllers\TeamController::class, 'store'])->name('save.member');
Route::post('/Admin/team/update/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('update.member');
Route::delete('/Admin/AddTeam/delete/{id}', [App\Http\Controllers\TeamController::class, 'delete'])->name('delete.team');

// // ServicesController 
Route::get('/Admin/AddService', [App\Http\Controllers\ServiceController::class, 'serviceAdmin'])->name('AddService');
Route::get('/Admin/service/List', [App\Http\Controllers\ServiceController::class, 'servicelist'])->name('service.list');
Route::get('/Admin/modal/Service/{id?}', [App\Http\Controllers\ServiceController::class, 'service'])->name('service.modal');
Route::post('/Admin/service/save', [App\Http\Controllers\ServiceController::class, 'store'])->name('save.service');
Route::post('/Admin/service/update/{id}', [App\Http\Controllers\ServiceController::class, 'update'])->name('update.service');
Route::delete('/AddService/delete/{id}', [App\Http\Controllers\ServiceController::class, 'delete'])->name('delete.service');

//
Route::get('/Admin/AddProjects', [App\Http\Controllers\ProjectController::class, 'index'])->name('AddProjects');
Route::get('/Admin/projects/List', [App\Http\Controllers\ProjectController::class, 'projectlist'])->name('projects.list');
Route::get('/Admin/modal/projects/{id?}', [App\Http\Controllers\ProjectController::class, 'projects'])->name('projects.modal');
Route::post('/Admin/projects/save', [App\Http\Controllers\ProjectController::class, 'store'])->name('save.projects');
Route::post('/Admin/projects/update/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('update.projects');
Route::delete('/Admin/AddProjects/delete/{id}', [App\Http\Controllers\ProjectController::class, 'delete'])->name('delete.projects');


//InquireController
Route::get('/Admin/ListInquires', [App\Http\Controllers\InquireController::class, 'index'])->name('ListInquires');
Route::get('/Admin/inquire/List', [App\Http\Controllers\InquireController::class, 'projectlist'])->name('iquires.list');
Route::get('/Admin/modal/inquire/{id}', [App\Http\Controllers\InquireController::class, 'inquire'])->name('inquire.modal');
Route::post('/Admin/inquire/update/{id}', [App\Http\Controllers\InquireController::class, 'update'])->name('update.inquires');
Route::delete('/Admin/ListInquires/delete/{id}', [App\Http\Controllers\InquireController::class, 'delete'])->name('delete.inquires');


//ContactController
Route::get('/Admin/ListMessages', [App\Http\Controllers\ContactController::class, 'index'])->name('ListMessages');
Route::get('/Admin/messages/List', [App\Http\Controllers\ContactController::class, 'messagelist'])->name('messages.list');
Route::delete('/Admin/ListMessages/delete/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('delete.message');


Route::get('/Admin/modernplans', [App\Http\Controllers\ModelProjectController::class, 'index'])->name('ModernProjects');
Route::get('/Admin/modernplans/List', [App\Http\Controllers\ModelProjectController::class, 'messagelist'])->name('ModernProjects.list');
Route::delete('/Admin/modernplans/delete/{id}', [App\Http\Controllers\ModelProjectController::class, 'delete'])->name('delete.ModernProjects');
Route::get('/Admin/modal/modernplans/{id?}', [App\Http\Controllers\ModelProjectController::class, 'projects'])->name('ModernProjects.modal');
Route::post('/Admin/modernplans/save', [App\Http\Controllers\ModelProjectController::class, 'store'])->name('save.ModernProjects');
Route::post('/Admin/modernplans/update/{id}', [App\Http\Controllers\ModelProjectController::class, 'update'])->name('update.ModernProjects');
