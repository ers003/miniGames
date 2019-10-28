<?php

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

Route::get('/test', [
	'uses' => 'ApiController@test',
	'as' => 'test'
]);
Route::post('/questions/store', [
	'uses' => 'ApiController@storeQuestion',
	'as' => 'questions.store'
]);

Route::get('welcome/run',  function () {
    Artisan::call('send:question');
    return redirect('welcome');
})->name('run.command');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('dashboard','Controller@correct');
Route::get('redirect','Controller@user_redirect');
Route::post('profile', 'ApiController@update')->name('update.post');
