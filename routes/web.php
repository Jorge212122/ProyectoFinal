<?php

use App\Models\Content;
use App\Models\Category;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContenidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.cinevana-login-register');
})->name('login');

Route::get('register', function () {
    return view('auth.cinevana-register');
})->name('register');

Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('/content/main', function () {
    $contents = Content::all();
    $categories = Category::all();
    return view('content.content-main', compact('contents', 'categories'));
})->name('content-main');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('content/{content}/show-season/{season}', [ContenidoController::class, 'showSeason'])->name('content.show-season');
Route::get('content/{content}/create-season', [ContenidoController::class, 'createSeason'])->name('content.create-season');
Route::post('content/{content}/delete-category', [ContenidoController::class, 'deleteCategory'])->name('content.delete-category');
Route::post('content/{content}/add-category', [ContenidoController::class, 'addCategory'])->name('content.add-category');
Route::resource('content', ContenidoController::class);

Route::resource('category', CategoriaController::class);

// Ruta para enviar correo personalizado
Route::get('contactanos', function () {
    $correo = new ContactanosMailable;
    Mail::to('criswar800@gmail.com')->send($correo);
    return "Gracias por contactarnos";
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
