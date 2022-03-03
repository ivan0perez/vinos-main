<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/wines_price_up/{price}', function ($price) {

    return Wine::price($price)->get();
});

Route::get('/wines_query1', function () {

    //Select all
        //$users = DB::table('users')->get();

    //Select where condition
    $users = DB::table('users')->where('name', 'Delia Stamm')->first();
    return $users;

    //select where  two condition
    /*
    $val = DB::table('user_meta')->where([
            'user_id'=>$this->id,
            'name'=>$key
        ])->first();
    */
    //select with alias
    /*
    $users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
    */

    //Laravel Joins
    /*
            DB::table('users')
             ->join('contacts', 'users.id', '=', 'contacts.user_id')
             ->join('orders', 'users.id', '=', 'orders.user_id')
             ->select('users.id', 'contacts.phone', 'orders.price')
             ->get();
    */
});

Route::get('/wines_query', function () {

    //Select all
        $users = DB::table('wines')->get();

    return $users;

});

Route::get('/wines_query2/{id_category}/{name}', function ($id_category, $name) {

    //select where  two condition
    $val = DB::table('categories')->where([
            'category_id'=>$id_category,
            'name'=>$name
        ])->first();
    return $val;

});

Route::get('/wines_query3', function () {

    //select with alias
    $users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();

    return $users;

});

Route::get('/wines_query4', function () {

     //Laravel Joins

     $users = DB::table('wines')
             ->join('categories', 'wines.category_id', '=', 'categories.id')
             ->join('countries', 'wines.country_id', '=', 'countries.id')
             ->select('wines.name', 'categories.name', 'countries.name')
             ->get();

    return $users;

});


