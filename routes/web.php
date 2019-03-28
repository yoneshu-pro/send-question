<?php

Route::get('/', 'LoginController@showLoginForm')->name('top');
Route::post('/login', 'LoginController@login')->name('login');

Route::middleware('auth.password')->group(function() {
    Route::resource('/presents', 'PresentController');
    Route::resource('/questions', 'QuestionController');
});
