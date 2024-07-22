<?php

    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HarapanController;
use App\Http\Controllers\OrderController;

route::get('/', [HomeController::class,'index']);    
route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth','verified');   
 
Route::get('/harapan', [HomeController::class, 'index_harapan'])->middleware('auth','verified');
Route::post('/add_harapan', [HomeController::class,'add_harapan'])->middleware('auth','verified');
Route::post('/add_masukan', [HomeController::class,'add_masukan']);

Route::get('/riwayat', [HomeController::class,'riwayat'])->middleware('auth','verified');
Route::post('/add_janji', [HomeController::class,'add_janji'])->middleware('auth','verified');
Route::get('/update_janji/{id}', [HomeController::class,'update_janji'])->middleware('auth','verified');
Route::post('/update_janji_2/{id}', [HomeController::class,'update_janji_2'])->middleware('auth','verified');
Route::post('/cancel_janji/{id}', [HomeController::class,'cancel_janji'])->middleware('auth','verified');
Route::post('/isi_data', [OrderController::class,'isi_data'])->middleware('auth','verified');
Route::get('/checkout/{id}', [OrderController::class,'checkout'])->middleware('auth','verified');
Route::post('/checkout_2/{id}', [OrderController::class,'checkout_2'])->middleware('auth','verified');
route::get('/print_pdf/{id}', [HomeController::class,'print_pdf'])->middleware('auth','verified');


Route::post('/add_user', [AdminController::class,'add_user']);
Route::get('/view_user', [AdminController::class,'view_user']);
Route::get('/show_user', [AdminController::class,'show_user']);
Route::get('/update_user/{id}', [AdminController::class,'update_user']);
Route::post('/update_user_2/{id}', [AdminController::class,'update_user_2']);
Route::get('/delete_user/{id}', [AdminController::class,'delete_user']);
Route::get('/search_user', [AdminController::class,'search_user']);

Route::post('/add_artikel', [AdminController::class,'add_artikel']);
Route::get('/view_artikel', [AdminController::class,'view_artikel']);
Route::get('/show_artikel', [AdminController::class,'show_artikel']);
Route::get('/update_artikel/{id}', [AdminController::class,'update_artikel']);
Route::post('/update_artikel_2/{id}', [AdminController::class,'update_artikel_2']);
Route::get('/delete_artikel/{id}', [AdminController::class,'delete_artikel']);
Route::get('/search_artikel', [AdminController::class,'search_artikel']);

Route::get('/{artikel:slug}', [HomeController::class, 'show'])->name('artikel.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});