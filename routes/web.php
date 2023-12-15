<?php

use Illuminate\Support\Facades\Route;

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

use App\http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']); 
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); //middleware pra q só usuários logados tenha acesso
Route::get('/convidados', [EventController::class, 'convidados'])->middleware('auth');
Route::get('/testes', [EventController::class, 'testes']); 
Route::get('/parceiros', [EventController::class, 'parceiros']); 
Route::get('/equipes', [EventController::class, 'equipes']);
Route::get('/festas', [EventController::class, 'festas']); 

Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');  
Route::get('/editconvidados/{id}', [EventController::class, 'editconvidados'])->middleware('auth'); 

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth'); 
Route::get('/events/{id}', [EventController::class, 'show']); 



Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');  
Route::put('/convidados/update/{id}', [EventController::class, 'convidadoupdate'])->middleware('auth');  

Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth'); 
Route::delete('/convidados/{id}', [EventController::class, 'delete'])->middleware('auth'); 




Route::post('/events', [EventController::class, 'store']); //store é um metodo do proprio laravel
Route::post('/convidados', [EventController::class, 'cadastroconvidado']);
Route::post('/parceiros', [EventController::class, 'cadastroparceiro']);
Route::post('/equipes', [EventController::class, 'cadastroequipe']);
Route::post('/festas', [EventController::class, 'cadastrofesta']);




//Route::get('/editconvidados', function () {
//return view('editconvidados');
//});

//Route::get('/convidados', function () {
//    return view('convidados');
//});


/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/