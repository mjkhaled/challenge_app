<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/surveys/list', 'Api\Survey@list');
