<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieTheatreRelationController;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
//USER
Route::get('/', [UserController::class,'home'])->name('home');
Route::get('/{member_id}/tickets', [UserController::class, 'tickets'])->name('tickets');
Route::get('/theatres', [UserController::class, 'theatre'])->name('theatres');
Route::get('/movie_detail/{movie_id}',[MovieController::class,'movie_detail'])->name('movie_detail');

Route::get('/login_page',[UserController::class,'login_page'])->name('login_page');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/register_page',[UserController::class,'register_page'])->name('register_page');
Route::post('/register',[UserController::class,'register'])->name('register');

Route::middleware(["isLogin"])->group(function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware(["isMember"])->group(function(){
        //TICKETS
        Route::post('/buy_ticket/{movie_id}/{user_id}',[TicketController::class,'buy_ticket'])->name('buy_ticket');
    });

    Route::middleware(["isAdmin"])->group(function() {
        //MOVIES
        Route::get('/edit_movie_info_page/{movie_id}',[MovieController::class,'edit_movie_info_page'])->name('edit_movie_info_page');
        Route::patch('/edit_movie_info',[MovieController::class,'edit_movie_info'])->name('edit_movie_info');
        Route::get('/add_new_movie_page',[MovieController::class,'add_new_movie_page'])->name('add_new_movie_page');
        Route::post('/add_new_movie',[MovieController::class,'add_new_movie'])->name('add_new_movie');

        //THEATRE
        Route::get('/edit_theatre_info_page/{theatre_id}',[TheatreController::class,'edit_theatre_info_page'])->name('edit_theatre_info_page');
        Route::patch('/edit_theatre_info',[TheatreController::class,'edit_theatre_info'])->name('edit_theatre_info');
        Route::post('/add_theatre',[TheatreController::class,'add_theatre'])->name('add_theatre');
        Route::get('/add_theatre_page',[TheatreController::class,'add_theatre_page'])->name('add_theatre_page');

        //THEATRE AND MOVIES RELATIONSHIP
        Route::post('/add_relationship',[MovieTheatreRelationController::class,'add_relationship_by_movie'])->name('add_relationship_by_movie');
        Route::post('/add_relationship/{theatre_id}',[MovieTheatreRelationController::class,'add_relationship_by_theatre'])->name('add_relationship_by_theatre');
        Route::delete('/delete_relationship_by_movie',[MovieTheatreRelationController::class,'delete_relationship_by_movie'])->name('delete_relationship_by_movie');
        Route::delete('/delete_relationship_by_theatre',[MovieTheatreRelationController::class,'delete_relationship_by_theatre'])->name('delete_relationship_by_theatre');
    });
});
