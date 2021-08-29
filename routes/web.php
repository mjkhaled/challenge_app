<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Survey@index');
Route::get('survey/view/{id}', 'Survey@view');
