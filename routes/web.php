<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Dashbord;
use App\Http\Livewire\ProjetComp;
use App\Http\Livewire\Utilisateurs;
use App\Models\Projet;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/roles', function () {
//     return User::with("projet")->paginate(2);
// });

// Route::get('/projet', function () {
//     return Projet::with("user")->paginate(2);
// });


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class, "index")->name("users.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //
        // $users = User::withTrashed()->where("id",11)->restore();

    });
});
    

Route::group([
    "middleware" => ["auth", "auth.manager"],
    'as' => 'manager.'
], function(){
    Route::group([
        "prefix" => "tableaudebord",
        'as' => 'tableaudebord.'
    ], function(){

        Route::get("/vueglobale", Dashbord::class, "index")->name("dashbord");
        

    });

});

    Route::group([
        "middleware" => ["auth", "auth.employe"],
        'as' => 'employe.'
    ], function(){
    Route::group([
        "prefix" => "gestionprojet",
        'as' => 'gestionprojet.'
    ], function(){

        Route::get("/projets", ProjetComp::class, "index")->name("projets");

       
});
});



