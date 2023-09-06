<?php

use App\Livewire\Counter;
use App\Livewire\Feedback\Datatable as FeedbackDatatable;
use App\Livewire\Feedback\Form as FeedbackForm;
use App\Livewire\UserForm;
use App\Livewire\Support\Form as SupportForm;
use App\Livewire\Todo;
use App\Livewire\UserDatatable;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/counter', Counter::class);
Route::get('/feedbacks/form', FeedbackForm::class);
Route::get('/feedbacks', FeedbackDatatable::class);

Route::get('/supports/form', SupportForm::class);

Route::get('/users', UserDatatable::class);
Route::get('/users/form', UserForm::class);
Route::get('/todo', Todo::class);

Route::view('/alpinejs', 'alpinejs');
