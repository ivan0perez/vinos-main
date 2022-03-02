<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Wine;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/wines', function () {
    return Wine::all();
});

Route::get('/wine/{id}', function ($id) {
    return Wine::find($id);
});

Route::get('/countries', function () {
    //$cat = Cat::where('id', '=', 1)->first();
    return Wine::with('countries')->where('country_id', '=', 3)->get();
});
Route::get('/type', function () {
    //$cat = Cat::where('id', '=', 1)->first();
    return Wine::with('countries')->where('type', '=', "pink")->get();
});
Route::get('/denominations', function () {
    //$cat = Cat::where('id', '=', 1)->first();
    return Wine::with('denominations')->where('denomination_id', '=', 1)->get();
});

Route::get('/wines/{type}', function ($type) {

    return Wine::type($type)->get();
});

Route::get('/wines_price_up/{price}', function ($price) {

    return Wine::price($price)->get();
});


