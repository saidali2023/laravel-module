<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/contacts', function (Request $request) {
    return $request->user();
});