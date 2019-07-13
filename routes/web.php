<?php

Route::get('/', 'TopController@index');
Route::resource('/presents', 'PresentController');
Route::resource('/questions', 'QuestionController');
