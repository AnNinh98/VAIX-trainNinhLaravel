<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BillController;
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
//using Laravel Framework 8.53.1
//show to dashboard
Route::get('/',[AdminController::class,'index']);
//Company Manage
Route::get('/add-company',[CompanyController::class,'add_company']);
Route::get('/all-company',[CompanyController::class,'all_company']);
Route::post('/save-company',[CompanyController::class,'save_company']);
//Project Manage
Route::get('/add-project',[ProjectController::class,'add_project']);
Route::get('/all-project',[ProjectController::class,'all_project']);
Route::post('/save-project',[ProjectController::class,'save_project']);
//item Manage
Route::get('/add-item',[ItemsController::class,'add_item']);
Route::get('/all-item',[ItemsController::class,'all_item']);
Route::post('/save-item',[ItemsController::class,'save_item']);
//Bill Manage
Route::get('/add-bill',[BillController::class,'add_bill']);
Route::get('/all-bill',[BillController::class,'all_bill']);
Route::post('/save-bill',[BillController::class,'save_bill']);
//step to step export invoice
Route::get('/export-invoice/{bill_id}',[BillController::class,'export_invoice']);
