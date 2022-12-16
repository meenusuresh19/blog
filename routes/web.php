<?php

use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('blog', BlogController::class);
Route::get('/removeBlog/{id}', 'App\Http\Controllers\BlogController@destroy')->name('removeBlog');
Route::get('student_marklist', 'App\Http\Controllers\StudentController@studentMarklist')->name('student_marklist');
Route::get('createMark', 'App\Http\Controllers\StudentController@createMark')->name('createMark');
Route::post('mark_store', 'App\Http\Controllers\StudentController@markStore')->name('markstore');
Route::get('removeStudentmark/{id}', 'App\Http\Controllers\StudentController@markDestroy')->name('removeStudentmark');
Route::post('studentMarkupdate', 'App\Http\Controllers\StudentController@studentMarkupdate')->name('studentMarkupdate');
});

require __DIR__.'/auth.php';
