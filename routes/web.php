<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/pdf', [PDFController::class, 'getPDF']);

// Pages Routes
Route::view('/', 'pages.home');
Route::view('/userLogin', 'pages.auth.login-page')->name('login');
Route::view('/userRegistration', 'pages.auth.registration-page');
Route::view('/sendOtp', 'pages.auth.send-otp-page');
Route::view('/verifyOtp', 'pages.auth.verify-otp-page');
Route::view('/resetPassword', 'pages.auth.reset-pass-page');
Route::view('/userProfile', 'pages.dashboard.profile-page');
Route::view('/categoryPage', 'pages.dashboard.category-page');
Route::view('/customerPage', 'pages.dashboard.customer-page');
Route::view('/productPage', 'pages.dashboard.product-page');
Route::view('/invoicePage', 'pages.dashboard.invoice-page');
Route::view('/salePage', 'pages.dashboard.sale-page');
Route::view('/reportPage', 'pages.dashboard.report-page');

// Web API Routes
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware('auth:sanctum');
Route::get('/logout', [UserController::class, 'UserLogout'])->middleware('auth:sanctum');
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware('auth:sanctum');
Route::post('/send-otp', [UserController::class, 'SendOTP']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware('auth:sanctum');

// Category Routes
Route::post("/create-category", [CategoryController::class, 'CategoryCreate'])->middleware('auth:sanctum');
Route::get("/list-category", [CategoryController::class, 'CategoryList'])->middleware('auth:sanctum');
Route::post("/delete-category", [CategoryController::class, 'CategoryDelete'])->middleware('auth:sanctum');
Route::post("/update-category", [CategoryController::class, 'CategoryUpdate'])->middleware('auth:sanctum');
Route::post("/category-by-id", [CategoryController::class, 'CategoryByID'])->middleware('auth:sanctum');

// Customer Routes
Route::post("/create-customer", [CustomerController::class, 'CustomerCreate'])->middleware('auth:sanctum');
Route::get("/list-customer", [CustomerController::class, 'CustomerList'])->middleware('auth:sanctum');
Route::post("/delete-customer", [CustomerController::class, 'CustomerDelete'])->middleware('auth:sanctum');
Route::post("/update-customer", [CustomerController::class, 'CustomerUpdate'])->middleware('auth:sanctum');
Route::post("/customer-by-id", [CustomerController::class, 'CustomerByID'])->middleware('auth:sanctum');

// Product Routes
Route::post("/create-product", [ProductController::class, 'CreateProduct'])->middleware('auth:sanctum');
Route::post("/delete-product", [ProductController::class, 'DeleteProduct'])->middleware('auth:sanctum');
Route::post("/update-product", [ProductController::class, 'UpdateProduct'])->middleware('auth:sanctum');
Route::get("/list-product", [ProductController::class, 'ProductList'])->middleware('auth:sanctum');
Route::post("/product-by-id", [ProductController::class, 'ProductByID'])->middleware('auth:sanctum');

// Invoice Routes
Route::post("/invoice-create", [InvoiceController::class, 'invoiceCreate'])->middleware('auth:sanctum');
Route::get("/invoice-select", [InvoiceController::class, 'invoiceSelect'])->middleware('auth:sanctum');
Route::post("/invoice-details", [InvoiceController::class, 'InvoiceDetails'])->middleware('auth:sanctum');
Route::post("/invoice-delete", [InvoiceController::class, 'invoiceDelete'])->middleware('auth:sanctum');

// Report Routes
Route::get("/sales-report/{FormDate}/{ToDate}", [ReportController::class, 'SalesReport'])->middleware('auth:sanctum');
