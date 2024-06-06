<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //products
    Route::resource('products', ProductController::class);
    Route::get('changestatusproduct', [ProductController::class, 'changestatusproduct'])->name('changestatusproduct');
    //customers
    Route::resource('customers', CustomerController::class);
    Route::get('changestatuscustomer', [CustomerController::class, 'changestatuscustomer'])->name('changestatuscustomer');
    //order
    Route::resource('orders', OrderController::class);
    Route::get('changestatusorder',[OrderController::class, 'changestatusorder'])->name('changestatusorder');


    Route::get('/401', function () {
        abort(401);
    });
    
    Route::get('/402', function () {
        abort(402);
    });
    
    Route::get('/403', function () {
        abort(403);
    });
    
    Route::get('/404', function () {
        abort(404);
    });
    
    Route::get('/419', function () {
        abort(419);
    });
    
    Route::get('/429', function () {
        abort(429);
    });
    
    Route::get('/500', function () {
        abort(500);
    });
    
    Route::get('/503', function () {
        abort(503);
    });
});

Route::get('/about', function () { 
    return 'Acerca de nosotros'; 
});

Route::get('/user/{id}', function ($id) { 
    return 'ID de usuario: ' . $id; 
});

Route::get('/contacto', function () { 
    return 'Página de contacto'; 
})->name('contacto');

Route::get('/usuario/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
})->where('id', '[0-9]{3}');

Route::prefix('admin')->group(function () { 
    Route::get('/', function () { 
    return 'Panel de administración'; 
    }); 
    Route::get('/users', function () { 
    return 'Lista de usuarios'; 
    }); 
    }); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');