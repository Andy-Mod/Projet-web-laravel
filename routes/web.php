<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now update something great!
|
*/


Route::post('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/', function () {
    return view('welcome');
});

Route::post('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/', function () {
    return view('index');
});

Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return view('home');
});

Route::post('/hoe', [App\Http\Controllers\HomeController::class, 'index'])->name('hoe');
Route::get('/hoe', [App\Http\Controllers\HomeController::class, 'index'])->name('hoe');
Route::get('/hoe', function () {
    return view('hoe');
});

Route::post('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::get('/profile', function () {
    $user = Auth::user()->id;
    $name = Auth::user()->name;
    $email = Auth::user()->email;
        return view('profile',compact('user', 'name', 'email'));
});

Route::post('/Annonce/create', [App\Http\Controllers\HomeController::class, 'index'])->name('Annonce.create');
Route::get('/Annonce/create', [App\Http\Controllers\HomeController::class, 'index'])->name('Annonce.create');
Route::get('/Annonce/create', function () {
    return view('Annonce.create');
});

Route::post('/Annonce/edit/{id}', [App\Http\Controllers\AnnonceController::class, 'edit'])->name('Annonce.edit');
Route::get('/Annonce/edit/{id}', [App\Http\Controllers\AnnonceController::class, 'edit'])->name('Annonce.edit');
Route::get('/Annonce/edit/{id}', function () {
    return view('Annonce.edit');
});

Route::post('/Annonce/success', [App\Http\Controllers\HomeController::class, 'index'])->name('Annonce.success');
Route::get('/Annonce/success', [App\Http\Controllers\HomeController::class, 'index'])->name('Annonce.success');
Route::get('/Annonce/success', function () {
    return view('Annonce.success');
});

Route::post('/Annonce/store', [App\Http\Controllers\AnnonceController::class, 'store'])->name('Annonce.store');
Route::get('/Annonce/store', [App\Http\Controllers\AnnonceController::class, 'store'])->name('Annonce.store');
Route::post('/update/{id}', [App\Http\Controllers\AnnonceController::class, 'update'])->name('update');
Route::get('/annonces/liste', function()
{
    $annonces = App\Models\Annonce::all();
    //$username = App\Models\Annonce::user($annonces->user_id);
    return view('liste',[
        'annonces'=>$annonces,
        //'username'=>$username,
    ]);
});

Route::post('/annonce/shutdown/{id}', [App\Http\Controllers\AnnonceController::class, 'shutdown'])->name('Annonce.down');
Route::get('/annonce/up/{id}', [App\Http\Controllers\AnnonceController::class, 'up'])->name('Annonce.up');



Route::post('/annonce/showliste', [App\Http\Controllers\AnnonceController::class, 'index'])->name('showliste');
Route::get('/annonce/showliste', function()
{
    $annonces = App\Models\Annonce::all();
    //$username = App\Models\Annonce::user($annonces->user_id);
    return view('showliste',[
        'annonces'=>$annonces,
        //'username'=>$username,
    ]);
});

Route::post('/annonce/active', [App\Http\Controllers\AnnonceController::class, 'active'])->name('Annonce.active');
Route::get('/annonce/active', function()
{
    return view('liste-active');
});

Route::delete('/delete/{id}', [App\Http\Controllers\AnnonceController::class, 'destroy'])->name('delete');

Auth::routes();

//admin
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
});

Route::post('/auth',[App\Http\Controllers\AdminController::class, 'index']);



//users
Route::post('/users/alluser', [App\Http\Controllers\UserController::class, 'index'])->name('alluser');
Route::get('/users/alluser', function()
{
    $users = App\Models\User::all();
    //$username = App\Models\Annonce::user($annonces->user_id);
    return view('alluser',[
        'users'=>$users,
        //'username'=>$username,
    ]);
});

Route::post('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::get('/users/edit/{id}', function(){
    $user = Auth::user()->id;
    $name = Auth::user()->name;
    $email = Auth::user()->email;
        return view('users.edit',compact('user', 'name', 'email'));
});

Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
Route::delete('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
Route::post('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

Route::post('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::post('/users/register-new', [App\Http\Controllers\UserController::class, 'edit'])->name('users.register-new');
Route::get('/users/register-new', [App\Http\Controllers\UserController::class, 'register-new'])->name('users.register-new');
Route::get('/users/register-new', function () {
    return view('users.register-new');
});

Route::post('/users/register-new-fail', [App\Http\Controllers\UserController::class, 'register-new-fail'])->name('users.register-new-fail');
Route::get('/users/register-new-fail', [App\Http\Controllers\UserController::class, 'register-new-fail'])->name('users.register-new-fail');
Route::get('/users/register-new-fail', function(){
    return view('users.register-new-fail');
});

Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::post('/logout', [App\Http\Controllers\Auth::class, 'logout'])->name('logout');