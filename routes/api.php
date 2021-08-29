<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/surveys/list', 'Api\Survey@list');
Route::get('surveys/view/{id}', 'Api\Survey@view');
