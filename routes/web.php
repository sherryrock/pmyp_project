<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\YeildController;
use App\Http\Controllers\WebsiteController;

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


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {   
//Students Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get("/students/create", [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


// Country routes
Route::get('/country', [CountryController::class, 'index'])->name('country.index');
Route::get('/country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('/country', [CountryController::class, 'store'])->name('country.store');
Route::get('/country/{id}/edit', [CountryController::class, 'edit'])->name('country.edit');
Route::put('/country/{id}', [CountryController::class, 'update'])->name('country.update');
Route::delete('/country/{id}', [CountryController::class, 'destroy'])->name('country.destroy');


//City routes
Route::get('/city' ,[CitiesController::class, 'index'])->name('city.index');
Route::get('/city/create' ,[CitiesController::class,'create'])->name('city.create');
Route::post('/city/store' ,[CitiesController::class,'store'])->name('city.store');
Route::get('/city/{id}/edit' ,[CitiesController::class,'edit'])->name('city.edit');
Route::put('/city/{id}' ,[CitiesController::class,'update'])->name('city.update');
Route::delete('/city/{id}' ,[CitiesController::class,'destroy'])->name('city.destroy');


//State routes
Route::get('/state' ,[StatesController::class, 'index'])->name('state.index');
Route::get('/state/create' ,[StatesController::class,'create'])->name('state.create');
Route::post('/state/store' ,[StatesController::class,'store'])->name('state.store');
Route::get('/state/{id}/edit' ,[StatesController::class,'edit'])->name('state.edit');
Route::put('/state/{id}' ,[StatesController::class,'update'])->name('state.update');
Route::delete('/state/{id}' ,[StatesController::class,'destroy'])->name('state.destroy');


// Route::get('student/create', [StudentController::class ,'create'])->name('student.create');
// Route::post('student/store', [StudentController::class ,'create'])->name('student.create');

 // AJAX routes for Students:
    Route::post('/getStates', [StudentController::class, 'getStates'])->name('getStates');
    Route::post('/getCities', [StudentController::class, 'getCities'])->name('getCities');
    
     // AJAX routes for cities:
        Route::resource('city', CitiesController::class);
        Route::post('/getState', [CitiesController::class, 'getStates'])->name('getState');
    


});
 
Route::get('/', function () {
    return view('welcome');
});


// // AJAX routes for fetching states and cities
// Route::post('/students/getStates/{country_id}', [StudentController::class, 'getStates'])->name('getStates');
// Route::post('/getCities/{state_id}', [StudentController::class, 'getCities'])->name('getCities');
//when we use location controller
// Route::get('/countries', [LocationController::class, 'getCountries']);
// Route::get('/states/{countryId}', [LocationController::class, 'getStates']);
// Route::get('/cities/{stateId}', [LocationController::class, 'getCities']);



// Route::get('/get-states/{country}', 'CityController@getStates')->name('getStates');


//Yeild routes
Route::get('/yeild' ,[YeildController::class, 'index'])->name('yeild.index');
Route::get('/yeild/welcome' ,[YeildController::class, 'welcome'])->name('yeild.welcome');


// //WEBISTE CONTROLLER
// Route::get('/website/index' ,[WebsiteController::class, 'index']);
// Route::post('/getState' ,[WebsiteController::class, 'getState']);
// Route::post('/getCity' ,[WebsiteController::class, 'getCity']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
